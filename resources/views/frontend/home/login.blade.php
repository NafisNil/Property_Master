@extends('frontend.layouts.master')

@push('css')

@endpush

@section('page_title')
User Manager
@endsection

@section('content')
<!-- ======= Hero Section ======= -->

<section id="topbar">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 reg-box">
                <h2 class="frst-title">Welcome to <br /><span class="sndtitle">Education and Change</span></h2>
                <h4 class="thrd-title">Education for anyone, anywhere.</h4>
                <div class="login-left row">
                    <div class="col-sm-6 login-left-cont">
                        Achieve your goals. Earn a degree or certificate from any of school, living in any part of the world
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('assets/images/frontend/school.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 title-blue-color">
                        <div class="input-group search-box">
                            <input type="text" class="form-control textblubox" placeholder="Find your school">
                            <div class="input-group-append bg-blue-color">
                                <button class="btn btn-secondary" type="button">
                                    <i class="fa fa-search sclsrc-icn"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="sign-box">
                    <div class="signin text-center title-blue-color">
                        <h2>Sign in to {{config('app.name')}}</h2>
                        <p>or use email address for registration</p>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-10 login-form">
                            <form method="POST" action="{{ route('authenticate.make_login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="email">Email or Phone</label>
                                    <input type="email" class="form-control sign-in-input" id="user-email" aria-describedby="emailHelp" placeholder="" name="email">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Password">Password</label>
                                    <input type="password" class="form-control sign-in-input" id="user-passsword" placeholder="" name="password">
                                </div>
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="email">SecurityPin</label>
                                            <input type="text" class="form-control sign-in-input" placeholder="">
                                        </div>
                                        <div class="col">
                                            <label for="ConfirmPin">Confirm Pin</label>
                                            <input type="text" class="form-control sign-in-input" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary btn-block" style="width: 100%;">Submit</button>
                                </div>
                                <div class="form-group mb-3 text-center">
                                    <div class="row">
                                        <a href="#" style="color: #444444;">Forgot Password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="crt-accnt row">
                    <div class="col align-middle col-md-4">
                        <a class="btn btn-primary" href="#" >Create New Account</a>
                    </div>
                    <div class=" col-md-3 text-center">
                        <span>Or Signin with</span>
                    </div>
                    <div class="col-md-5 text-right">
                        <a href="#" class="bx bxl-linkedin signin-scl-icn"></a>
                        <a href="#" class="bx bxl-facebook signin-scl-icn"></a>
                        <a href="#" class="bx bxl-google signin-scl-icn"></a>
                        <a href="#" class="bx bxl-twitter signin-scl-icn"></a>
                        <a href="#" class="bx bxl-youtube signin-scl-icn"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->
@endsection
