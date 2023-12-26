@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-booking')}}</h3>
        </x-slot>

        <x-form action="{{route('bookings.update', $booking->id)}}" method="PUT">

            <div class="row">

                <div class="col-12">
                    @include('partials.error-alert', ['errors' => $errors])
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="date"
                        label="date"
                        type="datetime-local"
                        value="{{$booking->date}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.select
                        name="requester_id"
                        label="requester"
                        :options="$accountHolders"
                        value="{{$booking->requester_id}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="request_type"
                        label="request-type"
                        value="{{$booking->request_type}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.textarea
                        name="request_description"
                        label="request-description"
                        value="{{$booking->request_description}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="request_location"
                        label="request-location"
                        value="{{$booking->request_description}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="request_date"
                        label="request-date"
                        type="datetime-local"
                        value="{{$booking->request_date}}"
                    />
                </div>

                <div class="col-12">
                    <h3>Participants</h3>
                </div>

                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>{{__('participant-name')}}</th>
                            <th>{{__('participant-type')}}</th>
                            <th>
                                <button id="add_more_participant" class="btn btn-primary btn-sm btn-icon" type="button">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($booking->participants as $index=>$participant)
                            @include('booking.participant-row', ['item' => $participant, 'index' => $index])
                        @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="col-sm-4">
                    <x-form.input
                        name="special-request"
                        label="special-request"
                        value="{{$booking->special_request}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="additional_note"
                        label="additional-note"
                        value="{{$booking->additional_note}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="payment_required"
                        label="payment-required"
                        options="[0=>No, 1=>Yes]"
                        value="{{$booking->payment_required}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="payment_refundable"
                        label="payment-refundable"
                        options="[0=>No, 1=>Yes]"
                        value="{{$booking->payment_refundable}}"
                    />
                </div>

                <div class="col-12">
                    <h3>{{__('fees-and-charges')}}</h3>
                </div>

                <div class="col-sm-12">
                    <table class="table table-bordered" id="charge_table">
                        <thead>
                        <tr>
                            <th>{{__('title')}}</th>
                            <th>{{__('amount')}}</th>
                            <th>{{__('discount')}}</th>
                            <th>{{__('net-payable')}}</th>
                            <th>{{__('comment')}}</th>
                            <th>
                                <button id="add_more" class="btn btn-primary btn-sm btn-icon" type="button">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($booking->charges as $index=>$charge)
                                @include('booking.charge-row', ['index' => $index, 'item' => $charge])
                            @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>{{__('tax')}}</td>
                            <td>
                                <x-form.input
                                    name="tax"
                                    value="{{$booking->tax}}"
                                />
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>{{__('total')}}</td>
                            <td>
                                <x-form.input
                                    name="total"
                                    value="{{$booking->amount}}"
                                    readonly="readonly"
                                />
                            </td>
                            <td></td>
                        </tr>
                        </tfoot>

                    </table>
                </div>

                <div class="col-12">
                    <h3>{{__('payment-info')}}</h3>
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="receipt_no"
                        label="receipt-no"
                        value="{{$booking->payment->receipt_no ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="paid_amount"
                        label="paid-amount"
                        value="{{$booking->payment->amount ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="payment_method"
                        label="payment-method"
                        value="{{$booking->payment->payment_method}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="paid_by"
                        label="paid-by"
                        value="{{$booking->payment->paid_by ?? ''}}"
                    />
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{__('update')}}</button>
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

                let prefix = "charges[" + index + "]";

                let cloned = $(lll).clone().find('input, select')
                    .each(function () {
                        if (this.name !== 'index') {
                            this.name = this.name.replace(/charges\[\d+]/, prefix);
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

            $(document).on('change', '.charge-amount, .charge-discount', function () {

                let row = $(this).closest('tr');

                let chargeAmount = $(row).find('.charge-amount').val();

                let discountAmount = $(row).find('.charge-discount').val();

                let netAmount = Number(chargeAmount) - Number(discountAmount);

                $(row).find('.charge-net-payable').val(netAmount);

                calculateTotal();

            })

            $('#tax').on('change', function () {
                calculateTotal();
            })

            const calculateTotal = () => {
                let sum = 0;
                $('#charge_table tbody').find('tr').each(function () {
                    let netAmount = $(this).find('.charge-net-payable').val();
                    console.log({netAmount: $(this)});
                    sum += Number(netAmount);

                })
                let tax = $('#tax').val();

                let total = sum + Number(tax);

                $('#total').val(total);
                $('#paid_amount').val(total)

            }

        })
    </script>
@endpush
