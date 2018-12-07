<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Events\LiyupingEvent;
use App\Models\User;

class PagesController extends Controller
{
  public function root()
  {
      return view('pages.root');
  }

  public function order()
  {
      return view('pages.order');
  }
  public function emailVerifyNotice(Request $request)
    {
        return view('pages.email_verify_notice');
    }

}
