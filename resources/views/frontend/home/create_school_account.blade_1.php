@extends('frontend.layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
@endpush

@section('page_title')
User Manager
@endsection

@section('content')
<!-- ======= Hero Section ======= -->

<section id="topbar" class="d-flex flex-column justify-content-center align-items-center" style="padding-top: 80px!important;">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col col-sm-8 col-md-6">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2 id="heading" class="text-center">Create Your School Account</h2>

                    <div class="login-form">
                        <form method="POST" action="{{ route('authenticate.createSchoolStore') }}">
                            @csrf
                            <div style="width: 100%; height: 17px; border-bottom: 1px solid black; text-align: center; margin: 30px 0 25px 0;">
                                <span style="font-size: 20px; background-color: #fff; padding: 0 10px;">
                                    School Information
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">School Code <span style="color: red;">*</span></label>
                                <input type="text" readonly class="form-control" id="schoolCode" value="{{time()}}" name="school_code" required>
                                <small class="form-text text-muted"></small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">School Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="schoolName" placeholder="The York School" name="school_name" required>
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">School Website</label>
                                <input type="text" class="form-control" id="schoolWebsite" placeholder="www.theyorkschool.edu" name="school_website">
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">School Email</label>
                                <input type="email" class="form-control" id="schoolEmail" placeholder="" name="school_email">
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">School Phone</label><br />
                                <input type="tel" class="form-control" id="schoolPhoe" style="border-radius: 5px 0 0 5px;" name="school_phone">
                                <span class="input-group-addon" style="padding: 10px 20px; background: #ced4da; border-radius: 0 5px 5px 0; margin-left: -5px;">Tel</span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">School Address</label>
                                <input type="text" class="form-control" id="schoolAddress" placeholder="" name="school_address">
                                <div class="valid-feedback"></div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="schoolName" class="form-label">Country</label>
                                        <select name="school_country" class="countries form-control" id="countryId">
                                            <option value="">Select Country</option>
                                        </select>

                                    </div>
                                    <div class="col-sm-4">
                                        <label for="schoolName" class="form-label">State</label>
                                        <select name="school_state" class="states form-control" id="stateId">
                                            <option value="">Select State</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="schoolName" class="form-label">City</label>       
                                        <select name="school_city" class="cities form-control" id="cityId">
                                            <option value="">Select City</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Street Name</label>
                                <input type="text" class="form-control" id="schoolStreet" placeholder="" name="school_street">
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Zip Code</label>
                                <input type="text" class="form-control" id="schoolZip" placeholder="" name="school_zip">
                                <div class="valid-feedback"></div>
                            </div> 
                            <div style="width: 100%; height: 17px; border-bottom: 1px solid black; text-align: center; margin: 30px 0 25px 0;">
                                <span style="font-size: 20px; background-color: #fff; padding: 0 10px;">
                                    This Account Created By
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" placeholder="" name="creator_name" id="creator_name" required>
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Email <span style="color: red;">*</span></label>
                                <input type="email" class="form-control" placeholder="" name="screator_email" required>
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Phone <span style="color: red;">*</span></label><br />
                                <input type="tel" class="form-control" id="mobilenoper" style="border-radius: 5px 0 0 5px;" name="creator_phone" required>
                                <span class="input-group-addon" style="padding: 10px 20px; background: #ced4da; border-radius: 0 5px 5px 0; margin-left: -5px;">Tel</span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Password <span style="color: red;">*</span></label>
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control" type="password" name="password" required>
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true" style="padding: 11px 20px; background: #ced4da; border-radius: 0 5px 5px 0; margin: 0;"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div style="width: 100%; height: 17px; border-bottom: 1px solid black; text-align: center; margin: 30px 0 25px 0;">
                                <span style="font-size: 20px; background-color: #fff; padding: 0 10px;">
                                    Declaration Statement
                                </span> 
                            </div>
                            <div class="form-group mb-3">
                                <textarea name="creator_declaretion" rows="3" cols="50" style="width: 100%; padding: 10px; height: auto;" id="person_name">I .... as an authorized person certify that provided information on this account is correct, completed and prepared by authorized person from business owner or company director.</textarea>
                            </div>
                            <div style="width: 100%; height: 17px; border-bottom: 1px solid black; text-align: center; margin: 30px 0 25px 0;">
                                <span style="font-size: 20px; background-color: #fff; padding: 0 10px;">
                                    Declaration Statement Accepted by following Authorized Person
                                </span> 
                            </div>

                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Full Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" placeholder="" name="authp_name" required>
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Position</label>
                                <input type="text" class="form-control" placeholder="" name="authp_position">
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Ph. Mobile</label><br />
                                <input type="tel" class="form-control" id="mobilephm" style="border-radius: 5px 0 0 5px;" name="authp_mobile">
                                <span class="input-group-addon" style="padding: 10px 20px; background: #ced4da; border-radius: 0 5px 5px 0; margin-left: -5px;">Tel</span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Ph. Office</label><br />
                                <input type="tel" class="form-control" id="mobilephof" style="border-radius: 5px 0 0 5px;" name="authp_phone">
                                <span class="input-group-addon" style="padding: 10px 20px; background: #ced4da; border-radius: 0 5px 5px 0; margin-left: -5px;">Tel</span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="" name="authp__email">
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Location</label>
                                <textarea name="authp_address" rows="2" cols="50" style="width: 100%; padding: 10px; height: auto;" ></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Date and Time </label>
                                <input type='text' class="form-control" name="create_time" value="{{date("d M, Y h:i A", time())}}" readonly />
                            </div>
                            <button type="submit" name="btn_school_info" class="btn btn-primary">Submit</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>


<script src="{{ asset('assets/js/countrystatecity.js')}}"></script>
<script type="text/javascript">
$("#mobileno").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});
$("#mobilenoper").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});
$("#schoolPhoe").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});
$("#mobilephm").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});
$("#mobilephof").intlTelInput({
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
$('#autho_name').change(function(){
    $('#person_name').val('I ' + this.value + ' as an authorized person certify that provided information on this account is correct, completed and prepared by authorized person from business owner or company director.');
});
</script> 
@endsection