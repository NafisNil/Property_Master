@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('view-template')}}</h3>
        </x-slot>

        <div>
            <table class="table table-bordered">
                <tr>
                    <th>{{__('template-name')}}</th>
                    <td>{{$template->name}}</td>
                </tr>
                <tr>
                    <th>{{__('template-type')}}</th>
                    <td>{{$template->type}}</td>
                </tr>
                <tr>
                    <th>{{__('user-type')}}</th>
                    <td>{{$template->userType->name ?? ''}}</td>
                </tr>
            </table>

            <h4 class="my-3">Fields</h4>


           <div class="row">
                @foreach($template->fields as $field)
                    <div class="col-sm-4">
                        <x-form.input
                            name="{{$field['name']}}"
                            label="{{$field['name']}}"
                            type="{{$field['type']}}"
                        />
                    </div>
                @endforeach
            </div>

        </div>

    </x-content>
@endsection
