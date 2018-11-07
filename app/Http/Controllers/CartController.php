<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddCartRequest;
use App\Models\CartItem;

use App\Models\ProductSku;
use App\Models\Currency;


use Illuminate\Http\Request;

class CartController extends Controller
{

  public function add(AddCartRequest $request)
  {
      $user   = $request->user();
      $skuId  = $request->input('sku_id');
      $amount = $request->input('amount');

      // 从数据库中查询该商品是否已经在购物车中
      if ($cart = $user->cartItems()->where('product_sku_id', $skuId)->first()) {

          // 如果存在则直接叠加商品数量
          $cart->update([
              'amount' => $cart->amount + $amount,
          ]);
      } else {

          // 否则创建一个新的购物车记录
          $cart = new CartItem(['amount' => $amount]);
          $cart->user()->associate($user);
          $cart->productSku()->associate($skuId);
          $cart->save();
      }

      return [];
  }



  public function addtocart($sku_id,$amount=1,Request $request)
  {
    //$skuId  = $request->query('sku_id');
    $sku =ProductSku::find($sku_id);
    if($sku){
      $row = \ShoppingCart::add($sku_id, $sku->title, $amount, $sku->price);
    }

    return redirect()->route('cart.index');

    //$items = \ShoppingCart::all();

}
//游客购物车
  public function addcart(Request $request)
  {

    //  $user   = $request->user();
      $skuId  = $request->input('sku_id');
      $amount = $request->input('amount');

//session(['key' => 'value3331']);


//$request->session()->put('key1', 'value22222222222');

//$data = $request->session()->all();
//var_dump($data);

      $sku =ProductSku::find($skuId);

      // 从数据库中查询该商品是否已经在购物车中
      $items = \ShoppingCart::search(['id' => $skuId]);

      //dd($items);
      /*
      if(count($items)){
          foreach($items as $item){
            $qty= $item->qty + $amount;
            \ShoppingCart::update($item->rawId(),$qty);
          }
      }else{
          $row = \ShoppingCart::add($skuId, $sku->title, $amount, $sku->price);
      }
      */

      $row = \ShoppingCart::add($skuId, $sku->title, $amount, $sku->price);
      $items = \ShoppingCart::all();
      //var_dump($items);
/*
      $items = \ShoppingCart::all();
      $total = \ShoppingCart::total();
      foreach($items as $item){
        echo $item->id." ".$item->name." ".$item->qty." ".$item->price."<br/>";
      }
      */
      //var_dump($total);
//die($sku->title);
    //  var_dump($items);
      return [];
  }

/*
  public function index(Request $request)
{
    $cartItems = $request->user()->cartItems()->with(['productSku.product'])->get();

    return view('cart.index', ['cartItems' => $cartItems]);
}
*/


//显示购物车清单
public function index(Request $request)
{
  //$cartItems = $request->user()->cartItems()->with(['productSku.product'])->get();

  $cartItems = \ShoppingCart::all();
  $currenies= Currency::where('status',1)->get();
  if($request->input('curreny')){
    $default_curreny  = Currency::where('code',$request->input('curreny'))->first();
    $request->session()->put('curreny', $default_curreny);
  }else{
    if(session('curreny')){
      $default_curreny= session('curreny');
    }else{
      $default_curreny= Currency::where('value',1)->first();
    //  $request->session()->put('curreny', $default_curreny);
      $default_curreny = $request->session()->get('curreny', $default_curreny);
    }

  }
  $tmp_total = 0;
  foreach($cartItems as $item){
    $tmp['sku_id'] =$item->id;
    $tmp['name'] =$item->name;
    $tmp['price'] =number_format($item->price * $default_curreny->value, 2);
    $tmp['qty'] =$item->qty;
    $data['items'][]=$tmp;
    $tmp_total+=$tmp['price']*$tmp['qty'];
  }

  $total_price = $tmp_total;


//  dd($default_curreny);

  return view('cart.index', ['cartItems' => $cartItems, 'total_price' => $total_price,'currenies' =>$currenies,'default_curreny'=>$default_curreny]);
}

/*


public function remove(ProductSku $sku, Request $request)
   {
       $request->user()->cartItems()->where('product_sku_id', $sku->id)->delete();

       return [];
   }
*/
//删除购物车
public function deletecart(Request $request)
   {
       //$request->user()->cartItems()->where('product_sku_id', $sku->id)->delete();
    $rawid = $request->input('rawid');
    \ShoppingCart::remove($rawid );
      // var_dump($rawid);

       return [];
   }

   public function updatecart(Request $request)
   {

     $rawid = $request->input('rawid');
     $item = \ShoppingCart::get($rawid);
     \ShoppingCart::update($rawid, $item->qty+1);
       // var_dump($rawid);

        return [];

   }


   public function subcart(Request $request)
   {

     $rawid = $request->input('rawid');
     $item = \ShoppingCart::get($rawid);
     \ShoppingCart::update($rawid, $item->qty-1);
       // var_dump($rawid);

        return [];

   }



}
