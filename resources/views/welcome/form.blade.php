<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="name">Description</label>
            <textarea name="desc" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
                      >{{ @$welcome->desc }}</textarea>
                      <input type="hidden" name="post" value="0">
        </div>
        <div class="form-group">
            <label for="name">Status</label>
            <select class="form-control" id="dropdown" name="status" required>
                <option value="0" {{ ( '0' == @$welcome->status) ? 'selected' : '' }}> 
                   Inactive
                </option>
                <option value="1" {{ ( '1' == @$welcome->status) ? 'selected' : '' }}> 
                    Active
                 </option>
                </select>
        </div>

    </div>
</div>
<button type="submit" class="btn btn-primary">{{__('submit')}}</button>
@push('js')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    
    CKEDITOR.replace( 'desc' );
</script>
@endpush