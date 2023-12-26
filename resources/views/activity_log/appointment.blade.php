<div class="tab-pane active" id="appointment">
    <h2>Appointment</h2>
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

                
            <div class="col-sm-12"><h3 class="">Requested by</h3></div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">Acc. Holder Type</label>
                    <input type="text" class="form-control" value="" name="acc_holder_type" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">ID No</label>
                    <input type="text" class="form-control" value="" name="id_no" >
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="schoolCode" class="form-label">Name</label>
                    <input type="text" class="form-control" value="" name="name" >
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