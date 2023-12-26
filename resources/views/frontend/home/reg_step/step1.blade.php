<!-- fieldsets -->

<fieldset>
    <form method="POST" action="{{route('reg.step-one')}}">
        @csrf
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Create Account</h2>
                </div>
                <div class="col-5">
                    <h2 class="steps">Step 1 - 12</h2>
                </div>
            </div>
            <h4 class="reg-form-title">Sign Up</h4>

            <div class="reg-form row">
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="companyName" class="form-label">Company Name <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="" name="company_name">
                        <small class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="UserName" class="form-label">User Name<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="" name="user_name">
                        <small class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password<span style="color: red;">*</span></label>
                        <input type="password" class="form-control" value="" name="password">
                        <small class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password<span
                                style="color: red;">*</span></label>
                        <input type="password" class="form-control" value="" name="confirm_password">
                        <small class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" value="" name="email">
                        <small class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="phone" class="form-label">Mobile</label><br/>
                        <input type="text" class="form-control" name="mobile_phone">
                        <small class="form-text text-muted"></small>
                    </div>
                </div>
                <!--                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        &lt;!&ndash;<label for="phone" class="form-label">I am Not a robot</label><br />&ndash;&gt;
                                        <div class="g-recaptcha" data-sitekey="6LfLa_ElAAAAAJDvy88TudQHzIVsRTaUfDPL1ivk"
                                             data-callback="verifyRecaptchaCallback"
                                             data-expired-callback="expiredRecaptchaCallback"></div>
                                        <input name="captcha" class="form-control d-none" data-recaptcha="true" required
                                               data-error="Please complete the Captcha">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>-->
            </div>
        </div>
        <button name="next" type="submit" class="btn btn-primary reg-nxt-btn">Next</button>
    </form>
</fieldset>

