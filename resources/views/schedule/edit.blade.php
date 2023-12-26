@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-schedule')}}</h3>
        </x-slot>

        <x-form action="{{route('schedules.update', $schedule->id)}}"
                method="PUT"
        >

            <div class="row">

                <div class="col-12">
                    @include('partials.error-alert', ['errors' => $errors])
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="schedule_no"
                        label="schedule-no"
                        value="{{$schedule->schedule_no}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="date"
                        label="date"
                        type="datetime-local"
                        value="{{$schedule->date}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="title"
                        label="title"
                        value="{{$schedule->title}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="schedule_type_id"
                        label="type"
                        :options="$scheduleTypes"
                        value="{{$schedule->schedule_type_id}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="location"
                        label="location"
                        value="{{$schedule->location}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="prepared_by"
                        label="prepared-by"
                        :options="$accountHolders"
                        value="{{$schedule->prepared_by}}"
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
                        @foreach($schedule->recurrences as $index=>$recurrence)

                            <tr>
                                <input type="hidden" name="index" value="{{$index}}">
                                <td>
                                    <x-form.select
                                        name="{{'recurrences['. $index .'][pattern]'}}"
                                        :options="$scheduleRecurrences"
                                        value="{{$recurrence->pattern}}"
                                    />
                                </td>
                                <td>
                                    <x-form.input
                                        name="{{'recurrences['. $index .'][start_date]'}}"
                                        type="datetime-local"
                                        value="{{$recurrence->start_date}}"
                                    />
                                </td>
                                <td>
                                    <x-form.input
                                        name="{{'recurrences['. $index .'][end_date]'}}"
                                        type="datetime-local"
                                        value="{{$recurrence->end_date}}"
                                    />
                                </td>
                                <td>
                                    <x-form.input
                                        name="{{'recurrences['. $index .'][comment]'}}"
                                        value="{{$recurrence->comment}}"
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
                        @endforeach
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
                            <th>{{__('participant-name')}}</th>
                            <th>{{__('participant-name')}}</th>
                            <th>
                                <button id="add_more_participant" class="btn btn-primary btn-sm btn-icon" type="button">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($schedule->participants as $index=>$participant)

                            <tr>
                                <input type="hidden" name="index" value="{{$index}}"/>
                                <td>
                                    <x-form.input
                                        name="{{'participants['. $index. '][name]'}}"
                                        value="{{$participant->name}}"
                                    />
                                </td>
                                <td>
                                    <x-form.input
                                        name="{{'participants['. $index. '][type]'}}"
                                        value="{{$participant->type}}"
                                    />
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="comment"
                        label="comment"
                        value="{{$schedule->comment}}"
                    />
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">{{__('update')}}</button>
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
