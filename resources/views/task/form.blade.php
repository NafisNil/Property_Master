<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="name">Assigned by</label>
            <input type="text" name="assigned_by" id="" value="{{ Auth::user()->user_name}}" style="width: 100%; padding: 10px; height: auto;"  readonly>
        </div>
        
        <div class="form-group">
            <label for="name">Priority </label>
            <input type="text" name="priority" id="" value="{!!old('priority',@$task->priority)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

        <div class="form-group">
            <label for="name">subject </label>
            <input type="text" name="subject" id="" value="{!!old('subject',@$task->subject)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
        
        <div class="form-group">
            <label for="name">Details</label>
            <textarea name="details" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
            >{{ @$task->details }}</textarea>
        </div>

        <div class="form-group">
            <label for="name">Due Date </label>
            <input type="date" name="due_date" id="" value="{!!old('due_date',@$task->due_date)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

        <div class="form-group">
            <label for="name">Receivers </label>
            <input type="text" name="receivers" id="" value="{!!old('receivers',@$task->receivers)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

        <div class="form-group">
            <label for="name">Acknowledge </label>
            <input type="text" name="acknowledge" id="" value="{!!old('acknowledge',@$task->acknowledge)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

        <div class="form-group">
            <label for="name">Required Action </label>
            <input type="text" name="required_action" id="" value="{!!old('required_action',@$task->required_action)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

    </div>
</div>
<button type="submit" class="btn btn-primary">{{__('submit')}}</button>
@push('js')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    
    CKEDITOR.replace( 'details' );
</script>
@endpush