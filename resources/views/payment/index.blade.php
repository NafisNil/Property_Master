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
            <table class="table table-bordered w-100">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>Account</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{$payment->id}}</td>
                        <td>{{$payment->amount}}</td>
                        <td>{{$payment->method}}</td>
                        <td>{{$payment->account->name}}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
