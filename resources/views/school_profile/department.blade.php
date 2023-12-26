<div class="tab-pane" id="departments">
    <h2>Departments</h2>
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="reg-form row">
            <div class="col-sm-12 row"><h3 class="">Educational Departments</h3></div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Department Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" placeholder="" name="name" required>
                        <div class="valid-feedback"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="head" class="form-label">Department Head</label>
                        <input type="text" class="form-control" placeholder="" name="head">
                        <div class="valid-feedback"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="campus" class="form-label">Location</label>
                        <input type="text" class="form-control" placeholder="" name="campus">
                        <div class="valid-feedback"></div>
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="phone" class="form-label">Phone</label><br />
                        <input type="tel" class="form-control" id="edudep_phone_office" style="border-radius: 5px 0 0 5px;" name="phone">
                        <span class="input-group-addon" style="padding: 10px 20px; background: #ced4da; border-radius: 0 5px 5px 0; margin-left: -5px;">Tel</span>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="valid-feedback"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" placeholder="" name="email">
                        <div class="valid-feedback"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="operation_hour" class="form-label">Hours of Operation</label>
                        <input type="text" class="form-control" placeholder="" name="operation_hour">
                        <div class="valid-feedback"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Activation</label>
                        <select class="form-control mb-3" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">In-Active</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 row"><h3 class="">Administrative Departments</h3></div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Department Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" placeholder="" name="name" required>
                        <div class="valid-feedback"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="head" class="form-label">Department Head</label>
                        <input type="text" class="form-control" placeholder="" name="head">
                        <div class="valid-feedback"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="campus" class="form-label">Location</label>
                        <input type="text" class="form-control" placeholder="" name="campus">
                        <div class="valid-feedback"></div>
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="phone" class="form-label">Phone</label><br />
                        <input type="tel" class="form-control" id="acadep_phone_office" style="border-radius: 5px 0 0 5px;" name="phone">
                        <span class="input-group-addon" style="padding: 10px 20px; background: #ced4da; border-radius: 0 5px 5px 0; margin-left: -5px;">Tel</span>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="valid-feedback"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" placeholder="" name="email">
                        <div class="valid-feedback"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="operation_hour" class="form-label">Hours of Operation</label>
                        <input type="text" class="form-control" placeholder="" name="operation_hour">
                        <div class="valid-feedback"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Activation</label>
                        <select class="form-control mb-3" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">In-Active</option>
                        </select>
                    </div>
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
