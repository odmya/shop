<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\PayPal;
use App\Models\PaymentLogs;
use App\Models\ProductSku;
use App\Exceptions\InvalidRequestException;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Http\Requests\CheckoutRequest;
use App\Notifications\OrderConfirmNotifications;
use App\Models\Currency;
use Mail;
use App\Events\OrderPaid;
use App\Events\OrderConfirmationEvent;

class PaymentController extends Controller
{

  public function payByAlipay(Order $order, Request $request)
  {

      // 判断订单是否属于当前用户
      $this->authorize('own', $order);
      // 订单已支付或者已关闭
      if ($order->paid_at || $order->closed) {
          throw new InvalidRequestException('订单状态不正确');
      }

      // 调用支付宝的网页支付
      return app('alipay')->web([
          'out_trade_no' => $order->no, // 订单编号，需保证在商户端不重复
          'total_amount' => $order->total_amount, // 订单金额，单位元，支持小数点后两位
          'subject'      => '支付 Laravel Shop 的订单：'.$order->no, // 订单标题
      ]);
  }

  // 前端回调页面
    public function alipayReturn()
    {
        // 校验提交的参数是否合法
        $data = app('alipay')->verify();
        dd($data);
    }

    // 服务器端回调
    public function alipayNotify()
    {
        $data = app('alipay')->verify();
        \Log::debug('Alipay notify', $data->all());
    }

    //paypal付款成功返回
    public function paypalsuccess(Request $request)
    {

      $token = $request->input("token");
      $PayerID = $request->input("PayerID");
      $provider = new ExpressCheckout;
      $checkoutdata = session('checkoutdata');
      if(isset($checkoutdata) == false){
        return "error";
      }
      //$email = session('email');
      $remark = session('remark');
      $default_curreny = session('curreny');
      $response = $provider->setCurrency($checkoutdata['curreny'])->doExpressCheckoutPayment($checkoutdata, $token, $PayerID);
      $email = $checkoutdata['email'];

    //  \Log::debug('paypal express checkout response', $response);
    PaymentLogs::create([
      'email' => $email?$email:"null",
      'payment_status' => $response['ACK'],
      'log' => serialize($response),
    ]);

      //验证支付成功
      if($response['ACK']=="Success"){
        $order = \DB::transaction(function () use ($token, $PayerID,$checkoutdata,$email, $remark, $response, $request) {

          $order   = new Order([
              'no'       => $checkoutdata['invoice_id'],
              'email'       => $email,
              'remark'       => $remark,
              'total_amount' => $response['PAYMENTINFO_0_AMT'],
            //  'paid_at' => $response['PAYMENTINFO_0_ORDERTIME'],
              'payment_method' => 'PayPal',
              'payment_no' => $response['PAYMENTINFO_0_TRANSACTIONID'],
          ]);

          $order->save();
          foreach ($checkoutdata['items'] as $data) {
              $sku  = ProductSku::find($data['sku_id']);
              // 创建一个 OrderItem 并直接与当前订单关联
              $item = $order->items()->make([
                  'amount' => $data['qty'],
                  'price'  => $sku->price,
              ]);
              $item->product()->associate($sku->product_id);
              $item->productSku()->associate($sku);
              $item->save();
            //  $totalAmount += $sku->price * $data['amount'];
          }

          $paypal = $order->paypal()->make([
            'paymentinfo_transactionid' =>$response['PAYMENTINFO_0_TRANSACTIONID'],
            'token' =>$token,
            'payer_id' =>$PayerID,
            'invoice' =>$checkoutdata['invoice_id'],
            'paymentinfo_transactiontype' =>$response['PAYMENTINFO_0_TRANSACTIONID'],
            'paymentinfo_paymenttype' =>$response['PAYMENTINFO_0_PAYMENTTYPE'],
            'paymentinfo_ordertime' =>$response['PAYMENTINFO_0_ORDERTIME'],
            'paymentinfo_amt' =>$response['PAYMENTINFO_0_CURRENCYCODE']." ".$response['PAYMENTINFO_0_AMT'],
            'paymentinfo_feeamt' =>isset($response['PAYMENTINFO_0_FEEAMT'])?$response['PAYMENTINFO_0_CURRENCYCODE']." ".$response['PAYMENTINFO_0_FEEAMT']:"",
            'paymentinfo_taxamt' =>$response['PAYMENTINFO_0_TAXAMT'],
            'paymentinfo_currencycode' =>$response['PAYMENTINFO_0_CURRENCYCODE'],
            'paymentinfo_paymentstatus' =>$response['PAYMENTINFO_0_PAYMENTSTATUS'],
            'paymentinfo_protectioneligibility' =>$response['PAYMENTINFO_0_PROTECTIONELIGIBILITY'],
            'paymentinfo_protectioneligibilitytype' =>$response['PAYMENTINFO_0_PROTECTIONELIGIBILITYTYPE'],
            'paymentinfo_sellerpaypalaccountid' =>$response['PAYMENTINFO_0_SELLERPAYPALACCOUNTID'],
            'paymentinfo_securemerchantaccountid' =>$response['PAYMENTINFO_0_SECUREMERCHANTACCOUNTID'],
            'paymentinfo_errorcode' =>$response['PAYMENTINFO_0_ERRORCODE'],
            'paymentinfo_0_ack' =>$response['PAYMENTINFO_0_ACK'],
          ]);

          $paypal->save();


          //$order->notify(new OrderConfirmNotifications());
          $this->afterPaid($order);

        });

        $request->session()->forget('checkoutdata');
        $request->session()->forget('email');
        $request->session()->forget('remark');
        \ShoppingCart::clean();

        exec("python /var/www/html/SNGenerate.py ".trim($email),$license);

        $order = Order::where('no',$checkoutdata['invoice_id']);
        $order->extra= $license;
        $order->save();

        return view('payment.success',['license' => $license, 'orderno'=>$checkoutdata['invoice_id']]);
      }


      return view('payment.error',['payment_error'=>$payment_error]);


    }


