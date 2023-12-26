<fieldset>
    <form method="post" action="{{route('reg.step-four')}}">
        @csrf
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Create Account</h2>
                </div>
                <div class="col-5">
                    <h2 class="steps">Step 5 - 14</h2>
                </div>
            </div>
            <div class="reg-form">
                <div class='res-step-3 row'>
                    <h4 class="reg-form-title">Company Profiles</h4>

                    <div class="reg-form row">
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Legal Name*<span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="legal_name"
                                value="{{$company->legal_name ?? ''}}"
                                >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Registration No<span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="registration_no"
                                value="{{$company->registration_no ?? ''}}"
                                >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <h5>Office Address</h5>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Country <span
                                        style="color: red;">*</span></label>
                                <select name="country" class="countries form-control" id="countryId">
                                    <option value="">Select Country</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">State <span
                                        style="color: red;">*</span></label>
                                <select name="state" class="states form-control" id="stateId">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">City <span
                                        style="color: red;">*</span></label>
                                <select name="city" class="cities form-control" id="cityId">
                                    <option value="">Select City</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Street Name <span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control"  name="street"
                                value="{{$company->address->street ?? ''}}"
                                >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Zip Code<span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control"  name="zip"
                                value="{{$company->address->zip ?? ''}}"
                                >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Address<span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="address"
                                value="{{$company->address->name ?? ''}}"
                                >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <h5>Contacts</h5>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Office Phone</label><br/>
                                <input type="tel" class="form-control" id="office-phone"
                                       style="border-radius: 5px 0 0 5px; padding: 8px 20px 8px 50px"
                                       name="office"
                                        value="{{$company->contact->office ?? ''}}"
                                >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Mobile</label><br/>
                                <input type="tel" class="form-control" id="mobile"
                                       style="border-radius: 5px 0 0 5px; padding: 8px 20px 8px 50px" name="mobile"
                                    value="{{$company->contact->mobile ?? ''}}"
                                >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Emergency</label><br/>
                                <input type="tel" class="form-control" id="office-emergency"
                                       style="border-radius: 5px 0 0 5px; padding: 8px 20px 8px 50px" name="emergency_phone"
                                    value="{{$company->contact->emergency_phone ?? ''}}"
                                >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email"
                                       value="{{$company->contact->email ?? ''}}"
                                >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Fax No.</label>
                                <input type="text" class="form-control" name="fax"
                                value="{{$company->contact->email ?? ''}}"
                                >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Website</label>
                                <input type="text" class="form-control"  name="website"
                                value="{{$company->contact->website ?? ''}}"
                                >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button name="next" type="submit" class="btn btn-primary next action-button reg-nxt-btn">Next</button>
        <a href="{{route('authenticate.createSchoolAccount', ['step' =>4])}}" name="previous" type="button" class="btn btn-secondary previous action-button-previous reg-bck-btn"
                style=" float: left;">Previous
        </a>
    </form>
</fieldset>
