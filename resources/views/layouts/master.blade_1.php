<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="{{ asset('assets/images/logo/scpfav.png')}}" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('page_title')</title>
        <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css')}}">
        <link rel="stylesheet" href="{{ asset('css/custom.css?v=').time()}}">
        <link href="{{asset('assets/vendors/sweetalert2/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendors/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendors/plugins/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendors/plugins/css/components.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendors/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendors/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />-->
        <style>
            .table th, .table td {
                padding: 0.437rem 0.4687rem !important;
                border-top: 1px solid #e8ebf1;
            }
        </style>

        @stack('css')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </head>
    <body class="sidebar-dark">
        <div class="main-wrapper">

            @include('layouts.sidebar')

            <div class="page-wrapper">

                @include('layouts.navbar')

                <div class="page-content">

                    @yield('content')

                </div>

                @include('layouts.footer')

            </div>
        </div>

        <script src="{{ asset('assets/vendors/core/core.js')}}"></script>
        <script src="{{ asset('assets/js/template.js')}}"></script>
        <script src="{{ asset('assets/js/dashboard.js')}}"></script>
        <script src="{{ asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.js')}}"></script>
        <script src="{{ asset('assets/vendors/promise-polyfill/polyfill.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/datatables/datatable.js')}}"></script>
        <script src="{{ asset('assets/vendors/datatables/datatables.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/datatables/plugins/bootstrap/datatables.bootstrap.js')}}"></script>
        <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>-->
        <script>
    $("#showmenu").click(function (e) {
        e.preventDefault();
        $("#menu").toggleClass("show");
    });
    $(".par_menu").click(function (event) {
        event.preventDefault();
        if ($(this).next('ul').length) {
            $(this).next().toggle('fast');
            $(this).children('i:last-child').toggleClass('fa-caret-down fa-caret-left');
        }
    });
        </script>
        @stack('js')

    </body>
</html>
