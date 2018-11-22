@extends('layouts.app')

@section('title', $information->title)

@section('content')
<div class="container">
<div class="row">
<div class="col-sm-12">
<h1>{{$information->title}}</h1>
<p> {!! $information->description !!}</p>

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
