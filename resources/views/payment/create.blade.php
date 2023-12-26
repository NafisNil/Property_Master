@extends('layouts.master')


@section('content')

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('samples.index') }}">Sample</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sample Create</li>
        </ol>
    </nav>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="text-center">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            {!! Form::open(['url' => route('payments.store'), 'files' => true]) !!}

            <div class="row">

                <div class="col-sm-4 mb-3">
                    {!! Form::label('invoices', 'Purchase Code', ['class' => 'control-label'])!!}
                    {!! Form::select('invoices[]', $invoices, request()->query("invoice") ?? '', ['class' => 'form-control', 'placeholder' => 'Select Purchase Offer', 'id' => 'select_invoice'] ) !!}
                </div>

                <div class="col-sm-4 mb-3">
                    {!! Form::label("date", 'Date', ['class' => 'control-label']) !!}
                    {!! Form::datetimelocal('date', now(), ['class' => 'form-control']) !!}
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered w-100" id="payments_table">
                        <thead>
                        <tr>
                            <th>Invoice Number</th>
                            <th>Date</th>
                            <th>Total Amount</th>
                            <th>Total Paid</th>
                            <th>Total Due</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                        <tr>
                            <td>Grand Total</td>
                            <td>
                                <input type="text" name="grand_total" id="grand_total" class="form-control"/>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('method', 'Payment Method', ['class' => 'control-label']) !!}
                        {!! Form::select('method', $paymentMethods, '', ['class' => 'form-control', 'placeholder' => 'select payment method']) !!}
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('account_id', 'Select Account', ['class' => 'control-label']) !!}
                        {!! Form::select('account_id', $bankAccounts, '', ['class' => 'form-control', 'placeholder' => 'Select Bank Account']) !!}
                    </div>
                </div>

            </div>

            <div class="mt-4">
                <button class="btn btn-primary float-end" type="submit">Submit</button>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function () {

            $('#select_invoice').on('change', function () {
                let id = this.value;

                let index = $('#payments_table tbody>tr:last').find("input[name='index']").val();

                if (!index) {
                    index = 0;
                } else {
                    index++;
                }

                if (id) {

                    $.ajax({
                        url: `/get-payment-row?id=${id}&index=${index}`,
                        success: function (html) {

                            $('#payments_table tbody')
                                .append(html);
                            calculateSubTotal()
                        }
                    })
                }
            });

            //item quantity

            $(document).on("change", '.item-qty, .item-cost', function () {
                let qty = $(this).closest('tr').find('.item-qty').val();
                let price = $(this).closest('tr').find('.item-cost').val();
                let amount = qty * price;
                $(this).closest('tr').find('.item-due').val(amount)
                calculateSubTotal()
            })

            //on select purchase offer

            let selectedValue = $('#select_purchase_offer').val();

            if (selectedValue) {
                getPurchaseInformation();
            }
        });

        function calculateSubTotal() {
            let subTotal = 0;
            $('#payments_table tbody tr').each(function () {
                subTotal += parseFloat($(this).find('.item-amount').val());
            });

            $('#grand_total').val(subTotal);
        }

        function calculateGrandTotal() {

            let subTotal = $('#sub_total').val();

            //get tax
            let tax = parseFloat($('#tax_total').val());

            tax = isNaN(tax) ? 0 : tax;

            let total = parseFloat(subTotal) + tax;
            $('#total').val(total)

        }

        //on mode selection change

        $('#select_mode').on('change', function () {
            let mode = $(this).val();
            let placeholder = 'Select Service Provider';
            let type = '';
            if ('service') {
                type = 'service-provider';
                placeholder = 'Select Service Provider';
            }
            if (mode === 'inventory') {
                type = 'seller';
                placeholder = 'Select Seller';
            }

            $.ajax({
                url: `/get-account-holders?type=${type}`,
                success: function (data) {

                    let options = `<option value=''>${placeholder}</optoin>`

                    $.each(data, function (index, value) {
                        options += `<option value="${value.id}">${value.full_name}</option>`
                    });

                    $('#select_provider').html(options)
                }
            })
        });

        $(document).on('change', '#select_purchase_offer', function () {
            getPurchaseInformation();
        });

        //get purchase information

        function getPurchaseInformation() {

            let id = $('#select_purchase_offer').val();

            $.ajax({
                url: `/get-purchase-offer?id=${id}`,
                success: function (data) {
                    let {offer, html} = data;
                    $('#items_table tbody')
                        .html(html);

                    console.log({offer})

                    $('#select_service_provider').val(offer.account_holder_id);

                    $("#select_campus").val(offer.campus_id);

                    calculateSubTotal()
                }
            })

        }

        //on tax select

        $(document).on('change', '.tax-select', function () {

            let id = this.value;
            let parent = $(this).closest('.tax-row');

            $.ajax({
                url: '/get-tax?id=' + id,
                success: function (data) {
                    let percent = data.rate;
                    parent.find('.tax-percent').val(percent);
                    let subTotal = $('#sub_total').val();
                    let taxAmount = (percent * subTotal) / 100;
                    $(parent).find('.tax-amount').val(taxAmount);
                    calculateTotalTax();
                }
            })

            //let percent = parent.find('.tax-select').val();


        });

        //on click add more

        $('#add_more').on('click', function () {

            let lll = $('#tax_table tbody>tr:last')

            let index = Number($(lll).find('input[name=index]').val()) + 1;

            let prefix = "taxes[" + index + "]";

            console.log({prefix})

            let cloned = $(lll).clone()
                .find('input:text, select')
                .each(function (ind, el) {
                    this.name = this.name.replace(/taxes\[\d+]/, prefix);
                    this.value = '';
                })
                .end();

            $('#tax_table tbody').append(cloned);
        })

        function calculateTotalTax() {
            let taxes = $('#tax_table tbody tr');
            let sum = 0;
            $.each(taxes, function (key, item) {
                let amount = parseFloat($(item).find('.tax-amount').val());
                sum += isNaN(amount) ? 0 : amount;
            })
            $('#tax_total').val(sum);
            calculateGrandTotal();
        }

    </script>
@endpush
