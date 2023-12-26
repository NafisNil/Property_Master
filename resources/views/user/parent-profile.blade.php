@extends('layouts.master')

@push('css')
    <style>
        .user-photo-container {
            overflow: hidden;
            border: 1px solid #ddd;
            padding: 5px;
        }

        .user-photo-container img {
            width: 100%;
            aspect-ratio: 1;
        }

    </style>
@endpush

@section('content')

    <x-content>
        <x-slot name="header">
            <h3>Parent Profile</h3>
            <a class="btn btn-primary" href="{{route("account-holders.edit", $accountHolder->id)}}">Edit Information</a>
        </x-slot>

        <div class="row mb-3">
            <div class="offset-4"></div>
            <div class="col-sm-4">
                <div class="user-photo-container">
                    <img src="{{$accountHolder->image_url}}"
                    />
                </div>
            </div>
            <div class="offset-4"></div>
        </div>

        <div class="row">
            <div class="col-12">
                <table>
                    <tr>
                        <th>Parent Id</th>
                        <td>{{$accountHolder->id}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($accountHolder->status)
                                Active
                            @else
                                InActive
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Relation</th>
                        <td>
                            @if($accountHolder->gender == 'male')
                                Father
                            @else
                                Mother
                            @endif
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-12">
                <h3>Personal Information</h3>
            </div>

            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>First Name</th>
                        <td>{{$accountHolder->first_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>Last Name:</th>
                        <td>{{$accountHolder->last_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>Middle Name:</th>
                        <td>{{$accountHolder->middle_name ?? ''}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12">
                <h3 class="my-2">
                    Address
                </h3>
            </div>

            <div class="col-12">
                <table class="table table-bordered w-100">
                    <tr>
                        <th>Country</th>
                        <td>{{$accountHolder->add ? $accountHolder->add->country : ''}}</td>
                    </tr>
                    <tr>
                        <th>State</th>
                        <td>{{$accountHolder->add->state ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td>{{$accountHolder->add->city ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$accountHolder->address->name ?? ''}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4 class="my-3">Contact</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered w-100">
                    <tr>
                        <th>Phone Office</th>
                        <td>{{$accountHolder->contact->office ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <td>{{$accountHolder->contact->mobile ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$accountHolder->contact->email ?? ''}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4 class="my-3">Emergency Contact</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered w-100">
                    <tr>
                        <th>Person Name</th>
                        <td>{{$accountHolder->emergencyContact->name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>Relation</th>
                        <td>{{$accountHolder->emergency->relation ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$accountHolder->emergencyContact->email ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{$accountHolder->emergencyContact->phone ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$accountHolder->emergencyContact->address ?? ''}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12">

            </div>

        </div>

    </x-content>
@endsection
