@extends('layouts.app')
@section('title', 'payment success!')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">payment success!!</div>
    <div class="panel-body text-center">
        <h1>Order Number:{{ $orderno }}</h1>
        <h2>license: {{$license}}</h2>
        <a class="btn btn-primary" href="{{ route('root') }}">Return Home!</a>
    </div>
</div>
@endsection
