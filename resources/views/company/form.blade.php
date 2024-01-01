<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="company" id="" value="{{ @$company->name }}" style="width: 100%; padding: 10px; height: auto;" required>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

        <div class="form-group">
            <label for="name">Company Type</label>
            <select class="form-control" id="dropdown" name="type" required>
            <option value="single" {{ ( 'single' == @$company->type) ? 'selected' : '' }}> 
               Single Building
            </option>
            <option value="multiple" {{ ( 'multiple' == @$company->type) ? 'selected' : '' }}> 
                Multiple Building
             </option>
            </select>
        </div>

        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" name="username" id="" value="{{ @$company->username }}" style="width: 100%; padding: 10px; height: auto;" required min="5">
        </div>
        
        <div class="form-group">
            <label for="name">Message</label>
            <textarea name="message" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
                      >{{ @$company->message }}</textarea>
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