    protected function afterPaid(Order $order)
    {
        event(new OrderPaid($order));
        event(new OrderConfirmationEvent($order));
    }




    public function checkout(CheckoutRequest $request)

    {

      $email = $request->input("email");
      $curreny_code = $request->input("curreny");
      //$default_curreny= session('curreny');

      $remark = $request->input("remark");
      $prefix = date('YmdHis');
      $default_curreny= Currency::where('code',$curreny_code)->first();
      $no = $prefix.str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

      $request->session()->put('email', $email);
      $request->session()->put('remark', $remark);
      $request->session()->put('no', $no);

      $provider = new ExpressCheckout;
      $data = [];

      $data['items'] = array();

      $cartItems = \ShoppingCart::all();
      $tmp_total =0;
      foreach($cartItems as $item){
        $tmp['sku_id'] =$item->id;
        $tmp['name'] =$item->name;
        $tmp['price'] =number_format($item->price * $default_curreny->value, 2);
        $tmp['qty'] =$item->qty;
        $data['items'][]=$tmp;
        $tmp_total+=$tmp['price']*$tmp['qty'];
      }


    //  $data['total'] = number_format(\ShoppingCart::total()* $default_curreny->value,2); 四舍五入后总数有差异
      $data['total'] = $tmp_total;

      $data['invoice_id'] = $no;
      $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
      $data['return_url'] = url('/payment/success');
      $data['cancel_url'] = url('/cart');

      $data['curreny'] = $curreny_code;
      $data['email'] = $email;

      //$this->data = $data;
      $request->session()->put('checkoutdata', $data);

    //  var_dump($data);



      $response = $provider->setCurrency($default_curreny->code)->setExpressCheckout($data);
      //var_dump($default_curreny->code);

    //  var_dump($response);

      return redirect($response['paypal_link']);


    }
}
