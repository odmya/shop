@extends('layouts.app')
@section('title', $seo_title)
@section('description', $seo_description)
@section('content')
<div class="container-fluid home_section_a ">

  <div class="container homeBanner">

    <div class="row">
      <div class="col-xs-12"><h1>Fox Video Downloader</h1></div>
      <div class="col-xs-12"><h2>Download full HD Videos from more than 10,000 video sharing sites.</h2></div>
      <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-push-1">
              <ul>
                <li>Download HD Video from YouTube, Dailymotion</li>
                <li>Download HD Video from Facebook, Twitter, and more</li>
                <li>Download YouTube to MP3 directly in high quality.</li>
                <li>Download HD video song and audio tracks from YouTube and other sites.</li>
                <li>Download YouTube/Lynda playlist in one click</li>
                <li>Build your video library downloaded videos</li>
              </ul>
            </div>
        </div>
      </div>
      <div class="col-xs-12 try_buy">
        <a href="{{ URL::asset('download/ftp/MiniInstaller.exe') }}" class="btn_try">Try It Free</a>

        <a href="{{route('home.order')}}" class="btn_buy">Buy Now </a>

      </div>

    </div>
  </div>

</div>

<div class="container-fluid home_section_b">
  <div class="container">
    <div class="row">
      <div class="col-xs-12"><h2>Download Full HD Videos in Original Quality with URL</h2></div>
      <div class="col-xs-12"><h6>With Fox Video Downloader, you're able to download videos or extract audio from YouTube, Facebook, Netflix, Vimeo, CBS, Twitter, Dailymotion, Lynda etc. You can Copy and paste a single video URL to the Fox video downloader to start downloading. Detailed guide on how to download videos >></h6></div>
      <div class="col-xs-12 home_section_b_sub_a">

              <dl>
                <dt>
                 10,000+ Video Sites Supported
                </dt>
                <dd>
                 YouTube, Dailymotion, Facebook, Twitter, and more.
                 <a href="./Reference.html" class="link" style="color: #25c15e;" target="_blank">(Full List&gt;&gt;)</a>
                </dd>
              </dl>

              <dl>
                <dt>
                 Download HD Video
                </dt>
                <dd>
                 4K UHD, 4K, 1920P, 1080P, 720P, 480P, 360P, etc.
                </dd>
              </dl>

              <dl>
                <dt>
                 Download YouTube to MP3
                </dt>
                <dd>
                 Download and convert YouTube to MP3 directly in high quality.
                </dd>
               </dl>

              <dl>
                <dt>
                 Download Audio Only
                </dt>
                <dd>
                 Download HD video song and audio tracks from YouTube and other sites.
                </dd>
              </dl>

              <dl>
                <dt>
                 Batch Download Videos
                </dt>
                <dd>
                 Download YouTube playlist in 1 click. Or download multiple videos with URLs together.
                </dd>
              </dl>

              <dl>
                <dt>
                 Player Plugin
                </dt>
                <dd>
                 Play downloaded YouTube videos and desktop videos with the built-in media player instantly.
                </dd>
              </dl>


      </div>

    </div>
  </div>


</div>

<div class="container home_section_c">
    <div class="row">
      <div class="col-xs-12">
        <h2>Fox video Downloader Guide on How to Download Video</h2>
      </div>
      <div class="col-xs-12 col-sm-10 col-sm-push-1">

        <ul>
          @foreach($tips as $tip)
            <li><a href="{{route('tips.show',array('category_slug'=>$tip->tip_category->slug,'slug'=>$tip->slug))}}">{{$tip->title}}</a></li>
          @endforeach
        </ul>
      </div>
    </div>


</div>
@stop
