<div class="tab-pane" id="visitors">
    <h2>Visitors</h2>
    <form action="{{ route('SchoolClass.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="reg-form row">

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">Visitors No</label>
                    <input type="text" class="form-control" value="" name="visitors_no" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">Date</label>
                    <input type="date" class="form-control" value="" name="date" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">Visito's Name</label>
                    <input type="text" class="form-control" value="" name="Visito_name" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">From Company</label>
                    <input type="text" class="form-control" value="" name="from_company" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">Phone No</label>
                    <input type="text" class="form-control" value="" name="phone_no" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">Emails</label>
                    <input type="email" class="form-control" value="" name="emails" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">Visit Reason</label>
                    <input type="text" class="form-control" value="" name="visit_reason" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">Person/Dept. Visiting</label>
                    <input type="text" class="form-control" value="" name="person_or_dept_visiting" >
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