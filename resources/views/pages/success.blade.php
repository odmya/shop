@extends('layouts.app')
@section('title', 'Successful!')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Successful!</div>
    <div class="panel-body text-center">
        <h1>{{ $msg }}</h1>
        <a class="btn btn-primary" href="{{ route('root') }}">Return Home!</a>
    </div>
</div>
@endsection
