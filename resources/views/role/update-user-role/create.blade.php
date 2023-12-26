@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div>
        @include('partials.error-alert', ['errors' => $errors])
        <x-content>
            <x-slot name="header">
                <h3>Update User Roles</h3>
            </x-slot>

            <div>
                <x-form action="{{route('update-user-roles.update')}}">
                    <div class="row">
                        <div class="col-sm-4">
                            <x-form.select
                                label="Select User"
                                name="user_id"
                                :options="$users"
                            />
                        </div>

                        <div class="col-sm-4">
                            <label class="control-label">Select Roles</label>
                            <select class="form-control" id="roles" name="roles[]"
                            multiple
                            >
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </x-form>
            </div>

        </x-content>
    </div>
@endsection

@push('js')

    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {

            $('#user_id').on('change', function () {


                let id = this.value;

                $.ajax({
                    url: `/users/${id}/roles`,
                    success: function (data) {

                        if (data.status === 'success') {
                            let roles = data.roles;

                            let ids = roles.map(item => item.id);

                            console.log({ids})

                            $('#roles').val(ids);

                            //$('#roles').multiselect({'refresh': true});

                        }
                    }
                })
            })

            $('#roles').multiselect({
                includeSelectAllOption: true,
                nonSelectedText: 'Select Role',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                allSelectedText: 'All Selected',
                buttonWidth: '100%',
                maxHeight: 350
            });

        })
    </script>

@endpush
