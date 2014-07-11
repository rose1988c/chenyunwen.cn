<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>{{$title=isset($title)?$title:''}}</title>
    <meta name="description" content="@yield('description')"/>
    <meta name="author" content="rose1988.c@gmail.com">
    <meta name="keywords" content="@yield('keywords')"/>
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/png">

    {{ HTML::style('assets/bracket/css/style.default.css?' . date("Ymd", time()) . '.css') }}
    {{ HTML::style('assets/bracket/css/jquery.gritter.css?' . date("Ymd", time()) . '.css') }}
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
   
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  <div class="mainpanel">
     @yield('content')
     
  </div>
</section>

@yield('footer-content')

<script src="{{asset('/assets/bracket/js/jquery-1.10.2.min.js')}}"></script>
<script src="{{asset('/assets/bracket/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('/assets/bracket/js/jquery-ui-1.10.3.min.js')}}"></script>
<script src="{{asset('/assets/bracket/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/bracket/js/modernizr.min.js')}}"></script>
<script src="{{asset('/assets/bracket/js/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('/assets/bracket/js/toggles.min.js')}}"></script>
<script src="{{asset('/assets/bracket/js/retina.min.js')}}"></script>
<script src="{{asset('/assets/bracket/js/jquery.cookies.js')}}"></script>
<script src="{{asset('/assets/bracket/js/jquery.gritter.min.js')}}"></script>
<script src="{{asset('/assets/bracket/js/custom.js')}}"></script>

@yield('footer')

<script type="text/javascript">
function notify(title, text, type){
	var sticky = arguments[3] || false;
	var time = arguments[4] || '';
	$.gritter.add({
		title: title,
		text: text,
        class_name: 'growl-' + type,
		sticky: false,
		time: ''
	});
	return false;
};
</script>
</body>
</html>