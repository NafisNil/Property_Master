@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('view-details')}}</h3>
        </x-slot>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>{{__('schedule-no')}}</th>
                        <td>{{$schedule->schedule_no}}</td>
                    </tr>
                    <tr>
                        <th>{{__('schedule-title')}}</th>
                        <td>{{$schedule->title}}</td>
                    </tr>
                    <tr>
                        <th>{{__('date')}}</th>
                        <td>{{$schedule->date}}</td>
                    </tr>
                    <tr>
                        <th>{{__('type')}}</th>
                        <td>{{$schedule->type->name ?? ''}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12 my-2">
                <h3>{{__('prepared-by')}}</h3>
            </div>

            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>{{__('full-name')}}</th>
                        <td>{{$schedule->requester->full_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('account-holder-type')}}</th>
                        <td>{{$schedule->requester->type->name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('photo')}}</th>
                        <td>
                            @if(isset($schedule->requester->photo))
                                <img src="{{$schedule->requester->image ?? ''}}">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>{{__('mobile')}}}</th>
                        <td>{{$schedule->requester->mobile ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('office')}}</th>
                        <td>{{$schedule->requester->office ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('email')}}</th>
                        <td>{{$schedule->requester->email ?? ''}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12">
                <h3>{{__('recurrences')}}</h3>
            </div>

            <div class="col-12 my-2">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{{__('pattern')}}</th>
                        <th>{{__('start_date')}}</th>
                        <th>{{__('end_date')}}</th>
                        <th>{{__('comment')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedule->recurrences as $recurrence)
                        <tr>
                            <td>{{$recurrence->pattern}}</td>
                            <td>{{$recurrence->start_date}}</td>
                            <td>{{$recurrence->end_date}}</td>
                            <td>{{$recurrence->comment}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12">
                <h3>{{__('participants')}}</h3>
            </div>

            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{{__('id')}}</th>
                        <th>{{__('name')}}</th>
                        <th>{{__('type')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedule->participants as $index=>$participant)
                        <tr>
                            <th>{{$index}}</th>
                            <td>{{$participant->name}}</td>
                            <td>{{$participant->type}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </x-content>
@endsection
