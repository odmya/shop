<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayPal extends Model
{
  protected $fillable = [
      'paymentinfo_transactionid',
      'token',
      'payer_id',
      'payer_email',
      'invoice',
      'txn_id',
      'correlationid',
      'paymentinfo_transactiontype',
      'paymentinfo_paymenttype',
      'paymentinfo_ordertime',
      'paymentinfo_amt',
      'paymentinfo_feeamt',
      'paymentinfo_taxamt',
      'paymentinfo_currencycode',
      'paymentinfo_paymentstatus',
      'paymentinfo_protectioneligibility',
      'paymentinfo_protectioneligibilitytype',
      'paymentinfo_sellerpaypalaccountid',
      'paymentinfo_securemerchantaccountid',
      'paymentinfo_errorcode',
      'paymentinfo_ack',
  ];

  public function order()
  {
      return $this->belongsTo(Order::class);
  }
  
}
