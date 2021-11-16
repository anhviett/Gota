<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="{{$meta_canonical}}" />
    <meta name="author" content="">
    <link  rel="icon" type="image/x-icon" href="" />

    {{--<meta property="og:image" content="{{$image_og}}" />--}}
    <meta property="og:site_name" content="http://localhost/site/home" />
    <meta property="og:description" content="{{$meta_desc}}" />
    <meta property="og:title" content="{{$meta_title}}" />
    <meta property="og:url" content="{{$meta_canonical}}" />
    <meta property="og:type" content="website" />

    <title>E-Shopper - {{$meta_title}}</title>
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('site/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/futura-std-font.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/slick.css')}}">

    <link rel="stylesheet" href="{{asset('site/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset("site/assets/css/main.css")}}">
    @yield('style.css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head><!--/head-->
<body>
@include('site.layouts.header')
@yield('content')
@include('site.layouts.footer')

<!-- JS here -->
<script src="{{asset('site/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<script src="{{asset('site/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
{{----------******------------}}
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
{{----------******------------}}
<script src="{{asset('site/assets/js/popper.min.js')}}"></script>
<script src="{{asset('site/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('site/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('site/assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('site/assets/js/one-page-nav-min.js')}}"></script>
<script src="{{asset('site/assets/js/slick.min.js')}}"></script>
<script src="{{asset('site/assets/js/jquery.meanmenu.min.js')}}"></script>
<script src="{{asset('site/assets/js/ajax-form.js')}}"></script>
<script src="{{asset('site/assets/js/wow.min.js')}}"></script>
<script src="{{asset('site/assets/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('site/assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('site/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('site/assets/js/plugins.js')}}"></script>
<script src="{{asset('site/assets/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('site/assets/js/countdown.js')}}"></script>
<script src="{{asset('site/assets/js/main.js')}}"></script>




@yield('footer_script')

</body>
</html>
