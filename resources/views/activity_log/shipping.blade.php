<div class="tab-pane" id="shipping">
    <h2>Shipping</h2>
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

            <div class="col-sm-12">
                <input type="hidden" class="form-control" value="{{$school_info->id }}" name="school_id">
                <input type="hidden" class="form-control" value="{{Auth::user()->id }}" name="created_by">
                <button type="submit" class="btn btn-primary submit">Submit</button>
            </div>
        </div>
    </form>
</div>