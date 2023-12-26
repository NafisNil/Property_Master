<fieldset>
    <form method="post" action="{{route("reg.step-three")}}">
        @csrf
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Create Account</h2>
                </div>
                <div class="col-5">
                    <h2 class="steps">Step 3 - 14</h2>
                </div>
            </div>
            <div class="reg-form">

                <input type="hidden" name="school_id" value="{{$school->id ?? ''}}"
                />

                <div class='res-step-2 row'>
                    <h4 class="reg-form-title">Basic Information</h4>
                    <p><strong>Welcome to Schools Optimizer</strong></p>
                    <p><strong>Dear valued customer,</strong></p>
                    <p>Thank you for signing up with us! We are thrilled to have you as a new customer and look forward
                        to providing you with the best experience possible. With your new account, you now have access
                        to our range of services, and we are confident that you will find something that suits your
                        needs and exceeds your expectations.</p>
                    <p>Please don't hesitate to reach out to us if you have any questions or concerns. Our team is
                        always here to help and support you in any way we can. Additionally, we encourage you to join
                        our Direct Admin option to make your system administrator directly to our operation manager to
                        resolve any issue or concern.</p>
                    <p>To complete the account creation process, kindly proceed to the "Create Account" section and
                        choose your preferred services. After completing the account creation, kindly fax Form A108 to
                        our office at fax number 1-888-888-888 to proceed with the payment. Once your payment has been
                        approved, we will contact you by phone to provide you with a PIN code for signing in.</p>
                    <p>Thank you again for choosing our services, and we hope you have a great experience with us!</p>
                    <p><strong>Best regards,</strong></p>
                    <p><strong>Schools Optimizer Team</strong></p>
                    <h4>Company Profile</h4>
                    <div class="reg-form row">
                        <div
                            style="width: 100%; height: 17px; border-bottom: 1px solid black; text-align: center; margin: 30px 0 25px 0;">
                        <span style="font-size: 20px; background-color: #fff; padding: 0 10px;">
                            School Information
                        </span>
                        </div>
                        <div class="form-group mb-3 col-sm-6">
                            <label for="schoolCode" class="form-label">School Code <span
                                    style="color: red;">*</span></label>
                            <input type="text" readonly class="form-control" id="schoolCode"
                                   value="{{$school->school_code ?? time()}}"
                                   name="school_code" required
                            >
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group mb-3 col-sm-6">
                            <label for="schoolName" class="form-label">School Name <span
                                    style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="schoolName" placeholder="The York School"
                                   name="name" required
                                   value="{{$school->name ?? ''}}"
                            >
                            <div class="valid-feedback"></div>
                        </div>
                        <div class="form-group mb-3 col-sm-6">
                            <label for="schoolName" class="form-label">School Website</label>
                            <input type="text" class="form-control" id="schoolWebsite"
                                   placeholder="www.theyorkschool.edu" name="school_website"
                                value="{{$school->website ?? ''}}"
                            >
                            <div class="valid-feedback"></div>
                        </div>
                        <div class="form-group mb-3 col-sm-6">
                            <label for="schoolName" class="form-label">School Email</label>
                            <input type="email" class="form-control" id="schoolEmail" placeholder=""
                                   name="school_email"
                                    value="{{$school->email ?? ''}}"
                            >
                            <div class="valid-feedback"></div>
                        </div>
                        <div class="form-group mb-3 col-sm-6">
                            <label for="schoolName" class="form-label">School Phone</label><br/>
                            <input type="tel" class="form-control" id="schoolPhone" style="border-radius: 5px 0 0 5px;"
                                   name="school_phone" value="{{$school->phone ?? ''}}">
                            <span class="input-group-addon"
                                  style="padding: 10px 20px; background: #ced4da; border-radius: 0 5px 5px 0; margin-left: -5px;">Tel</span>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="form-group mb-3 col-sm-6">
                            <label for="schoolName" class="form-label">School Address</label>
                            <input type="text" class="form-control" id="schoolAddress" placeholder=""
                                   name="school_address"
                                   value="{{$school->address->name ?? ''}}"
                            >
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
                        <div class="form-group mb-3 col-sm-6">
                            <label for="schoolName" class="form-label">Street Name</label>
                            <input type="text" class="form-control" id="schoolStreet" placeholder=""
                                   name="school_street" value="{{$school->address->street ?? ''}}">
                            <div class="valid-feedback"></div>
                        </div>
                        <div class="form-group mb-3 col-sm-6">
                            <label for="schoolName" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="schoolZip" placeholder="" name="school_zip"
                                   value="{{$school->address->zip ?? ''}}"
                            >
                            <div class="valid-feedback"></div>
                        </div>

                        <div
                            style="width: 100%; height: 17px; border-bottom: 1px solid black; text-align: center; margin: 30px 0 25px 0;">
                        <span style="font-size: 20px; background-color: #fff; padding: 0 10px;">
                            Declaration Statement
                        </span>
                        </div>
                        <div class="form-group mb-3">
                            <textarea name="creator_declaration" rows="3" cols="50"
                                      style="width: 100%; padding: 10px; height: auto;" id="person_name">I .... as an authorized person certify that provided information on this account is correct, completed and prepared by authorized person from business owner or company director.</textarea>
                        </div>
                        <div
                            style="width: 100%; height: 17px; border-bottom: 1px solid black; text-align: center; margin: 30px 0 25px 0;">
                        <span style="font-size: 20px; background-color: #fff; padding: 0 10px;">
                            Declaration Statement Accepted by following Authorized Person
                        </span>
                        </div>

                        <div class="form-group mb-3 col-sm-6">
                            <label for="schoolName" class="form-label">Full Name <span
                                    style="color: red;">*</span></label>
                            <input type="text" class="form-control" placeholder="" name="authp_name" required
                                   value="{{$school->authorizedBy->name ?? ''}}"
                                   />

                        </div>
                        <div class="form-group mb-3 col-sm-6">
                            <label for="schoolName" class="form-label">Position</label>
                            <input type="text" class="form-control" placeholder="" name="authp_position"
                            value="{{$school->authorizedBy->designation ?? ''}}"
                            >
                            <div class="valid-feedback"></div>
                        </div>
                        <div class="form-group mb-3 col-sm-6">
                            <label for="schoolName" class="form-label">Ph. Mobile</label><br/>
                            <input type="tel" class="form-control" style="border-radius: 5px 0 0 5px;"
                                   name="authp_mobile"
                                value="{{$school->authorizedBy->mobile_phone ?? ''}}"
                            >
                            <span class="input-group-addon"
                                  style="padding: 10px 20px; background: #ced4da; border-radius: 0 5px 5px 0; margin-left: -5px;">Tel</span>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="form-group mb-3 col-sm-6">
                            <label for="schoolName" class="form-label">Ph. Office</label><br/>
                            <input type="tel" class="form-control" id="mobilephof" style="border-radius: 5px 0 0 5px;"
                                   name="authp_phone"
                                value="{{$school->authorizedBy->office_phone ?? ''}}"
                            >
                            <span class="input-group-addon"
                                  style="padding: 10px 20px; background: #ced4da; border-radius: 0 5px 5px 0; margin-left: -5px;">Tel</span>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="form-group mb-3 col-sm-6">
                            <label for="schoolName" class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="" name="authp_email"
                            value="{{$school->authorizedBy->email ?? ''}}"
                            >
                            <div class="valid-feedback"></div>
                        </div>
                        <div class="form-group mb-3 col-sm-6">
                            <label for="schoolName" class="form-label">Address</label>
                            <input type='text' name="authp_address" class="form-control"
                                   value="{{$school->authorizedBy->address ?? ''}}"
                            >
                        </div>
                        <div class="form-group mb-3 col-sm-6">
                            <label for="schoolName" class="form-label">Date and Time </label>
                            <input type='text' class="form-control" name="create_time"
                                   value="{{date("d M, Y h:i A", time())}}" readonly/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <button name="next" type="submit" class="btn btn-primary next action-button reg-nxt-btn">Next</button>
        <button name="previous" type="button" class="btn btn-secondary previous action-button-previous reg-bck-btn"
                disabled
                style=" float: left;">Previous
        </button>
    </form>
</fieldset>
