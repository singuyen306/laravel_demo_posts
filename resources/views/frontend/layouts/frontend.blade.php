<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Blog Post</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
        <!-- Custom icon font-->
        <link rel="stylesheet" href="{{asset('css/fontastic.css')}}">
        <!-- Google fonts - Open Sans-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <!-- Fancybox-->
        <link rel="stylesheet" href="{{asset('vendor/@fancyapps/fancybox/jquery.fancybox.min.css')}}">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        <link href="{{asset('css/login.css')}}" rel="stylesheet">

        @yield('stylesheet')
        <!-- Favicon-->
        <link rel="shortcut icon" href="favicon.png">
    </head>
    <body>
        @include('frontend.elements.header')

        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>

        @include('frontend.elements.footer')

        @yield('script')
    </body>
</html>