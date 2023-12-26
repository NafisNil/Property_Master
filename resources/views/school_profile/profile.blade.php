<div class="tab-pane active" id="sprofile">
    <h2>{{__('school-profile')}}</h2>
    <form action="/school-profile-update" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="reg-form row">

            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="schoolCode" class="form-label">{{__('account-no')}}<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{$school_info->school_code}}" name="school_code"
                    disabled="disabled"
                    >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="schoolCode" class="form-label">{{__('school-name')}}<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{$school_info->name}}" name="school_name">
                    <small class="form-text text-muted"></small>
                </div>
            </div>

            <div class="col-sm-12"><h3 class="">{{__('address')}}</h3></div>

            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolName" class="form-label">{{__('country')}}<span style="color: red;">*</span></label>
                    <select name="school_country" class="countries form-control" id="countryId" countryId='2'>
                        <option value="">{{__('country')}}</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolName" class="form-label"> {{__('state')}} <span style="color: red;">*</span></label>
                    <select name="school_state" class="states form-control" id="stateId">
                        <option value="">Select State</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolName" class="form-label"> {{__('city')}} <span style="color: red;">*</span></label>
                    <select name="school_city" class="cities form-control" id="cityId">
                        <option value="">Select City</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="schoolCode" class="form-label">{{__('street-no')}}<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{$school_info->address->street ?? ''}}"
                           name="school_street">
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="schoolCode" class="form-label">{{__('zip-code')}}<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{$school_info->address->zip ?? ''}}"
                           name="school_zip">
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-12">
                <h4>{{__('contacts')}}</h4>
            </div>

            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolName" class="form-label">{{__('office-phone')}}</label><br/>
                    <input type="tel" class="form-control" id="school-office-phone"
                           style="border-radius: 5px 0 0 5px; padding: 8px 20px 8px 50px" name="creator_phone"

                    >
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolName" class="form-label">{{__("mobile")}}</label><br/>
                    <input type="tel" class="form-control" id="school-office-mobile"
                           style="border-radius: 5px 0 0 5px; padding: 8px 20px 8px 50px" name="creator_phone">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolName" class="form-label">{{__('emergency')}}</label><br/>
                    <input type="tel" class="form-control" id="school-office-emargency"
                           style="border-radius: 5px 0 0 5px; padding: 8px 20px 8px 50px" name="creator_phone">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolCode" class="form-label">{{__('email')}}</label>
                    <input type="text" class="form-control" value="" name="school_code">
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolCode" class="form-label">{{__("fax-no")}}</label>
                    <input type="text" class="form-control" value="" name="school_code">
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="schoolCode" class="form-label">{{__('website')}}</label>
                    <input type="text" class="form-control"
                           value=""
                           name="school_code">
                    <small class="form-text text-muted"></small>
                </div>
            </div>

            <div class="col-sm-12">
                <input type="hidden" class="form-control" value="{{$school_info->id }}" name="school_id">
                <input type="hidden" class="form-control" value="{{Auth::user()->id }}" name="updated_by">
                <input type="hidden" name="id" value="{{ ($school_info->id) ? $school_info->id : '' }}">
                <button type="submit" class="btn btn-primary submit">{{__("update")}}</button>
            </div>
        </div>
    </form>
</div>
