@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('stall-allocation')}}</h3>
        </x-slot>
        <x-form action="{{route('parking-stall-allocation.store')}}">
            <div class="row">
                <div class="col-sm-4">
                    <x-form.select
                        name="parker_type_id"
                        label="parker-type"
                        :options="$parkerTypes"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="stall_id"
                        label="stall"
                        :options="[]"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="parker_id"
                        label="parker"
                        :options="[]"
                    />
                </div>

                <div class="col-sm-4">
                   <x-form.select
                       name="vehicle_id"
                       label="vehicle"
                       :options="$vehicles"
                       />
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">{{__('submit')}}</button>
                </div>

            </div>
        </x-form>

    </x-content>
@endsection

@push('js')
    <script>
        $(document).ready(function () {

            $('#parker_type_id').on('change', function () {

                let id = this.value;


                if (id) {

                    $.ajax({
                        url: '/get-parkers?id=' + id,
                        success: function (data) {
                            //$('#parker_id')

                            let option = "<option value=''>-Select-Parker-</option>";

                            data.forEach(function (item) {
                                option += `<option value="${item.id}">${item.name}</option>`;
                            });

                            $('#parker_id').html(option);

                        }
                    })

                    $.ajax({
                        url: '/get-unoccupied-stalls?id=' + id,
                        success: function (data) {

                            let option = "<option value=''>-Select-Parker-</option>";

                            data.forEach(function (item) {
                                option += `<option value="${item.id}">${item.name}</option>`;
                            });

                            $('#stall_id').html(option);
                        }
                    })
                } else {

                    let option = "<option value=''>-select-one</option>";

                    $('#parker_id').html(option);
                    $('#stall_id').html(option);
                }
            })
        })
    </script>
@endpush
