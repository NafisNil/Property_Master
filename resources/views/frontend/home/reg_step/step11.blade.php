<?php

$user = auth()->user();
$school = $user->school ?? null;
$authPerson = '';
if (!empty($school)) {
    $authPerson = $school->authorizedBy;
}

//Todo fill all fields
?>


<fieldset>
    <form method="post" action="{{route('reg.step-ten')}}">
        @csrf
        <div class="form-card">

            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Declaration Statement</h2>
                </div>
                <div class="col-5">
                    <h2 class="steps">Step 10 - 12</h2>
                </div>
            </div>
            <div class="reg-form">
                <div class='res-step-7 row'>
                    <div class="col-sm-12">
                        <div class="form-group mb-3">
                            <textarea name="creator_declaretion" rows="3" cols="50"
                                      style="width: 100%; padding: 10px; height: auto;" id="person_name">I .... as an authorized person certify that provided information on this account is correct, completed and prepared by authorized person from business owner or company director.</textarea>
                        </div>
                        <div
                            style="width: 100%; height: 17px; border-bottom: 1px solid black; text-align: center; margin: 30px 0 25px 0;">
                        <span style="font-size: 20px; background-color: #fff; padding: 0 10px;">
                            Declaration Statement Accepted by following Authorized Person
                        </span>
                        </div>
                        <div class='row'>
                            <div class="form-group mb-3 col-sm-6">
                                <label for="schoolName" class="form-label">Full Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" placeholder="" name="authp_name"
                                       value="{{$authPerson->name ?? ''}}"
                                >
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group mb-3 col-sm-6">
                                <label for="schoolName" class="form-label">Position</label>
                                <input type="text" class="form-control" placeholder="" name="authp_position"
                                       value="{{$authPerson->designation ?? ''}}"
                                >
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group mb-3 col-sm-6">
                                <label for="schoolName" class="form-label">Ph. Mobile</label><br/>
                                <input type="tel" class="form-control" id="mobilephnh"
                                       style="border-radius: 5px 0 0 5px;" name="authp_mobile"
                                       value="{{$authPerson->mobile_phone ?? ''}}"
                                >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3 col-sm-6">
                                <label for="schoolName" class="form-label">Ph. Office</label><br/>
                                <input type="tel" class="form-control" id="mobilephofh"
                                       style="border-radius: 5px 0 0 5px;" name="authp_phone"
                                       value="{{$authPerson->office_phone ?? ''}}"
                                >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group mb-3 col-sm-6">
                                <label for="schoolName" class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="" name="authp_email"
                                       value="{{$authPerson->email ?? ''}}">
                                <div class="valid-feedback"></div>
                            </div>

                            <div class="form-group mb-3 col-sm-6">
                                <label for="schoolName" class="form-label">Date and Time </label>
                                <input type='text' class="form-control" name="create_time"
                                       value="{{$authPerson->created_at ?? ''}}" readonly/>
                            </div>
                            <div class="form-group mb-3 col-sm-6">
                                <label for="schoolName" class="form-label">Address</label>
                                <textarea name="authp_address" rows="2" cols="50"
                                          style="width: 100%; padding: 10px; height: auto;"></textarea>
                            </div>
                        </div>

                        <!--                        <button class="btn btn-primary btn-lg">Confirm</button>
                                                <button class="btn btn btn-danger btn-lg">Decline</button>-->
                    </div>

                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{route('authenticate.createSchoolAccount', ['step' => 9])}}"  name="previous" type="button" class="btn btn-secondary previous action-button-previous reg-bck-btn">
                Previous
            </a>
            <button type="submit" class="btn btn-primary w-auto">Confirm And Continue</button>
        </div>

    </form>
</fieldset>
