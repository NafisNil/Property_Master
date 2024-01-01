<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="name">Name</label>
            <select class="form-control" id="dropdown" name="company" required>
                @foreach ($company as $item)
                <option value="{{ $item->id }}" {{ ( $item->id == @$newfile->company) ? 'selected' : '' }}> 
                   {{$item->name}}
                 </option>
                @endforeach
                
                
                </select>
        </div>
        
        <div class="form-group">
            <label for="name">File No</label>
            @php
                if ($fileCount > 0) {
                    # code...
                    $fileCnt = $last_id->id;
                }else {
                    # code...
                    $fileCnt = $fileCount;
                }
            @endphp
            <input type="text" name="file_no" id="" value="{{ "FileNo_".$fileCnt}}" style="width: 100%; padding: 10px; height: auto;" readonly >
        </div>
        <input type="hidden" name="last_user" id="" value="{{ Auth::user()->id }}">
        <div class="form-group">
            <label for="name">Fiscal Year</label>
            <input type="text" name="fiscal_year" id="" value="{!!old('fiscal_year',@$newfile->fiscal_year)!!}" style="width: 100%; padding: 10px; height: auto;" required >
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