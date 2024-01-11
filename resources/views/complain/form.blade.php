<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="name">Reported by</label>
            <input type="text" name="reported_by" id="" value="{{ Auth::user()->user_name}}" style="width: 100%; padding: 10px; height: auto;"  readonly>
        </div>
        
        <div class="form-group">
            <label for="name">Time </label>
            <input type="time" name="time" id="" value="{!!old('time',@$complain->time)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

        <div class="form-group">
            <label for="name">Complain Type </label>
            <select class="form-control" id="dropdown" name="complain_type" required>
                @foreach ($complain_type as $item)
                <option value="{{ $item->id }}" {{ ( 'single' == @$item->type) ? 'selected' : '' }}> 
                   {{$item->name}}
                 </option>
                @endforeach


                </select>
        </div>
        
        <div class="form-group">
            <label for="name">Description</label>
            <textarea name="desc" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
            >{{ @$complain->desc }}</textarea>
        </div>

        <div class="form-group">
            <label for="name">Is it happened berfore? </label>
            <select class="form-control" id="dropdown" name="happened_before" required>
                <option value="1" {{ ( '1' == @$complain->happened_before) ? 'selected' : '' }}> 
                   Yes
                </option>
                <option value="0" {{ ( '0' == @$company->happened_before) ? 'selected' : '' }}> 
                    No
                 </option>
                </select>
        </div>
        <div class="form-group">
            <label for="name">People are Involved? </label>
            <textarea name="people" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
            >{{ @$complain->people }}</textarea>
        </div>
        <div class="form-group">
            <label for="name">Receivers </label>
            <input type="text" name="receivers" id="" value="{!!old('receivers',@$complain->receivers)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

        <div class="form-group">
            <label for="name">Acknowledge </label>
            <input type="text" name="acknowledge" id="" value="{!!old('acknowledge',@$complain->acknowledge)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">{{__('submit')}}</button>
@push('js')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    
    CKEDITOR.replace( 'desc' );
    CKEDITOR.replace( 'people' );
</script>
@endpush