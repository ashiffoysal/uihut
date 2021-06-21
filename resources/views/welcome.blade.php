<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-base-url" content="{{ url('api/') }}" />
 
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <title>aabbro</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Jquery ui CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/jquery-ui.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/font-awesome.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/owl.theme.default.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/animate.css">
    <!-- Main StyleSheet CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/responsive.css">

    <!-- Favicon -->

    <link rel="shortcut icon" type="image/png" href="{{asset('public/frontend')}}/assets/img/favicon.ico">

    <script> window._asset = '{{ asset('') }}'; </script>


</head>

<body>
    <div id="app">
        <main-component></main-component>
    </div>
</body>
    <!-- Scripts -->
    <!-- jQuery Plugin -->
    <script src="{{asset('public/frontend')}}/assets/js/jquery-3.2.0.min.js"></script>
    <script src="{{asset('public/frontend')}}/assets/js/jquery-ui.js"></script>
    <!-- Owl Carousel Plugin -->
    <script src="{{asset('public/frontend')}}/assets/js/owl.carousel.min.js"></script>
    <!-- Main Counterup Plugin-->
    <script src="{{asset('public/frontend')}}/assets/js/jquery.counterup.min.js"></script>
    <script src="{{asset('public/frontend')}}/assets/js/countdown.js"></script>
    <script src="{{asset('public/frontend')}}/assets/js/jquery.scrollUp.js"></script>
    <script src="{{asset('public/frontend')}}/assets/js/jquery.waypoints.min.js"></script>
    <script src="{{asset('public/frontend')}}/assets/js/wow.min.js"></script>
    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <!-- Main Script -->
    <script src="{{asset('public/frontend')}}/assets/js/theme.js"></script>
    <script src="{{asset('public/js/app.js')}}"></script>

</html>