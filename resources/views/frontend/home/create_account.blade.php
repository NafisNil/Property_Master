@extends('frontend.layouts.master')

@push('css')

@endpush

@section('page_title')
    User Manager
@endsection

@section('content')
<!-- ======= Hero Section ======= -->

<section id="topbar" class="d-flex flex-column justify-content-center align-items-center" style="padding-top: 80px!important;">
    <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2 id="heading">Sign Up Your User Account</h2>
                <p>Fill all form field to go to next step</p>

                <form id="msform">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="account"><strong>Registration</strong></li>
                        <li id="profiles"><strong>Profiles</strong></li>
                        <li id="contact-persons"><strong>Contacts Persons</strong></li>
                        <li id="service-plan"><strong>Service Plan</strong></li>
                        <li id="service-cotract"><strong>Service Contract</strong></li>
                        <li id="user-agreement"><strong>User Agreement </strong></li>
                        <li id="declaration"><strong>Declaration</strong></li>
                        <li id="documentSubmission"><strong>Documents' Submission</strong></li>
                        <li id="activationStatus"><strong>Activation Status</strong></li>
                        <li id="temp-sig-in"><strong>Temporary Sign in</strong></li>
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <br>
                    <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Account Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 1 - 10</h2>
                                </div>
                            </div>
                            <table class="table table-borderless">
                                <thead>
                                  <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Company</th>
                                    <th scope="col">School</th>
                                    <th scope="col">Ministry of Education</th>
                                    <th scope="col">Business License</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">Legal Name </th>
                                    <td><input type="text" name="company_name" /></td>
                                    <td><input type="text" name="school_name" /></td>
                                    <td><input type="text" name="min_edu_name" /></td>
                                    <td><input type="text" name="busi_lic_name" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Registration No</th>
                                    <td><input type="text" name="company_reg" /></td>
                                    <td><input type="text" name="school_reg" /></td>
                                    <td><input type="text" name="min_edu_reg" /></td>
                                    <td><input type="text" name="busi_lic_reg" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Office Address:</th>
                                    <td colspan="2"></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Number</th>
                                    <td><input type="text" name="company_reg" /></td>
                                    <td><input type="text" name="school_reg" /></td>
                                    <td><input type="text" name="min_edu_reg" /></td>
                                    <td><input type="text" name="busi_lic_reg" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Street</th>
                                    <td><input type="text" name="company_reg" /></td>
                                    <td><input type="text" name="school_reg" /></td>
                                    <td><input type="text" name="min_edu_reg" /></td>
                                    <td><input type="text" name="busi_lic_reg" /></td>
                                  </tr><tr>
                                    <th scope="row">City</th>
                                    <td><input type="text" name="company_reg" /></td>
                                    <td><input type="text" name="school_reg" /></td>
                                    <td><input type="text" name="min_edu_reg" /></td>
                                    <td><input type="text" name="busi_lic_reg" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">State/ Province</th>
                                    <td><input type="text" name="company_reg" /></td>
                                    <td><input type="text" name="school_reg" /></td>
                                    <td><input type="text" name="min_edu_reg" /></td>
                                    <td><input type="text" name="busi_lic_reg" /></td>
                                  </tr><tr>
                                    <th scope="row">Country</th>
                                    <td><input type="text" name="company_reg" /></td>
                                    <td><input type="text" name="school_reg" /></td>
                                    <td><input type="text" name="min_edu_reg" /></td>
                                    <td><input type="text" name="busi_lic_reg" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Zip / Postal Code</th>
                                    <td><input type="text" name="company_reg" /></td>
                                    <td><input type="text" name="school_reg" /></td>
                                    <td><input type="text" name="min_edu_reg" /></td>
                                    <td><input type="text" name="busi_lic_reg" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Contacts:</th>
                                    <td colspan="2"></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Phone No</th>
                                    <td><input type="text" name="company_reg" /></td>
                                    <td><input type="text" name="school_reg" /></td>
                                    <td><input type="text" name="min_edu_reg" /></td>
                                    <td><input type="text" name="busi_lic_reg" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Mobile</th>
                                    <td><input type="text" name="company_reg" /></td>
                                    <td><input type="text" name="school_reg" /></td>
                                    <td><input type="text" name="min_edu_reg" /></td>
                                    <td><input type="text" name="busi_lic_reg" /></td>
                                  </tr><tr>
                                    <th scope="row">Emergency</th>
                                    <td><input type="text" name="company_reg" /></td>
                                    <td><input type="text" name="school_reg" /></td>
                                    <td><input type="text" name="min_edu_reg" /></td>
                                    <td><input type="text" name="busi_lic_reg" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Email</th>
                                    <td><input type="text" name="company_reg" /></td>
                                    <td><input type="text" name="school_reg" /></td>
                                    <td><input type="text" name="min_edu_reg" /></td>
                                    <td><input type="text" name="busi_lic_reg" /></td>
                                  </tr><tr>
                                    <th scope="row">Fax No</th>
                                    <td><input type="text" name="company_reg" /></td>
                                    <td><input type="text" name="school_reg" /></td>
                                    <td><input type="text" name="min_edu_reg" /></td>
                                    <td><input type="text" name="busi_lic_reg" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Website</th>
                                    <td><input type="text" name="company_reg" /></td>
                                    <td><input type="text" name="school_reg" /></td>
                                    <td><input type="text" name="min_edu_reg" /></td>
                                    <td><input type="text" name="busi_lic_reg" /></td>
                                  </tr>
                                </tbody>
                              </table>
                            <label class="fieldlabels">Email: *</label>
                            <input type="email" name="email" placeholder="Email Id"/>
                            <label class="fieldlabels">Username: *</label>
                            <input type="text" name="uname" placeholder="UserName"/>
                            <label class="fieldlabels">Password: *</label>
                            <input type="password" name="pwd" placeholder="Password"/>
                            <label class="fieldlabels">Confirm Password: *</label>
                            <input type="password" name="cpwd" placeholder="Confirm Password"/>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Personal Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 2 - 10</h2>
                                </div>
                            </div>
                            <label class="fieldlabels">First Name: *</label>
                            <input type="text" name="fname" placeholder="First Name"/>
                            <label class="fieldlabels">Last Name: *</label>
                            <input type="text" name="lname" placeholder="Last Name"/>
                            <label class="fieldlabels">Contact No.: *</label>
                            <input type="text" name="phno" placeholder="Contact No."/>
                            <label class="fieldlabels">Alternate Contact No.: *</label>
                            <input type="text" name="phno_2" placeholder="Alternate Contact No."/>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Image Upload:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 3 - 10</h2>
                                </div>
                            </div>
                            <label class="fieldlabels">Upload Your Photo:</label>
                            <input type="file" name="pic" accept="image/*">
                            <label class="fieldlabels">Upload Signature Photo:</label>
                            <input type="file" name="pic" accept="image/*">
                        </div>
                        <input type="button" name="next" class="next action-button" value="Submit"/>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 10</h2>
                                </div>
                            </div>
                            <br><br>
                            <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-3">
                                    <img src="https://i.imgur.com/GwStPmg.png" class="fit-image">
                                </div>
                            </div>
                            <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Account Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 5 - 10</h2>
                                </div>
                            </div>
                            <label class="fieldlabels">Email: *</label>
                            <input type="email" name="email" placeholder="Email Id"/>
                            <label class="fieldlabels">Username: *</label>
                            <input type="text" name="uname" placeholder="UserName"/>
                            <label class="fieldlabels">Password: *</label>
                            <input type="password" name="pwd" placeholder="Password"/>
                            <label class="fieldlabels">Confirm Password: *</label>
                            <input type="password" name="cpwd" placeholder="Confirm Password"/>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Account Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 6 - 10</h2>
                                </div>
                            </div>
                            <label class="fieldlabels">Email: *</label>
                            <input type="email" name="email" placeholder="Email Id"/>
                            <label class="fieldlabels">Username: *</label>
                            <input type="text" name="uname" placeholder="UserName"/>
                            <label class="fieldlabels">Password: *</label>
                            <input type="password" name="pwd" placeholder="Password"/>
                            <label class="fieldlabels">Confirm Password: *</label>
                            <input type="password" name="cpwd" placeholder="Confirm Password"/>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Account Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 7 - 10</h2>
                                </div>
                            </div>
                            <label class="fieldlabels">Email: *</label>
                            <input type="email" name="email" placeholder="Email Id"/>
                            <label class="fieldlabels">Username: *</label>
                            <input type="text" name="uname" placeholder="UserName"/>
                            <label class="fieldlabels">Password: *</label>
                            <input type="password" name="pwd" placeholder="Password"/>
                            <label class="fieldlabels">Confirm Password: *</label>
                            <input type="password" name="cpwd" placeholder="Confirm Password"/>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Account Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 8 - 10</h2>
                                </div>
                            </div>
                            <label class="fieldlabels">Email: *</label>
                            <input type="email" name="email" placeholder="Email Id"/>
                            <label class="fieldlabels">Username: *</label>
                            <input type="text" name="uname" placeholder="UserName"/>
                            <label class="fieldlabels">Password: *</label>
                            <input type="password" name="pwd" placeholder="Password"/>
                            <label class="fieldlabels">Confirm Password: *</label>
                            <input type="password" name="cpwd" placeholder="Confirm Password"/>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Account Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 9 - 10</h2>
                                </div>
                            </div>
                            <label class="fieldlabels">Email: *</label>
                            <input type="email" name="email" placeholder="Email Id"/>
                            <label class="fieldlabels">Username: *</label>
                            <input type="text" name="uname" placeholder="UserName"/>
                            <label class="fieldlabels">Password: *</label>
                            <input type="password" name="pwd" placeholder="Password"/>
                            <label class="fieldlabels">Confirm Password: *</label>
                            <input type="password" name="cpwd" placeholder="Confirm Password"/>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Account Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 10 - 10</h2>
                                </div>
                            </div>
                            <label class="fieldlabels">Email: *</label>
                            <input type="email" name="email" placeholder="Email Id"/>
                            <label class="fieldlabels">Username: *</label>
                            <input type="text" name="uname" placeholder="UserName"/>
                            <label class="fieldlabels">Password: *</label>
                            <input type="password" name="pwd" placeholder="Password"/>
                            <label class="fieldlabels">Confirm Password: *</label>
                            <input type="password" name="cpwd" placeholder="Confirm Password"/>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
    
</section><!-- End Hero -->
@endsection