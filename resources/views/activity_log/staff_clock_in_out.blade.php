<div class="tab-pane" id="staff_clock_in_out">
    <h2>Staff Clock in/out</h2>
    <form action="{{ route('SchoolClass.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="reg-form row">

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">Date</label>
                    <input type="date" class="form-control" value="" name="date" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">Time</label>
                    <input type="time" class="form-control" value="" name="time" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">Staff ID. No</label>
                    <input type="text" class="form-control" value="" name="staff_id_no" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">Staff  Name</label>
                    <input type="text" class="form-control" value="" name="staff_name" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">Department</label>
                    <input type="text" class="form-control" value="" name="department" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">Time In</label>
                    <input type="time" class="form-control" value="" name="time_in" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">Time Out</label>
                    <input type="time" class="form-control" value="" name="time_out" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>

            <div class="col-sm-12">
                <input type="hidden" class="form-control" value="{{$school_info->id }}" name="school_id">
                <input type="hidden" class="form-control" value="{{Auth::user()->id }}" name="created_by">
                <button type="submit" class="btn btn-primary submit">Submit</button>
            </div>
        </div>
    </form>
</div>