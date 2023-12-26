@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    Update Project
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Assignment.index') }}">Assignment</a></li>
            <li class="breadcrumb-item active" aria-current="page">Assignment</li>
        </ol>
    </nav>

    @include('partials.error-alert',['errors' => $errors])

    <div class="row">

        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-capitalize">Create Form</h6>
                    <form action="{{ route('projects.update', $project->id) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-sm-4">
                                <x-form.input
                                    name="project_no"
                                    value="{{$project->project_no}}"
                                    label="Project No."
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="name"
                                    label="Project Name*"
                                    value="{{$project->name}}"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.select
                                    name="status"
                                    :options="$statuses"
                                    label="Select Status"
                                    value="{{$project->status}}"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="location"
                                    label="Location"
                                    value="{{$project->location}}"
                                />
                            </div>

                            <div class="col-12 my-2">
                                <h4>Project Duration</h4>
                            </div>

                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Comment</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($project->durations as $index=>$item)
                                        @include('project.partials.duration-row',['index' => $index, 'item' => $item])
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button class="btn btn-primary btn-icon add-more-btn" type="button">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="col-sm-12 my-3">
                                <h4>Budgets</h4>
                            </div>

                            <div class="col-12">
                                <table class="table table-bordered" id="time_sheet_table">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Amount Before Tax</th>
                                        <th>Tax Amount</th>
                                        <th>Amount After Tax</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($project->budgets as $index=>$item)
                                        @include('project.partials.budget-row', ['index' => 0, 'item' => $item, 'budgetTypes' => $budgetTypes])
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button class="btn btn-primary btn-icon add-more-btn" type="button">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="col-sm-12 my-2">
                                <h4>Project Timeline</h4>
                            </div>

                            <div class="col-12">
                                <table class="table table-bordered" id="time_sheet_table">
                                    <thead>
                                    <tr>
                                        <th>Task Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Comment</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($project->timelines as $item)
                                        @include('project.partials.task-row', ['index' => 0, 'item' => $item])
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button class="btn btn-primary btn-icon add-more-btn" type="button">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="col-12 my-2">
                                <h4>Payment Schedule</h4>
                            </div>

                            <div class="col-12">
                                <table class="table table-bordered" id="time_sheet_table">
                                    <thead>
                                    <tr>
                                        <th>Payment No.</th>
                                        <th>Due Date</th>
                                        <th>Amount</th>
                                        <th>Balance</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($project->payments as $index=>$item)
                                        @include('project.partials.payment-row',['index' => $index, 'item' => $item])
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button class="btn btn-primary btn-icon add-more-btn" type="button">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                                       name="created_by">
                                <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                                       name="updated_by">
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
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}

    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            $(document).on('click', '.add-more-btn', function () {

                let table = $(this).closest('table');

                let lll = $(table).find('tbody>tr:last')
                let index = Number($(lll).find('input[name=index]').val()) + 1;
                let prefix = "items[" + index + "]";
                let cloned = $(lll).clone().find('input, select')
                    .each(function (ind, el) {
                        this.name = this.name.replace(/items\[\d+]/, prefix);
                        if (this.name === 'index') {
                            this.value = index;
                        } else {
                            this.value = '';
                        }
                    }).end();

                $(table).append(cloned)
            })


        });

        $(document).on('change', '.amount-before-tax, .tax-amount', function () {
            let tr = $(this).closest('tr');

            let amountBeforeTax = $(tr).find('.amount-before-tax').val();

            let taxAmount = $(tr).find('.tax-amount').val();
            let amountAfterTax = Number(amountBeforeTax) + Number(taxAmount);

            $(tr).find('.amount-after-tax').val(amountAfterTax);
        })

    </script>
@endpush
