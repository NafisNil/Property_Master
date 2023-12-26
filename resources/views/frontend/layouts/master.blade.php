<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="{{ asset('assets/images/logo/scpfav.png')}}" />
        <title>Home || School Optimizer</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css')}}"> 
        <!--<link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css')}}">-->
        <!--<link rel="stylesheet" href="{{ asset('assets/jquery-ui-1.12.1/jquery-ui.css') }}">-->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css?v=').time()}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/step.css?v=').time()}}">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        @include('frontend.layouts.header')
        @yield('content')
        @include('frontend.layouts.footer')
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('frontend/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
        <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
        <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>
        <!--<script src="{{ asset('assets/jquery-ui/jquery-ui.min.js') }}"></script>-->
        <!--<script src="{{ asset('assets/jquery-ui-1.12.1/jquery-ui.js') }}"></script>-->   
        <script src="{{ asset('frontend/assets/js/main.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/step.js')}}"></script>
         <script src="https://www.google.com/recaptcha/api.js"></script>
        @stack('js')
    </body>
</html>
