<div class="tab-pane" id="SchoolLevel">
    <h2>School Level</h2>
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="school_level_field row">
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="schoolCode" class="form-label">School Level</label>
                    <input type="text" class="form-control" value="" name="school_level" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Activation</label>
                            <select class="form-control mb-3" name="activation">
                                <option value="" >----Select----</option>
                                <option value="1" >Add</option>
                                <option value="0" >Remove</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">School Type </label>
                            <select class="form-control mb-3" name="school_type">
                                <option value="" >----Select----</option>
                                <option value="1" >Public</option>
                                <option value="0" >Charter</option>
                                <option value="1" >Private</option>
                                <option value="0" >Especial Needs</option>
                                <option value="1" >Language</option>
                                <option value="0" >laboratory school</option>
                                <option value="1" >Religious</option>
                                <option value="0" >Other ( Please specify)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Study Option</label>
                            <select class="form-control mb-3" name="study_option">
                                <option value="" >----Select----</option>
                                <option value="1" >Full Time </option>
                                <option value="0" >Part Time </option>
                                <option value="0" >Both</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Delivery Method</label>
                            <select class="form-control mb-3" name="delivery_method">
                                <option value="" >----Select----</option>
                                <option value="1" >In -Person</option>
                                <option value="0" >Online</option>
                                <option value="1" >Hybrid</option>
                                <option value="0" >Offline</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Operational Zone</label>
                            <select class="form-control mb-3" name="operational_zone">
                                <option value="" >----Select----</option>
                                <option value="1" >Domestic</option>
                                <option value="0" >Internationally</option>
                                <option value="0" >Both</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Credential Type</label>
                            <select class="form-control mb-3" name="credential_type">
                                <option value="" >----Select----</option>
                                <option value="1" >Certificate</option>
                                <option value="0" >Diploma</option>
                                <option value="1" >Bachelor Degree</option>
                                <option value="0" >Master Degree</option>
                                <option value="1" >Ph.D.</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <input type="hidden" class="form-control" value="{{$school_info->id }}" name="school_id">
            <input type="hidden" class="form-control" value="{{Auth::user()->id }}" name="updated_by">
            <input type="hidden" name="id" value="{{ ($school_info->id) ? $school_info->id : '' }}">
            <button type="submit" class="btn btn-primary submit">Submit</button>
            <button type="button" id="add-more" name="add-more" class="btn btn-warning" style="float: right;">Add More</button>
        </div>

    </form>
</div>
