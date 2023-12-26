@extends('layouts.master')

@push('css')
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
        border: 1px #E9ECEF solid;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    #img-upload{
        width: 100%;
    }
</style>
@endpush

@section('page_title')
Edit Board of Director
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('staffDirectory.index') }}">Staff Directory</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Staff</li>
    </ol>
</nav>

<div class="row">
    <div class="col-sm-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="text-center">
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Staff Edit Form</h6>
                <form action="{{ route('staffDirectory.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row"> 
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" placeholder="" name="name" value='{{$staffinfo->name ? $staffinfo->name : ""}}' required>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="nick_name" class="form-label">Nick Name</label>
                                <input type="text" class="form-control" placeholder="" name="nick_name" value='{{$staffinfo->nick_name ? $staffinfo->nick_name : ""}}'>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" class="form-control" placeholder="" name="department" value='{{$staffinfo->department ? $staffinfo->department : ""}}'>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="educational_level" class="form-label">Educational Level</label>
                                <input type="text" class="form-control" placeholder="" name="educational_level" value='{{$staffinfo->educational_level ? $staffinfo->educational_level : ""}}'>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="country" class="form-label">Country</label>
                                <select name="country" class="countries form-control" id="country">
                                    <option value="">Select Country</option>
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="university_name" class="form-label">University Name</label>
                                <input type="text" class="form-control" placeholder="" name="university_name" value='{{$staffinfo->university_name ? $staffinfo->university_name : ""}}'>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="years_in_field" class="form-label">Years in Field</label>
                                <input type="text" class="form-control" placeholder="" name="years_in_field" value='{{$staffinfo->years_in_field ? $staffinfo->years_in_field : ""}}'>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" placeholder="" name="email" value='{{$staffinfo->email ? $staffinfo->email : ""}}'>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="phone_office" class="form-label">Phone Office</label><br />
                                <input type="tel" class="form-control" id="phone_office" style="border-radius: 5px 0 0 5px;" name="phone_office" value='{{$staffinfo->phone_office ? $staffinfo->phone_office : ""}}'>
                                <span class="input-group-addon" style="padding: 10px 20px; background: #ced4da; border-radius: 0 5px 5px 0; margin-left: -5px;">Tel</span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="phone_cell" class="form-label">Phone Cell</label><br />
                                <input type="tel" class="form-control" id="phone_cell" style="border-radius: 5px 0 0 5px;" name="phone_cell" value='{{$staffinfo->phone_cell ? $staffinfo->phone_cell : ""}}'>
                                <span class="input-group-addon" style="padding: 10px 20px; background: #ced4da; border-radius: 0 5px 5px 0; margin-left: -5px;">Tel</span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="fax" class="form-label">Fax</label>
                                <input type="text" class="form-control" placeholder="" name="fax" value='{{$staffinfo->fax ? $staffinfo->fax : ""}}'>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" class="form-control" placeholder="" name="designation" value='{{$staffinfo->designation ? $staffinfo->designation : ""}}'>
                            </div>
                        </div>


                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label>Photo</label>
                                <div class="input-group">
                                            <input type="file" class="form-control" id="imgInp" name="photo">
                                            <!--Browse… <input class="form-control"  type="file" id="imgInp" name="photo">-->
                               
                                </div>
                                <img id='img-upload' src="/{{$staffinfo->photo ? $staffinfo->photo : ""}}"/>
                            </div>
                            
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select class="form-control mb-3" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">In-Active</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" value="{{$school_info->id . '01-' .rand(0001,9999)}}" name="staff_id">
                    <input type="hidden" class="form-control" value="{{$school_info->id }}" name="school_id">
                    <input type="hidden" class="form-control" value="{{$staffinfo->id }}" name="id">
                    <button type="submit" class="btn btn-primary submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
<script src="{{ asset('assets/js/countrystatecity.js')}}"></script>

<script type="text/javascript">
$("#phone_office").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});
$("#phone_cell").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});

$(document).ready(function () {
    $(document).on('change', '.btn-file :file', function () {
        var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function (event, label) {

        var input = $(this).parents('.input-group').find(':text'),
                log = label;

        if (input.length) {
            input.val(log);
        } else {
            if (log)
                alert(log);
        }

    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () {
        readURL(this);
    });
});
</script>

@endpush
