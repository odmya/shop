@extends('layouts.app')

@section('title', '购物车')

@section('content')
<div class="container">
<div class="row">
<div class="col-sm-3">
<ul>
@foreach($menu_user_guide as $menu_guide_item)

<li>
<a href="#">{{$menu_guide_item->label}}</a>
@if($menu_guide_item->hasChildren())
<ul>
  @foreach($menu_guide_item->hasChildren as $sub_menu_guide_item)
  <li @if($sub_menu_guide_item->label == $guideitem->title) class="selected" @endif ><a href="{{$sub_menu_guide_item->link}}">{{$sub_menu_guide_item->label}}</a>

  </li>
  @endforeach
</ul>
@endif
</li>

@endforeach
</ul>
</div>
<div class="col-sm-9">
<h1>{{$guideitem->title}}</h1>
<p> {!! $guideitem->description !!}</p>

<div class="row">
  <div class="col-sm-6">
    @if($guideitem->prev_item)
  Previous:  <a href="{{route('guide.show',$guideitem->previtem->slug)}}">{{$guideitem->previtem->title}}</a>
    @endif

  </div>

<div class="col-sm-6">
  @if($guideitem->next_item)
  Next:  <a href="{{route('guide.show',$guideitem->nextitem->slug)}}">{{$guideitem->nextitem->title}}</a>
  @endif

</div>
</div>

</div>

</div>
</div>
@section('scriptsAfterJs')
<script>
  $(document).ready(function () {


  });
</script>
@endsection

@endsection
