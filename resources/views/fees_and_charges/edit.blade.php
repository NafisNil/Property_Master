@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
@endpush

@section('page_title')
    Update Fees and Charges
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('fees-and-charges.index') }}">Fees and Other Charges
                    Directory</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Fees and Other Charges</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h4>Update Fees And Charges</h4>
        </x-slot>
        <div class="row">
            <div class="col-md-12">
                <x-form action="{{ route('fees-and-charges.update', $feesAndCharge->id) }}"
                        method="PUT"
                >

                    <div class="row">

                        <div class="col-sm-6">
                            <x-form.select
                                name="category_id"
                                label="Category"
                                :options="$feesCategories"
                                value="{{$feesAndCharge->category_id}}"
                            />
                        </div>

                        <div class="col-sm-6">
                            <x-form.select
                                name="program_id"
                                label="Program"
                                :options="$programs"
                                value="{{$feesAndCharge->program_id}}"
                            />
                        </div>

                        <div class="col-sm-6">
                            <x-form.select
                                name="grade_year_id"
                                label="Grade Year"
                                :options="$gradeYears"
                                value="{{$feesAndCharge->grade_year_id}}"
                            />
                        </div>


                        <!--                        <div class="col-sm-6">
                                                    <div class="form-group mb-3">
                                                        <label for="name" class="form-label">Title</label>
                                                        <input type="text" class="form-control" placeholder="" name="name" required>
                                                        <div class="valid-feedback"></div>
                                                    </div>
                                                </div>-->

                        <div class="col-sm-6">
                            <x-form.input
                                name="fee_domestic"
                                label="Fee For Domestic Student"
                                value="{{$feesAndCharge->fee_domestic}}"
                            />

                        </div>


                        <div class="col-sm-6">
                            <x-form.input
                                name="fee_international"
                                label="Fee For International Student"
                                value="{{$feesAndCharge->fee_international}}"
                            />
                        </div>

                        <div class="col-sm-6">
                            <x-form.input
                                name="fee_special_needs"
                                label="Fee For Special Needs Student"
                                value="{{$feesAndCharge->fee_special_needs}}"
                            />
                        </div>


                        <div class="col-sm-6">
                            <x-form.input
                                name="comment"
                                label="Comment"
                            />
                        </div>

                        <div class="col-sm-6">
                            <x-form.select
                                name="refundable"
                                label="Refundable"
                                options="[0=>No, 1 => Yes]"
                                value="{{$feesAndCharge->refundable}}"
                            />
                        </div>

                        <div class="col-sm-6">
                            @include('partials.active-status', ['status' => $feesAndCharge->status])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary submit">Submit</button>
                        </div>
                    </div>
                </x-form>
            </div>
        </div>
    </x-content>

@endsection



@push('js')

    <script>
        $(document).ready(function () {

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
