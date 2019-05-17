@extends('layouts.app')

@section('title', $seo_title)
@section('description', $seo_description)

@section('content')
<div class="container-fluid tips_banner">

  <div class="container tips_section_a">
<div class="row ">
  <div class="col-sm-12 col-xs-12 ">
    <h1>{{$tip->title}}</h1>
  </div>

  <div class="col-xs-12 try_buy">
        <a href="https://www.foxvideodownloader.com/download/index.html" class="btn_try">Try It Free</a>

        <a href="https://www.foxvideodownloader.com/order.html" class="btn_buy">Buy Now </a>

  </div>
</div>
</div>

</div>

<div class="container tips_section_b">
<div class="row ">

<div class="col-sm-12 col-xs-12 ">

<div> {!! $tip->description !!}</div>

</div>
</div>

<div class="row">
  <div class="col-sm-6">
    @if($prevtip)
  Previous:  <a href="{{route('tips.display',array('slug'=>$prevtip->slug))}}">{{$prevtip->title}}</a>
    @endif

  </div>

<div class="col-sm-6">
  @if($nexttip)
  Next:  <a href="{{route('tips.display',array('slug'=>$nexttip->slug))}}">{{$nexttip->title}}</a>
  @endif

</div>
</div>

</div>

@section('scriptsAfterJs')
<script>
  $(document).ready(function () {

$(".tips_section_b img").addClass('img-responsive');

  });
</script>
@endsection

@endsection
