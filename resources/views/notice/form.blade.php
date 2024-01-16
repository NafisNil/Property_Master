<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="name">Title</label>
            <input type="text" name="title" id="" value="{{ old('title', @$notice->title) }}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
        <div class="form-group">
            <label for="name">File</label>
            <input type="file" name="file" id="" value="" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

    </div>
</div>
<button type="submit" class="btn btn-primary">{{__('submit')}}</button>
@push('js')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

@endpush