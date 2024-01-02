<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="name">Issued by</label>
            <input type="text" name="issued_by" id="" value="{{ Auth::user()->name}}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
        
        <div class="form-group">
            <label for="name">Subject </label>
            <input type="text" name="subject" id="" value="{!!old('subject',@$whatnew->subject)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
        
        <div class="form-group">
            <label for="name">Details</label>
            <textarea name="desc" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
            >{{ @$welcome->desc }}</textarea>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">{{__('submit')}}</button>
@push('js')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    
    CKEDITOR.replace( 'message' );
</script>
@endpush