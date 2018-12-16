@extends('layouts.app')

@section('title', $seo_title)
@section('description', $seo_description)

@section('content')

<div class="container-fluid contact_us_banner">
  <div class="container">
<div class="row ">
  <div class="col-sm-12 col-xs-12 contact_us_section_a">
    <h1>{{$information->title}}</h1>
    <h2>{{$information->sub_title}}</h2>
  </div>
<div class="col-sm-12 col-xs-12 contact_us_section_b">

<div> {!! $information->description !!}</div>

</div>
</div>
</div>
</div>


@endsection
