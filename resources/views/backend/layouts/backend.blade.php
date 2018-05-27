<!DOCTYPE html>
<html>
    <head>
        <title>Bootstrap Admin Theme v3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
        <!-- styles -->
        <link href="{{asset('backend/css/backend.css')}}" rel="stylesheet">
    </head>
    <body>
        @include('backend.elements.header')

        @yield('content')

        @include('backend.elements.footer')
    </body>