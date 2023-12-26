@extends('frontend.layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">

@endpush

@section('page_title')
    School Account Create Step 1
@endsection

@section('content')
    <!-- ======= Hero Section ======= -->

    <section id="topbar" class="d-flex flex-column justify-content-center align-items-center"
             style="padding-top: 0!important;">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 text-center p-0 mt-3 mb-2">
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                        <h2 id="heading">Create Your School Account</h2>
                        <p>Fill all form field to go to next step</p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div id="msform">
                            <!-- progressbar -->

                            <input type="hidden" value="{{$step ?? 1}}"
                                   id="current_step"
                            />

                            <div class="row">
                                <div class="col-sm-4">
                                    <ul id="progressbar">
                                        <li class="{{$step >= 1 ? 'active' : ''}}" id="startreg"><span
                                                class="step-menu">Start / Signup</span>
                                        </li>
                                        <li class="{{$step >= 2 ? 'active' : ''}}" id="emverify"><span
                                                class="step-menu">Verification</span>
                                        </li>
                                        <li class="{{$step >= 3 ? 'active' : ''}}" id="signup"><span class="step-menu">Basic Information</span>
                                        </li>
                                        <li class="{{$step >= 4 ? 'active' : ''}}" id="payment_info"><span
                                                class="step-menu">Payment Info</span></li>
                                        <li class="{{$step >= 5 ? 'active' : ''}}" id="profiles"><span
                                                class="step-menu">Company Profiles</span></li>
                                        <li class="{{$step >= 6 ? 'active' : ''}}" id="contact-persons"><span
                                                class="step-menu">Contacts Persons</span></li>
                                        <li class="{{$step >= 7 ? 'active' : ''}}" id="school-level"><span
                                                class="step-menu">School Level</span></li>
                                        <li class="{{$step >= 8 ? 'active' : ''}}" id="service-plan"><span
                                                class="step-menu">Service Plan</span></li>
                                        <li class="{{$step >= 9 ? 'active' : ''}}" id="service-cotract"><span
                                                class="step-menu">Service Contract</span></li>

                                        <li class="{{$step >= 10 ? 'active' : ''}}" id="user-agreement"><strong>User
                                                Agreement </strong></li>
                                        <li class="{{$step >= 11 ? 'active' : ''}}" id="declaration-statement"><strong>Declaration
                                                Statement</strong></li>
                                        <li class="{{$step >= 12 ? 'active' : ''}}" id="documentSubmission"><strong>Documents'
                                                Submission</strong></li>
                                        <li class="{{$step >= 13 ? 'active' : ''}}" id="activationStatus"><strong>Activation
                                                Status</strong></li>
                                        <li id="temp-sig-in"><strong>Temporary Sign in</strong></li>
                                        <li id="completed"><strong>Completed</strong></li>
                                    </ul>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        @include('partials.error-alert', ['errors' => $errors])
                                    </div>

                                    @switch($step)
                                        @case(2)
                                            @include('frontend.home.reg_step.step2')
                                            @break
                                        @case(3)
                                            @include('frontend.home.reg_step.step3', ['school' => $school])
                                            @break
                                        @case(4)
                                            @include('frontend.home.reg_step.step4', ['payment' => $payment])
                                            @break
                                        @case(5)
                                            @include('frontend.home.reg_step.step5', ['company' => $company])
                                            @break
                                        @case(6)
                                            @include('frontend.home.reg_step.step6', ['contacts' => $contacts])
                                            @break
                                        @case(7)
                                            @include('frontend.home.reg_step.step7', ['school' => $school])
                                            @break
                                        @case(8)
                                            @include('frontend.home.reg_step.step8')
                                            @break
                                        @case(9)
                                            @include('frontend.home.reg_step.step9')
                                            @break
                                        @case(10)
                                            @include('frontend.home.reg_step.step10')
                                            @break
                                        @case(11)
                                            @include('frontend.home.reg_step.step11')
                                            @break
                                        @case(12)
                                            @include('frontend.home.reg_step.step12')
                                            @break
                                        @case(13)
                                            @include('frontend.home.reg_step.step13')
                                            @break;
                                        @default
                                        @case(1)
                                            @include('frontend.home.reg_step.step1')

                                    @endswitch

                                    {{--@include('frontend.home.reg_step.step'.$step)--}}

                                    {{-- @include('frontend.home.reg_step.step2')
                                    @include('frontend.home.reg_step.step3')
                                    @include('frontend.home.reg_step.step4')
                                    @include('frontend.home.reg_step.step5')
                                    @include('frontend.home.reg_step.step6')
                                    @include('frontend.home.reg_step.step7')
                                    @include('frontend.home.reg_step.step8')
                                    @include('frontend.home.reg_step.step9')
                                    @include('frontend.home.reg_step.step10')
                                    @include('frontend.home.reg_step.step11')
                                    @include('frontend.home.reg_step.step12')
                                    @include('frontend.home.reg_step.step13')
                                    @include('frontend.home.reg_step.step14')
                                    <!--@include('frontend.home.reg_step.step15')

                                    --}}
                                </div>
                            </div>
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
        $("#office-phone").intlTelInput({
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
        });
        $("#office-mobile").intlTelInput({
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
        });
        $("#office-emargency").intlTelInput({
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
        });
        $("#mobilephnh").intlTelInput({
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
        });
        $("#mobilephofh").intlTelInput({
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
        });
        $(document).ready(function () {
            $("#add-more").click(function (e) {
                // Create clone of <div class='input-form'>
                //var newel = $('.res-step-2').clone();

                let el = $(this).prev().clone();


                // Add after last <div class='input-form'>
                $(el).insertAfter($(this).prev());

            });

        });
    </script>
@endsection
