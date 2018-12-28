@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

<div class="container-fluid contact_us_banner">
  <div class="container">
<div class="row ">
  <div class="col-sm-12 col-xs-12 contact_us_section_a">
    <h1>Contact Us</h1> <b>Email:</b> support#foxvideodownloader.com(replace # with @)
<br />
    <b>Address:</b> Foxvideodownloader <br />
529 Main Street, Box 103, Grafton, OH 44044, USA <br />
     <b>Business Hours:</b> Monday to Friday 8.30am - 5.00pm
     <br /><br />
       For support inquiries please visit
         <a href="https://www.foxvideodownloader.com/guide">HERE</a>

  </div>
<div class="col-sm-12 col-xs-12 contact_us_section_b">

<h2> Fox Video Downloader Studio, founded on April 10, 2016 </h2>
<h6>Fox Video Downloader can download full HD Videos from more than 10,000 video sharing sites. see more detail. please visit <a href="https://www.foxvideodownloader.com/reference.html">here</a>.</h6>
<p>You can submit the following form online ( * required ): </p>

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
            ->onGroupAddClass('contact_us_size')
            ->required(); !!}

{!! Former::email('email')
            ->label('email')
            ->onGroupAddClass('contact_us_size')
            ->required(); !!}

{!! Former::text('subject')
            ->label('subject')
            ->onGroupAddClass('contact_us_size')
            ->required(); !!}

{!! Former::textarea('message')
            ->label('message')
            ->onGroupAddClass('contact_us_size')
            ->required(); !!}
{!! Former::actions()
            ->large_primary_submit('Submit')
            ->large_inverse_reset('Reset'); !!}

{!! Former::close(); !!}


</div>
</div>
</div>
</div>

@endsection
