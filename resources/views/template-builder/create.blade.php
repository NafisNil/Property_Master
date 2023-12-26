@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('template-builder')}}</h3>
        </x-slot>

        <form method="post" action="{{route('templates.store')}}">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="name"
                        label="name"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="type"
                        label="type"
                        :options="$templateTypes"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="user_type_id"
                        label="user-type"
                        :options="$userTypes"
                    />
                </div>

                <div class="col-12 my-3">
                    <h3>{{__('fields')}}</h3>
                </div>

                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>{{__('data-type')}}</th>
                            <th>{{__('field-name')}}</th>
                            <th>{{__('required')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <input type="hidden" name="index" value="0" />
                            <td>
                                <x-form.select
                                    name="fields[0][type]"
                                    options="text=>Text, number=>Number, email=>Email, password=>Password, date=>Date, time=>Time"
                                />
                            </td>
                            <td>
                                <x-form.input
                                    name="fields[0][name]"
                                />
                            </td>
                            <td>
                                <x-form.select
                                    name="fields[0][is_required]"
                                    options="[no=>No, yes=>Yes]"
                                />
                            </td>
                            <td>
                                <button class="add-more-btn" type="button">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">{{__('submit')}}</button>
                </div>

            </div>
        </form>
    </x-content>
@endsection

@push('js')
    <script>
        $(document).ready(function () {

            $(document).on('click', '.add-more-btn', function () {
                let table = $(this).closest('table');
                let lll = $(table).find('tbody>tr:last')
                let index = Number($(lll).find('input[name=index]').val()) + 1;

                let prefix = "fields[" + index + "]";

                console.log({prefix})

                let cloned = $(lll).clone().find('input, select')
                    .each(function (ind, el) {
                        if (this.name !== 'index') {
                            this.name = this.name.replace(/fields\[\d+]/, prefix);
                            this.value = '';
                        }else{
                            this.value = index;
                        }
                    }).end();

                $(table).append(cloned)
            })

        })
    </script>
@endpush
