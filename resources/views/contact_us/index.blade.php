@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

<div class="container">
<div class="row">
<div class="col-sm-12 col-xs-12">

  @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

{!! Former::horizontal_open(url(route('contact.send')))
            ->id('contactus')
            ->method('POST'); !!}

{!! Former::text('name')
            ->label('Name')
            ->required(); !!}

{!! Former::email('email')
            ->label('email')
            ->required(); !!}

{!! Former::text('subject')
            ->label('subject')
            ->required(); !!}

{!! Former::textarea('message')
            ->label('message')
            ->required(); !!}
{!! Former::actions()
            ->large_primary_submit('Submit')
            ->large_inverse_reset('Reset'); !!}

{!! Former::close(); !!}

  
</div>
</div>
</div>

@endsection
