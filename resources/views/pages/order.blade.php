@extends('layouts.app')

@section('title', 'You are Buying: Fox Video Downloader!')

@section('content')


<div class="container-fluid order_page_banner">
  <div class="container">
<div class="row ">
  <div class="col-sm-12 col-xs-12 order_page_a">
    <div class="row">
      <div class="col-sm-9">
        <p>You are Buying: </p>
        <h1>Fox Video Downloader</h1>
      </div>

      <div class="col-sm-3 safe_img">
        <img src="uploads/images/safe_img.png" class="img-responsive">
      </div>

    </div>

  </div>
</div>
</div>


</div>

<div class="container-fluid order_page_b ">
  <div class="container">
    <div class="row store_buy">
      <div class="col-sm-6 item">
        <ul>
        <li>Download HD Video from YouTube, Dailymotion, Facebook, Twitter, and more</li>
        <li>Download YouTube to MP3 directly in high quality.</li>
        <li>Download HD video song and audio tracks from YouTube and other sites.</li>
        <li>Download YouTube/Lynda playlist in one click</li>
        <li>Build your video library downloaded videos</li>
        </ul>
      </div>
      <div class="col-sm-6 item">
        <h3>Lifetime License <sup style="color:#FF0004;font-size:12px;">Hot</sup></h3>
        <p class="price"><span></span> $29.00</p>
        <dl>
         <dt>
          1 PC / Lifetime
         </dt>
         <dd>
          One-time fee to enjoy free upgrade for lifetime in 1 PC.
         </dd>
        </dl>
        <div class="addtocart">
         <a href="{{route('cart.addtocart',95)}}"  class="add_cart">Add to Cart <i class="fm fm-cart"></i></a>
        </div>
      </div>
      <div class="col-sm-12 accept_payment">  We accept <img src="uploads/images/pay_pic.png" /> </div>
    </div>
  <div class="row safe_box">
    <div class="col-sm-4">
      <div class="item">
      <p><img src="uploads/images/icon_clean2.png" alt="clean" /></p>
      <dl>
       <dt>
        100% Clean
       </dt>
       <dd>
        The online ordering is 100% secure! All data exchanged during the payment process is SSL-secured.
       </dd>
      </dl>
     </div>
    </div>
    <div class="col-sm-4">
      <div class="item">
       <p><img src="uploads/images/icon_30day2.png" alt="money back" /></p>
       <dl>
        <dt>
         30-day Money Back
        </dt>
        <dd>
         All of our products on this site come with a 30 days Money Back Guarantee.
        </dd>
       </dl>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="item">
       <p><img src="uploads/images/icon_support2.png" alt="support" /></p>
       <dl>
        <dt>
         1to1 Support
        </dt>
        <dd>
         Knowledgeable representatives available to assist you through instant live chat and email response within 24 hours.
        </dd>
       </dl>
      </div>
    </div>
  </div>
  </div>
</div>

<div class="container-fluid order_page_c ">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2>WHY CHOOSE US</h2>
      </div>
    </div>
    <div class="row choose">
        <div class="col-sm-12">
          <div class="item ">
          <strong>231</strong>
          <p> Countries Use Fox Video Downloader Studio </p>
         </div>
         <div class="item">
          <strong>Lifetime</strong>
          <p> Free Upgrade </p>
         </div>
         <div class="item">
          <strong>100%</strong>
          <p> Clean and Secured </p>
         </div>
         <div class="item">
          <strong>80,000,000</strong>
          <p> Software Installed </p>
         </div>
         <div class="item">
          <strong>100,000+</strong>
          <p> Facebook Fans </p>
         </div>
         <div class="item">
          <strong>2,000,000</strong>
          <p> YouTube Channel Views </p>
         </div>
       </div>
    </div>
  </div>
</div>
<div class="clearfix"> </div>
@endsection
