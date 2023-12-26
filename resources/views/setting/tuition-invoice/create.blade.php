@extends('layouts.master')


@section('content')
    <x-content>
        <x-slot name="header">
            <h4>Invoice Tuition Setting</h4>
        </x-slot>

        <x-form action="{{route('tuition-invoice-settings.store')}}">
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="date"
                        label="Date"
                        type="date"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="due_date"
                        label="Due Date"
                        type="date"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="program_id"
                        label="Program"
                        :options="$programs"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="grade_year_id"
                        label="Grade Year"
                        :options="[]"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="has_late_fee"
                        label="Has Late Fee"
                        options="[0=>No, 1=>Yes]"
                    />
                </div>

                <div id="late_fee_container" class="col-12 d-none">

                    <div class="row">

                        <div class="col-sm-4">
                            <x-form.input
                                name="late_fee"
                                label="Late Fee"
                            />
                        </div>

                        <div class="col-sm-4">
                            <x-form.select
                                name="has_cumulative_late_fee"
                                label="Has Cumulative Late Fee"
                                options="[0=>No, 1=>Yes]"
                            />
                        </div>

                        <div class="col-sm-4 cumulative-late-fee d-none">
                            <x-form.input
                                name="interval"
                                label="Interval in Days(After Due Date)"
                            />
                        </div>

                        <div class="col-sm-4 cumulative-late-fee d-none">
                            <x-form.input
                                name="cumulative_late_fee"
                                label="Cumulative Late Fee"
                            />
                        </div>
                        <div class="col-sm-4">
                            @include('partials.active-status')
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <button class="btn btn-primary">Submit</button>
                </div>

            </div>
        </x-form>

    </x-content>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#has_late_fee').on('change', function () {
                let value = this.value;
                if (value && parseInt(value) === 1) {
                    $('#late_fee_container').removeClass('d-none');
                } else {
                    $('#late_fee_container').addClass('d-none');
                }
            })

            $(document).on('click', '#has_cumulative_late_fee', function () {
                let value = this.value;

                if (value && parseInt(value) === 1) {
                    $('.cumulative-late-fee').removeClass('d-none');
                } else {
                    $('.cumulative-late-fee').addClass('d-none');
                }
            })

            $('#program_id').on('change', function () {
                let program = this.value;

                $.ajax({
                    url: '/get-grade-year-dropdown?program=' + program,
                    success: function (html) {
                        $("#grade_year_id").html(html);
                    }
                })
            })


        })
    </script>
@endpush
