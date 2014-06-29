<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')"/>
    <meta name="author" content="rose1988.c@gmail.com">
    <meta name="keywords" content="@yield('keywords')"/>
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/png">

    {{ HTML::style('assets/bracket/css/style.default.css?' . date("Ymd", time()) . '.css') }}
    {{ HTML::style('assets/bracket/css/jquery.datatables.css?' . date("Ymd", time()) . '.css') }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('assets/bracket/js/html5shiv.js')}}"></script>
    <script src="{{asset('assets/bracket/js/respond.min.js')}}"></script>
    <![endif]-->
    @section('css')
        {{-- include all required stylesheets --}}
    @show
    
</head>
<body>
    {{--  @include('partials.errors') --}}
    @section('header')
    @show
    
    @yield('content', 'default content')
    
    @section('footer')
    @show

    @section('js')
    @show
    
</body>
</html>