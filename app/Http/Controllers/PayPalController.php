<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{
    /**
  * Retrieve IPN Response From PayPal
  *
  * @param \Illuminate\Http\Request $request
  */
  public function postNotify(Request $request)
  {
    // Import the namespace Srmklive\PayPal\Services\ExpressCheckout first in your controller.
    $provider = new ExpressCheckout;

    $request->merge(['cmd' => '_notify-validate']);
    $post = $request->all();

    $response = (string) $provider->verifyIPN($post);

    if ($response === 'VERIFIED') {
        // Your code goes here ...
    }
  }
}
