<div class="tab-pane" id="m-education">
    <h2>Ministry of Education Profile </h2>
    <form action="{{route("school-profile.company-update")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="reg-form row">

            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="schoolCode" class="form-label">Registration No</label>
                    <input type="text" class="form-control" value="{{$company->registration_no ?? ''}}"
                           name="registration_no" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="schoolCode" class="form-label">Registration Date</label>
                    <input type="text" class="form-control" value="" name="registration_date"
                    >
                    <small class="form-text text-muted"></small>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="schoolCode" class="form-label">Permit/ License No</label>
                    <input type="text" class="form-control" value="" name="license_no" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="schoolCode" class="form-label">Permit/ License Expire Date</label>
                    <input type="text" class="form-control" value="" name="license_exp_date" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>

            <div class="col-sm-12"><h3 class="">Address</h3></div>

            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolName" class="form-label">Country </label>
                    <select name="company_country" class="countries form-control" id="countryId"
                    >
                        <option value="">Select Country</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolName" class="form-label">State </label>
                    <select name="company_state" class="states form-control" id="stateId">
                        <option value="">Select State</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolName" class="form-label">City </label>
                    <select name="company_city" class="cities form-control" id="cityId">
                        <option value="">Select City</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="schoolCode" class="form-label">Street Name </label>
                    <input type="text" class="form-control"  name="company_street"
                    value="{{$company->address->street ?? ''}}"
                    >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="schoolCode" class="form-label">Zip Code</label>
                    <input type="text" class="form-control" name="company_zip"
                    value="{{$company->address->zip ?? ''}}"
                    >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-12"><h3 class="">Contacts</h3></div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolName" class="form-label">Office Phone</label><br />
                    <input type="tel" class="form-control" id="edumin-office-phone" style="border-radius: 5px 0 0 5px; padding: 8px 20px 8px 50px"
                           name="company_contact_office"
                    value="{{$company->contact->office ?? ''}}"
                    >
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolName" class="form-label">Mobile</label><br />
                    <input type="tel" class="form-control" id="edumin-office-mobile" style="border-radius: 5px 0 0 5px; padding: 8px 20px 8px 50px"
                           name="company_contact_mobile"
                    value="{{$company->contact->mobile ?? ''}}"
                    >
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolName" class="form-label">Emergency</label><br />
                    <input type="tel" class="form-control" id="edumin-office-emargency" style="border-radius: 5px 0 0 5px; padding: 8px 20px 8px 50px"
                           name="company_contact_emergency_phone"
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
                    <input type="text" class="form-control"
                           name="company_contact_email"
                    value="{{$company->contact->email ?? ''}}"
                    >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolCode" class="form-label">Fax No.</label>
                    <input type="text" class="form-control" name="company_contact_fax"
                    value="{{$company->contact->fax ?? ''}}"
                    >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolCode" class="form-label">Website</label>
                    <input type="text" class="form-control"  name="company_contact_website"
                    value="{{$company->contact->website ?? ''}}"
                    >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-12">
                <input type="hidden" class="form-control" value="{{$school_info->id }}" name="school_id">
                <input type="hidden" class="form-control" value="{{Auth::user()->id }}" name="updated_by">
                <input type="hidden" name="id" value="{{ ($school_info->id) ? $school_info->id : '' }}">
                <button type="submit" class="btn btn-primary submit">Submit</button>
            </div>
        </div>
    </form>
</div>
