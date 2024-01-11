<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="name">Reported by</label>
            <input type="text" name="reported_by" id="" value="{{ Auth::user()->reported_by}}" style="width: 100%; padding: 10px; height: auto;"  readonly>
        </div>
        
        <div class="form-group">
            <label for="name">Time </label>
            <input type="text" name="time" id="" value="{!!old('time',@$complain->time)!!}" style="width: 100%; padding: 10px; height: auto;"  >
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
            <textarea name="details" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
            >{{ @$complain->desc }}</textarea>
        </div>

        <div class="form-group">
            <label for="name">Is it happened berfore? </label>
            <input type="text" name="receivers" id="" value="{!!old('receivers',@$complain->happened_before)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
        <div class="form-group">
            <label for="name">Action </label>
            <input type="text" name="action" id="" value="{!!old('action',@$announcement->action)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
        <div class="form-group">
            <label for="name">Due Date </label>
            <input type="date" name="due_date" id="" value="{!!old('due_date',@$announcement->due_date)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

        <div class="form-group">
            <label for="name">Acknowledge </label>
            <input type="text" name="acknowledge" id="" value="{!!old('acknowledge',@$announcement->acknowledge)!!}" style="width: 100%; padding: 10px; height: auto;"  >
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