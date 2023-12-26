@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
Update Campus
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('schoolCampus.index') }}">Campus Directory</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Campus</li>
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
                <h6 class="card-title">Campus Update Form</h6>
                <form action="{{ route('schoolCampus.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row"> 

                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Campus Code</label>
                                <input type="text" class="form-control" placeholder="" name="campus_code" value="{{'cam-' . random_int(100000, 999999)}}" readonly>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Campus Name</label>
                                <input type="text" class="form-control" placeholder="" name="name" value="{{$schoolCampus->name}}" >
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">School</label>
                                <input type="text" class="form-control" placeholder="" name="" value="{{$school_info->name}}" readonly>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <h3>Address</h3>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Country</label>
                                <select name="country" class="countries form-control" id="countryId">
                                    <option value="">Select Country</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">State</label>
                                <select name="state" class="states form-control" id="stateId">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">City</label>       
                                <select name="city" class="cities form-control" id="cityId">
                                    <option value="">Select City</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Address Line</label>
                                <input type="text" class="form-control" value="" name="address_line" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Street Name</label>
                                <input type="text" class="form-control" value="" name="street" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Zip Code</label>
                                <input type="text" class="form-control" value="" name="zip_code" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h3>Contacts</h3>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolName" class="form-label">Office Phone</label><br />
                                <input type="tel" class="form-control" id="office-phone" value="{{$schoolCampus->phone_office}}" style="border-radius: 5px 0 0 5px; padding: 8px 20px 8px 50px" name="phone_office">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{$schoolCampus->email}}" name="email">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Fax No.</label>
                                <input type="text" class="form-control" value="{{$schoolCampus->fax}}" name="fax">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <h3>For Accounting</h3>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Cost Centre</label>
                                <input type="text" class="form-control" value="" name="cost_center" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Income Centre</label>
                                <input type="text" class="form-control" value="" name="income_center" >
                                <small class="form-text text-muted"></small>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" class="form-control" value="{{$school_info->id }}" name="school_id">
                            <button type="submit" class="btn btn-primary submit">Submit</button>
                        </div>
                    </div>
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
$("#office-phone").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});
</script>

@endpush
