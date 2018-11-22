@extends('layouts.app')
@section('title', '[OFFICIAL] Home')

@section('content')
<div class="container-fluid home_section_a">

  <div class="container">

    <div class="row">
      <div class="col-xs-12"><h2>iTube Studio for Mac</h2></div>
      <div class="col-xs-12"><h1>Download Video in Full HD, 4K, 1440p, 1080p, etc.</h1></div>
      <div class="col-xs-12">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
              <ul>
                <li>· Download Video from 10,000 Video Sites</li>
                <li>· Private Mode to Download Video in Secret</li>
                <li>· Record Any Online Video from Any Site</li>
                <li>· Ultimate Playlist Download in Batch</li>
                <li>· Smart Download Then Convert Mode</li>
                <li>· Turbo Mode at 3X Faster Download Speed</li>
              </ul>
            </div>
        </div>
      </div>
      <div class="col-xs-12"><a href="#" class="btn btn-primary btn-lg active" role="button">Try It Free <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a> <a href="{{ route('cart.addtocart',95)}}" class="btn btn-primary btn-lg active" role="button">Buy Now <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></div>
      <div class="col-xs-12"> <a href="">Switch to Windows Version >> </a> </div>
    </div>
  </div>


  <div class="row home_section_a_sub">
    <div class="col-sm-push-3 col-sm-6 col-xs-12">
      <div class="row">
        <div class="col-xs-3"><p><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></p> Download Videos </div>
        <div class="col-xs-3"><p><span class=" glyphicon glyphicon-ice-lolly " aria-hidden="true"></span></p> Record Online Video </div>
        <div class="col-xs-3"><p><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></p>Convert Videos</div>
        <div class="col-xs-3"><p><span class="glyphicon glyphicon-retweet" aria-hidden="true"></span></p>Transfer to Ddevices</div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid home_section_b">
  <div class="container">
    <div class="row">
      <div class="col-xs-12"><h2>Download Full HD Videos with URL or Extension Plugin in 1 Click</h2></div>
      <div class="col-xs-12"><h3>3X faster HD video downloader for YouTube, Facebook, Vimeo, Amazon and other video-sharing sites on your Windows & Mac computers. Moreover, iTube HD Video Downloader provides you with a Private Mode to protect your downloaded video in a password-protected folder.</h3></div>
      <div class="col-xs-12">Disclaimer: iTube HD Video Downloader is only for personal use. Please don't use this downloader software for commercial purposes. </div>
      <div class="col-xs-12 home_section_b_sub_a">
        <table class="table">
          <tr>
            <td>
              <dl>
                <dt>10,000+ Video Sites Supported</dt>
                <dd>YouTube, Dailymotion, Facebook, Twitter, and more.</dd>
              </dl>
            </td>
            <td>
              <dl>
                <dt>10,000+ Video Sites Supported</dt>
                <dd>YouTube, Dailymotion, Facebook, Twitter, and more.</dd>
              </dl>
            </td>
            <td>
              <dl>
                <dt>10,000+ Video Sites Supported</dt>
                <dd>YouTube, Dailymotion, Facebook, Twitter, and more.</dd>
              </dl>
            </td>
            <td>
              <dl>
                <dt>10,000+ Video Sites Supported</dt>
                <dd>YouTube, Dailymotion, Facebook, Twitter, and more.</dd>
              </dl>
            </td>
          </tr>
          <tr>
            <td>
              <dl>
                <dt>10,000+ Video Sites Supported</dt>
                <dd>YouTube, Dailymotion, Facebook, Twitter, and more.</dd>
              </dl>
            </td>
            <td>
              <dl>
                <dt>10,000+ Video Sites Supported</dt>
                <dd>YouTube, Dailymotion, Facebook, Twitter, and more.</dd>
              </dl>
            </td>
            <td>
              <dl>
                <dt>10,000+ Video Sites Supported</dt>
                <dd>YouTube, Dailymotion, Facebook, Twitter, and more.</dd>
              </dl>
            </td>
            <td>
              <dl>
                <dt>10,000+ Video Sites Supported</dt>
                <dd>YouTube, Dailymotion, Facebook, Twitter, and more.</dd>
              </dl>
            </td>
          </tr>
        </table>

      </div>
      <div class="col-xs-12 home_section_b_sub_c"><img src="{{ URL::asset('uploads/images/arrow_down.png') }}"></div>

    </div>
  </div>
  <div class="col-xs-12 home_section_b_sub_b"><img class="img-responsive center-block" src="{{ URL::asset('uploads/images/gs_logo.png') }}"></div>

</div>
@stop
