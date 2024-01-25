<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="" value="{{ @$recurring->name }}" style="width: 100%; padding: 10px; height: auto;" required>
        </div>



    </div>
</div>
<button type="submit" class="btn btn-primary">{{__('submit')}}</button>
@push('js')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

@endpush