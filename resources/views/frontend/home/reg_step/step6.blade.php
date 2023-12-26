<fieldset>
    <form method="post" action="{{route("reg.step-five")}}">
        @csrf
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Create Account</h2>
                </div>
                <div class="col-5">
                    <h2 class="steps">Step 6 - 14</h2>
                </div>
            </div>
            <div class="reg-form">
                @if(count($contacts)>0)
                    @foreach($contacts as $contact)
                        <div class='res-step-4 row'>
                            <input type="hidden" name="contact_id"
                                   value="{{$contact->id}}"

                            >
                            <h4 class="reg-form-title">Contacts Persons</h4>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="schoolCode" class="form-label">Designation<span
                                            style="color: red;">*</span></label>
                                    <select name="designation[]" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Director">Director</option>
                                        <option value="President">President</option>
                                        <option value="Accounting Manager">Accounting Manager</option>
                                        <option value="Accounts Payable">Accounts Payable</option>
                                        <option value="Accounts Receivable">Accounts Receivable</option>
                                    </select>
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="schoolCode" class="form-label">Name* <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="name[]"
                                           value="{{$contact->name ?? ''}}"
                                    >
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="schoolCode" class="form-label">Ph. Office </label>
                                    <input type="text" class="form-control" name="office[]"
                                    value="{{$contact->office ?? ''}}"
                                    >
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="schoolCode" class="form-label">Ph. Mobile<span
                                            style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{$contact->mobile ?? ''}}" name="mobile[]">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="schoolCode" class="form-label">Email <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="email[]"
                                    value="{{$contact->email ?? ''}}"
                                    >
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="schoolCode" class="form-label">Fax No</label>
                                    <input type="text" class="form-control" name="fax[]"
                                    value="{{$contact->fax ?? ''}}"
                                    >
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class='res-step-4 row'>
                        <h4 class="reg-form-title">Contacts Persons</h4>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Designation<span
                                        style="color: red;">*</span></label>
                                <select name="designation[]" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Director">Director</option>
                                    <option value="President">President</option>
                                    <option value="Accounting Manager">Accounting Manager</option>
                                    <option value="Accounts Payable">Accounts Payable</option>
                                    <option value="Accounts Receivable">Accounts Receivable</option>
                                </select>
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Name* <span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" value="" name="name[]">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Ph. Office </label>
                                <input type="text" class="form-control" name="office[]">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Ph. Mobile<span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" value="" name="mobile[]">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Email <span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control"  name="email[]"
                                >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Fax No</label>
                                <input type="text" class="form-control"  name="fax[]">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                @endif

                <button type="button" id="add-more" name="add-more" class="btn btn-primary">Add More</button>
            </div>
        </div>
        <button name="next" type="submit" class="btn btn-primary next action-button reg-nxt-btn">Next</button>
        <a href="{{route('authenticate.createSchoolAccount', ['step' => 5])}}" type="button" class="btn btn-secondary previous action-button-previous reg-bck-btn"
                style=" float: left;">Previous
        </a>
    </form>
</fieldset>
