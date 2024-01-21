<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="name">Issued by</label>
            <input type="text" name="issued_by" id="" value="{{ Auth::user()->user_name}}" style="width: 100%; padding: 10px; height: auto;"  readonly>
        </div>
        
        <div class="form-group">
            <label for="name">Priority </label>
            <input type="text" name="priority" id="" value="{!!old('priority',@$remainder->priority)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

        <div class="form-group">
            <label for="name">subject </label>
            <input type="text" name="subject" id="" value="{!!old('subject',@$remainder->subject)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
        
        <div class="form-group">
            <label for="name">Details</label>
            <textarea name="details" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
            >{{ @$remainder->details }}</textarea>
        </div>

        <div class="form-group">
            <label for="name">Location </label>
            <textarea name="location" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
            >{{ @$remainder->location }}</textarea>
        </div>


        <div class="form-group">
            <label for="name">Action </label>
            <input type="text" name="action" id="" value="{!!old('action',@$remainder->action)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

        <div class="form-group">
            <label for="name">Receivers </label>
            <input type="text" name="receivers" id="" value="{!!old('receivers',@$remainder->receivers)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
        <div class="form-group">
            <label for="name">Time </label>
            <input type="time" name="time" id="" value="{!!old('action',@$remainder->time)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
        <div class="form-group">
            <label for="name">Due Date </label>
            <input type="date" name="due_date" id="" value="{!!old('due_date',@$remainder->due_date)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

    </div>
</div>
<button type="submit" class="btn btn-primary">{{__('submit')}}</button>
@push('js')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    
    CKEDITOR.replace( 'details' );
    CKEDITOR.replace( 'location' );
</script>
@endpush