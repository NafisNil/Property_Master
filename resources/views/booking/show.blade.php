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
                        <th>{{__('booking-no')}}</th>
                        <td>{{$booking->id}}</td>
                    </tr>
                    <tr>
                        <th>{{__('date')}}</th>
                        <td>{{$booking->date}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-12">
                <h3>{{__('requester')}}</h3>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>{{__('full-name')}}</th>
                        <td>{{$booking->requester->full_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('account-holder-type')}}</th>
                        <td>{{$booking->requester->type->name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('photo')}}</th>
                        <td>
                            @if(isset($booking->requester->photo))
                                <img src="{{$booking->requester->image ?? ''}}">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>{{__('mobile')}}}</th>
                        <td>{{$booking->requester->mobile ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('office')}}</th>
                        <td>{{$booking->requester->office ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('email')}}</th>
                        <td>{{$booking->requester->email ?? ''}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12">
                <h3>{{__('request-details')}}</h3>
            </div>

            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>{{__('type')}}</th>
                        <td>{{$booking->request_type}}</td>
                    </tr>
                    <tr>
                        <th>{{__('description')}}</th>
                        <td>{{$booking->request_description}}</td>
                    </tr>
                    <tr>
                        <th>{{__('request-location')}}</th>
                        <td>{{$booking->request_location}}</td>
                    </tr>
                    <tr>
                        <th>{{__('request-date')}}</th>
                        <td>{{$booking->request_date}}</td>
                    </tr>
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
                    @foreach($booking->participants as $index=>$participant)
                        <tr>
                            <th>{{$index}}</th>
                            <td>{{$participant->name}}</td>
                            <td>{{$participant->type}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{__('title')}}</th>
                            <th>{{__('amount')}}</th>
                            <th>{{__('discount')}}</th>
                            <th>{{__('net-amount')}}</th>
                            <th>{{__('comment')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($booking->charges as $charge)
                        <tr>
                            <td>{{$charge->title}}</td>
                            <td>{{$charge->amount}}</td>
                            <td>{{$charge->discount}}</td>
                            <td>{{$charge->net_amount}}</td>
                            <td>{{$charge->comment}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{__('tax')}}</td>
                        <td>{{$booking->tax}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{__('total')}}</td>
                        <td>{{$booking->amount}}</td>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <div class="col-12">
                <table>
                    <tr>
                        <th>{{__('special-request')}}</th>
                        <td>{{$booking->special_request}}</td>
                    </tr>
                    <tr>
                        <th>{{__('additional-note')}}</th>
                        <td>{{$booking->additional_note}}</td>
                    </tr>
                    <tr>
                        <th>{{__('payment-required')}}}}</th>
                        <td>{{$booking->payment_required ? 'Yes' : 'No'}}</td>
                    </tr>
                    <tr>
                        <th>{{__('payment-refundable')}}</th>
                        <td>{{$booking->payment_refundalbe ? 'Yes': 'No'}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12">
                <h3>{{__('payment-info')}}</h3>
            </div>

            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>{{__('receipt-no')}}</th>
                        <td>{{$booking->payment->receipt_no ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('amount')}}</th>
                        <td>{{$booking->payment->amount ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('payment-date')}}</th>
                        <td>{{$booking->payment->date ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('payment-method')}}</th>
                        <td>{{$booking->payment->payment_method ?? ''}}</td>
                    </tr>
                </table>
            </div>

        </div>

    </x-content>
@endsection
