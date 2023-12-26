@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('transfer-fixed-asset')}}</h3>
        </x-slot>

        <form action="{{route("post-transfer-fixed-asset")}}"
              method="post"
        >
            @csrf

            <div class="row">
                <div class="col-sm-4">
                    <x-form.select
                        name="from_room_id"
                        label="from-room"
                        :options="$rooms"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="to_room_id"
                        label="to-room"
                        :options="$rooms"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="asset_id"
                        label="asset"
                        :options="[]"
                    />
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{__('submit')}}</button>
                </div>

            </div>

        </form>

    </x-content>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#from_room_id').on('change', function () {
                let id = this.value;
                $.ajax({
                    url: "/get-room-assets?id=" + id,
                    success: function (data) {
                        let option = "<option value=''>-select-one-</option>";

                        data.forEach(item => {
                            option += `<option value=${item.id}>${item.asset_name}</option>`;
                        })

                        $('#asset_id').html(option);

                    }
                })
            })
        })
    </script>
@endpush
