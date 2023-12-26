@extends('layouts.master')


@section('content')

    <x-content>
        <x-slot name="header">
            <h4>Invoice Tuition Setting</h4>
        </x-slot>

        @include('partials.error-alert',['errors' => $errors])

        <x-form action="{{route('tuition-invoice-settings.update', $invoiceSetting->id)}}"
                method="put"
        >
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="date"
                        label="Date"
                        type="date"
                        value="{{$invoiceSetting->date ?? ''}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="due_date"
                        label="Due Date"
                        type="date"
                        value="{{$invoiceSetting->due_date ?? ''}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="program_id"
                        label="Program"
                        :options="$programs"
                        value="{{$invoiceSetting->program_id}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="grade_year_id"
                        label="Grade Year"
                        :options="$gradeYears"
                        value="{{$invoiceSetting->grade_year_id}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="has_late_fee"
                        label="Has Late Fee"
                        options="[0=>No, 1=>Yes]"
                        value="{{$invoiceSetting->has_late_fee ?? ''}}"
                    />
                </div>

                <div id="late_fee_container" class="col-12 {{empty($invoiceSetting->has_late_fee) ? 'd-none': ''}}">

                    <div class="row">

                        <div class="col-sm-4">
                            <x-form.input
                                name="late_fee"
                                label="Late Fee"
                                value="{{$invoiceSetting->late_fee ?? ''}}"
                            />
                        </div>

                        <div class="col-sm-4">
                            <x-form.select
                                name="has_cumulative_late_fee"
                                label="Has Cumulative Late Fee"
                                options="[0=>No, 1=>Yes]"
                                value="{{$invoiceSetting->has_cumulative_late_fee ?? ''}}"
                            />
                        </div>

                        <div
                            class="col-sm-4 cumulative-late-fee {{empty($invoiceSetting->has_cumulative_late_fee) ? 'd-none': ''}}">
                            <x-form.input
                                name="interval"
                                label="Interval in Days(After Due Date)"
                                value="{{$invoiceSetting->interval ?? ''}}"
                            />
                        </div>

                        <div
                            class="col-sm-4 cumulative-late-fee {{empty($invoiceSetting->has_cumulative_late_fee) ? 'd-none': ''}}">
                            <x-form.input
                                name="cumulative_late_fee"
                                label="Cumulative Late Fee"
                                value="{{$invoiceSetting->cumulative_late_fee ?? ''}}"
                            />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        @include('partials.active-status', ['status' => $invoiceSetting->status])
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

            $(document).on('click', '#has_cumulative_late_fee', function () {
                let value = this.value;

                if (value && parseInt(value) === 1) {
                    $('.cumulative-late-fee').removeClass('d-none');
                } else {
                    $('.cumulative-late-fee').addClass('d-none');
                }
            })

        })
    </script>
@endpush
