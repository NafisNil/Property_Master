@props(['file'])

@php
    $extension = substr($file->file_name, strrpos($file->file_name, '.') + 1);
@endphp

<div class="d-flex align-items-center border my-2 p-1">
    <div>
        <div class="overflow-hidden" style="width: 60px; height: 60px">
            @if($file->mime_type == 'image/png' || $file->mime_type == 'jpeg' || $file->mime_type == 'jpg')
                <img src="{{'/storage/'.$file->file_path}}"
                     style="width: 100%;"
                >
            @else
                <div class="d-flex align-items-center justify-content-center" style="background-color: #5678ea; width: 100%; height: 100%">
                    <div class="text-uppercase text-white">{{$extension}}</div>
                </div>
            @endif
        </div>
    </div>
    <div class="flex-grow-1 ml-2">
        {{$file->file_name}}
    </div>
    <div>
        <a href="{{route('open-file', $file->file_name)}}"
           target="_blank" class="btn btn-primary btn-sm"
        >Open</a>
        <button class="btn btn-danger btn-icon">
            <i class="fa fa-trash"></i>
        </button>
    </div>
</div>
