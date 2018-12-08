<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Events\LiyupingEvent;
use App\Models\User;
use App\Models\Tip;

class PagesController extends Controller
{
  public function root()
  {

    $tips = Tip::paginate(8);

      return view('pages.root', ['tips' => $tips]);
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
