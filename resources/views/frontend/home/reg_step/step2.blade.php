<!-- fieldsets -->
<fieldset>
    <form action="{{route('reg.step-two')}}" method="post">
        @csrf
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Create Account</h2>
                </div>
                <div class="col-5">
                    <h2 class="steps">Step 2 - 14</h2>
                </div>
            </div>

            <div>
                <h3>Mobile Code : {{$mobileOtp}}</h3>
                <h3>Email Code: {{$emailOtp}}</h3>
            </div>

            <h4 class="reg-form-title">Mobile & email verification</h4>
            <p>Mobile verification code is sent to Your Mobile Number</p>
            <p>Email verification code is sent to Your email</p>
            <div class="reg-form row">
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="schoolCode" class="form-label">Mobile Verification Code<span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="" name="mobile_verification_code">
                        <small class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="schoolCode" class="form-label">Email Verification Code<span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="" name="email_verification_code">
                        <small class="form-text text-muted"></small>
                    </div>
                </div>
            </div>
        </div>
        <!--<input type="button" name="next" class="" value="Next"/>-->
        <button name="next" type="submit" class="btn btn-primary next action-button reg-nxt-btn">Next</button>
        <button name="previous" type="button" class="btn btn-secondary previous action-button-previous reg-bck-btn"
                disabled
                style=" float: left;">Previous
        </button>
    </form>
</fieldset>
