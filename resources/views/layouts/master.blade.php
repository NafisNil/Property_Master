<!DOCTYPE html>
<html lang="{{app()->getLocale() || 'en'}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/scpfav.png')}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title')</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/custom.css?v=').time()}}">
    <link href="{{asset('assets/vendors/sweetalert2/sweetalert2.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/vendors/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/vendors/plugins/css/plugins.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/vendors/plugins/css/components.min.css?v=').time()}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/vendors/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/vendors/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css"/>

    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">

    <style>
        .table th, .table td {
            padding: 0.437rem 0.4687rem !important;
            border-top: 1px solid #e8ebf1;
        }
    </style>

    @stack('css')

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

    <audio id="success-audio">
        <source src="{{ asset('/audio/success.ogg') }}" type="audio/ogg">
        <source src="{{ asset('/audio/success.mp3') }}" type="audio/mpeg">
    </audio>
    <audio id="error-audio">
        <source src="{{ asset('/audio/error.ogg') }}" type="audio/ogg">
        <source src="{{ asset('/audio/error.mp3') }}" type="audio/mpeg">
    </audio>
    <audio id="warning-audio">
        <source src="{{ asset('/audio/warning.ogg') }}" type="audio/ogg">
        <source src="{{ asset('/audio/warning.mp3') }}" type="audio/mpeg">
    </audio>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

<script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('js/datatable_custom.js') }}"></script>

<!-- JS of plugins will be added here -->
<!-- It should be above of any custom js -->
<!-- because they might be dependent on these plugins -->

<script type="text/javascript" src="{{asset('assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>

<script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
{!! Toastr::message() !!}

@stack('plugin-js')

<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

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
    $(".sodate").datepicker({dateFormat: 'yy-mm-dd'});

    //setup token for every page on load

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


</script>

@stack('js')

</body>
</html>
