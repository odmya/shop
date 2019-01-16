<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ URL::asset('uploads/images/favicon.png') }}" mce_href="{{ URL::asset('uploads/images/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Fox video Downloader')</title>
    <meta name="description" content="@yield('description', 'Fox video Downloader')" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @if(isset($canonical))
    <link rel="canonical" href="{{$canonical}}" />
    @endif
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131415452-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-131415452-1');
    </script>

</head>
<body>
    <div id="app" class="{{ route_class() }}-page">
        @include('layouts._header')
        @yield('content')
        @include('layouts._footer')
    </div>


    <!-- JS 脚本 -->
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scriptsAfterJs')
</body>
</html>
