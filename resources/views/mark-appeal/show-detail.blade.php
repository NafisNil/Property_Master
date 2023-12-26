@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h4>{{__("mark-appeal-detail")}}</h4>
            <a href="{{route('mark-appeals.create-resolve', $markAppeal->id)}}" class="btn btn-primary">Resolve</a>
        </x-slot>
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>{{__('date')}}</th>
                    <td>{{$markAppeal->date}}</td>
                </tr>
                <tr>
                    <th>{{__('appeal-to')}}</th>
                    <td{{$markAppeal->toTeacher}}
                </tr>
                <tr>
                    <th>{{__('from-student')}}</th>
                    <td>{{$markAppeal->fromStudent->full_name ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('assessment')}}</th>
                    <td>{{$markAppeal->assessment->title ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('received-mark')}}</th>
                    <td>{{$markAppeal->received_mark}}</td>
                </tr>

                <tr>
                    <th>{{__('comment')}}</th>
                    <td>{{$markAppeal->comment ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('appeal-reason')}}</th>
                    <td>{{$markAppeal->appeal_reason}}</td>
                </tr>
            </table>

            <h4 class="mt-4">{{__('documents')}}</h4>

            <div class="row">
                @foreach( $markAppeal->attachments as $attachment)
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4>{{$attachment->file_name}}</h4>
                            </div>
                            <a class="btn btn-info" href="{{route('open-file', $attachment->file_name)}}"
                               target="_blank">{{__('open')}}</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </x-content>

@endsection
