@extends('layouts.master')

@section('page_title')
    Rules, Policies and Procedures {{$school->name}}
@endsection

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('rules-policies-and-procedures')}}</h3>
        </x-slot>

        <x-form action="{{route('SchoolRulesPoliciesAndProcedures.Update')}}"
                mehthod="put"
        >
            <div class="row">
                <div class="col-12">
                    <x-form.textarea
                        name="rules"
                        label="Rules"
                        rows="6"
                        value="{{$school->rules}}"
                        :required="true"
                        data-rules="required"
                    />
                </div>
                <div class="col-12">
                    <x-form.textarea
                        name="policies"
                        label="policies"
                        rows="6"
                        value="{{$school->policies}}"
                        :required="true"
                        data-rules="required"
                    />
                </div>
                <div class="col-12">
                    <x-form.textarea
                        name="procedures"
                        label="procedures"
                        rows="6"
                        value="{{$school->procedures}}"
                        :required="true"
                        data-rules="required"
                    />
                </div>

                <div class="col-12">
                    <button class="btn btn-primary float-right" type="submit">{{__('update')}}</button>
                </div>

            </div>
        </x-form>
    </x-content>
@endsection


