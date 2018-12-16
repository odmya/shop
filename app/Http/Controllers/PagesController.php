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
    $seo_title = "Fox Video Downloader - A Quck Video Downloader [OFFICIAL]";
    $seo_description = "Fox Video Downloader can download videos from full HD Videos from more than 10,000 video sharing sites.";

      return view('pages.root', ['tips' => $tips,'seo_title'=>$seo_title,'seo_description'=>$seo_description]);
  }

  public function order()
  {
      $seo_title = "Buy Fox Video Downloader";
      $seo_description = "Buy Fox Video Downloader One-time fee to enjoy free upgrade for lifetime";
      return view('pages.order', ['seo_title'=>$seo_title,'seo_description'=>$seo_description]);
  }
  public function emailVerifyNotice(Request $request)
    {
        return view('pages.email_verify_notice');
    }

}
