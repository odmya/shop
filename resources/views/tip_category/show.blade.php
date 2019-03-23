@extends('layouts.app')

@section('title', $seo_title)
@section('description', $seo_description)

@section('content')

<div class="container-fluid tips_banner">

  <div class="container tips_section_a">
<div class="row ">
  <div class="col-sm-12 col-xs-12 ">
    <h1>{{$tip_category->title}}</h1>
    <h2>{!!$tip_category->description!!}</h2>
  </div>
</div>
</div>

</div>

<div class="container tips_section_b">
<div class="row ">

<div class="col-sm-12 col-xs-12 ">

  <div class="tip_list">
    @foreach ($tips as $tip)
        <div>
          <h3><a href="{{route('tips.display',$tip->slug)}}">{{$tip->title}}</a></h3>
          <p>{!!str_limit($tip->description,500)!!}  <a href="{{route('tips.display',$tip->slug)}}">Read more!</a></p>
          <hr/>
        </div>
    @endforeach
  </div>
  <div class="row">
  {!! $tips->render() !!}
  </div>


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
