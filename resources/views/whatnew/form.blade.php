<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="name">Issued by</label>
            <input type="text" name="issued_by" id="" value="{{ Auth::user()->user_name}}" style="width: 100%; padding: 10px; height: auto;"  readonly>
        </div>
        
        <div class="form-group">
            <label for="name">Subject </label>
            <input type="text" name="subject" id="" value="{!!old('subject',@$whatnew->subject)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
        
        <div class="form-group">
            <label for="name">Details</label>
            <textarea name="details" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
            >{{ @$whatnew->details }}</textarea>
        </div>

        <div class="form-group">
            <label for="name">Receivers </label>
            <input type="text" name="receivers" id="" value="{!!old('receivers',@$whatnew->receivers)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

        <div class="form-group">
            <label for="name">Acknowledge </label>
            <input type="text" name="acknowledge" id="" value="{!!old('acknowledge',@$whatnew->acknowledge)!!}" style="width: 100%; padding: 10px; height: auto;"  >
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