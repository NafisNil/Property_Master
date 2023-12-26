<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/scpfav.png')}}" />
        <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css')}}">
	<link rel="stylesheet" href="{{ asset('css/custom.css?v=').time()}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/toastr/toastr.min.css')}}">
</head>
<body class="sidebar-dark">
<div class="main-wrapper">
    <div class="page-wrapper full-page login-home">
        <div class="page-content d-flex align-items-center justify-content-center">

            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-6 col-xl-4 mx-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12 pl-md-0">
                                <div class="auth-form-wrapper px-4 py-5">
                                    <a href="#" class="noble-ui-logo d-block mb-2">School<span> Optimizer</span></a>
                                    <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your school.</h5>
                                    <form method="POST" action="{{ route('admin.post-login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" placeholder="Enter email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
{{--                                        <div class="form-check form-check-flat form-check-primary">--}}
{{--                                            <label class="form-check-label" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                                                <input type="checkbox" class="form-check-input">--}}
{{--                                                Remember me--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('assets/vendors/core/core.js')}}"></script>
<script src="{{ asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{ asset('assets/js/template.js')}}"></script>
<script src="{{asset('assets/vendors/toastr/toastr.min.js')}}"></script>
{!! Toastr::message() !!}
</body>
</html>
