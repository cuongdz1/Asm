<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{asset('assets/client/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('assets/client/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/owl.theme.default.min.css')}}">


    <link rel="stylesheet" href="{{asset('assets/client/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('assets/client/css/style.css')}}">

</head>

<body>

    <div class="site-wrap">
        @include('clients.blocks.header')
        

        @yield('content')

        @include('clients.blocks.footer')
    </div>

    <script src="{{asset('assets/client/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/client/js/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/client/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/client/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/client/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/client/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/client/js/aos.js')}}"></script>

    <script src="{{asset('assets/client/js/main.js')}}"></script>

</body>

</html>
