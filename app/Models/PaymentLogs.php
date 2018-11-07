<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentLogs extends Model
{
  protected $fillable = [
      'email',
      'payment_status',
      'log',
  ];

}
