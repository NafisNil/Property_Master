@extends('frontend.layouts.master')

@push('css')

@endpush

@section('page_title')
User Manager
@endsection

@section('content')
<!-- ======= Hero Section ======= -->

<section id="topbar" style="padding-top: 80px!important;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 reg-box">
                <h2 class="title-blue-color">Welcome to School Optimizer</h2>
                <h4>Education for anyone, anywhere.</h4>
                <p>Dedicated Educational Service Provider for Registered Schools and Educational Institutionals</p>
                <div class="row">
                    <div class="col-md-6 title-blue-color">
                        <div class="input-group">
                            <input type="text" class="form-control textblubox" placeholder="Find your school">
                            <div class="input-group-append bg-blue-color">
                                <button class="btn btn-secondary" type="button"> 
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"><img src="{{ asset('assets/images/frontend/ttr.png')}}" alt="" class="img-fluid"></div>
                </div>
            </div>
            <div class="col-md-6 sign-box"> 
                <div class="signin text-center title-blue-color">
                    <h2>Sign Up</h2>
                    <p>or <a href="/authenticate/login">Click here</a> to Sign in</p>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-8 login-form">
                        <form>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Your Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="fullName" placeholder="Mr. John">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Your Email</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="emailaddr" placeholder="john@example.com">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Your Mobile / Phone</label>
                                <div class="input-group">
                                    <input type="tel" class="form-control" id="mobileno">
                                    <span class="input-group-addon" style="padding: 5px 20px; background: #ced4da; border-radius: 0 5px 5px 0;">Tel</span>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Password</label>
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control" type="password">
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true" style="padding: 11px 20px; background: #ced4da; border-radius: 0 5px 5px 0; margin: 0;"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                
                                        <button type="submit" class="btn btn-primary btn-block" style="width: 100%;">Submit</button>
   
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

<script type="text/javascript">
$("#mobileno").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});
$(document).ready(function () {
    $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("fa-eye-slash");
            $('#show_hide_password i').removeClass("fa-eye");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("fa-eye-slash");
            $('#show_hide_password i').addClass("fa-eye");
        }
    });
});
$(".reveal").on('click', function () {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
</script>
@endsection