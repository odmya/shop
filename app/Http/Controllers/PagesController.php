<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Events\LiyupingEvent;
use App\Models\User;
use App\Models\Tip;
use App\Models\Download;

class PagesController extends Controller
{

  public function download()
  {

    $download_count = Download::count();
    if($download_count==0){
      $download = Download::create([
        'counter' => 1,
        //  'level_star'=>$level_star
        //      'version' => $crawl_version,
      ]);
    }else{
      $download= Download::first();
      $download->counter+=1;
      $download->save();
    }
    return redirect()->to('https://www.foxvideodownloader.com/download/ftp/MiniInstaller.exe');

  }

  public function root()
  {

    $tips = Tip::where('displayed',1)->orderby("created_at",'DESC')->paginate(16);
    $seo_title = "Fox Video Downloader - A Quick Video Downloader [OFFICIAL]";
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
