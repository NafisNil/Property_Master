@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('add-new-schedule')}}</h3>
        </x-slot>

        <x-form action="{{route('schedules.store')}}">

            <div class="row">

                <div class="col-12">
                    @include('partials.error-alert', ['errors' => $errors])
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="schedule_no"
                        label="schedule-no"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="date"
                        label="date"
                        type="datetime-local"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="title"
                        label="title"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="schedule_type_id"
                        label="type"
                        :options="$scheduleTypes"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="location"
                        label="location"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="prepared_by"
                        label="prepared-by"
                        :options="$accountHolders"
                    />
                </div>

                <div class="col-12">
                    <h3>{{__('recurrence')}}</h3>
                </div>

                <div class="col-sm-12">
                    <table class="table table-bordered" id="charge_table">
                        <thead>
                        <tr>
                            <th>{{__('pattern')}}</th>
                            <th>{{__('start-date')}}</th>
                            <th>{{__('end-date')}}</th>
                            <th>{{__('comment')}}</th>
                            <th>
                                <button id="add_more" class="btn btn-primary btn-sm btn-icon" type="button">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <input type="hidden" name="index" value="0">
                            <td>
                                <x-form.select
                                    name="recurrences[0][pattern]"
                                    :options="$scheduleRecurrences"
                                />
                            </td>
                            <td>
                                <x-form.input
                                    name="recurrences[0][start_date]"
                                    class="charge-amount"
                                    type="datetime-local"
                                />
                            </td>
                            <td>
                                <x-form.input
                                    name="recurrences[0][end_date]"
                                    class="charge-net-payable"
                                    type="datetime-local"
                                />
                            </td>
                            <td>
                                <x-form.input
                                    name="recurrences[0][comment]"
                                />
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm remove-item-btn" type="button"
                                        disabled="disabled"
                                >
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-12">
                    <h3>Participants</h3>
                </div>

                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Participant Name</th>
                            <th>Participant Type</th>
                            <th>
                                <button id="add_more_participant" class="btn btn-primary btn-sm btn-icon" type="button">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <input type="hidden" name="index" vlaue="0"/>
                            <td>
                                <x-form.input
                                    name="participants[0][name]"
                                />
                            </td>
                            <td>
                                <x-form.input
                                    name="participants[0][type]"
                                />
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="comment"
                        label="comment"
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

            $('#add_more').on('click', function () {

                let table = $(this).closest('table');
                let lll = $(table).find('tbody>tr:last')
                let index = Number($(lll).find('input[name=index]').val()) + 1;

                let prefix = "recurrences[" + index + "]";

                let cloned = $(lll).clone().find('input, select')
                    .each(function () {
                        if (this.name !== 'index') {
                            this.name = this.name.replace(/recurrences\[\d+]/, prefix);
                            this.value = '';
                            $(this).removeAttr('disabled');
                        } else {
                            this.value = index;
                        }
                    }).end();

                $(table).append(cloned)
            })

            $('#add_more_participant').on('click', function () {

                console.log('click');

                let table = $(this).closest('table');
                let lll = $(table).find('tbody>tr:last')
                let index = Number($(lll).find('input[name=index]').val()) + 1;

                let prefix = "participants[" + index + "]";

                console.log({prefix})

                let cloned = $(lll).clone().find('input, select')
                    .each(function () {
                        if (this.name !== 'index') {
                            this.name = this.name.replace(/participants\[\d+]/, prefix);
                            this.value = '';
                        } else {
                            this.value = index;
                        }
                    }).end();

                $(table).append(cloned)
            })
        });
    </script>

@endpush
