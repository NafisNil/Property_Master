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

        .list-table th {
            width: 40%
        }

        .list-table td {
            width: 60%
        }

    </style>
@endpush

@section('content')

    <x-content>
        <x-slot name="header">
            <h3>Profile</h3>
            <a href="{{route('account-holders.edit', $accountHolder->id)}}" class="btn btn-primary">Edit</a>
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

        <table class="table table-bordered list-table">
            <tr>
                <th>Status</th>
                <td>
                    @if($accountHolder->status)
                        Active
                    @else
                        Inactive
                    @endif
                </td>
            </tr>
        </table>

        <h4 class="my-2">
            Company
        </h4>

        <table class="table table-bordered list-table">
            <tr>
                <th>Name</th>
                <td>{{$accountHolder->corporation->name ?? ''}}</td>
            </tr>
            <tr>
                <th>Business No.</th>
                <td>{{$accountHolder->corporation->business_no ?? ''}}</td>
            </tr>
            <tr>
                <th>Office Country</th>
                <td>{{$accountHolder->corporation->office_country ?? ''}}</td>
            </tr>
            <tr>
                <th>Office State</th>
                <td>{{$accountHolder->corporation->office_state ?? ''}}</td>
            </tr>
            <tr>
                <th>Office City</th>
                <td>{{$accountHolder->corporation->office_city ?? ''}}</td>
            </tr>
        </table>

        <h4 class="my-2">
            Company Address
        </h4>

        <table class="table table-bordered list-table">

            <tr>
                <th>Country</th>
                <td>{{$accountHolder->corporation->address->country ?? ''}}</td>
            </tr>
            <tr>
                <th>State</th>
                <td>{{$accountHolder->corporation->address->state ?? ''}}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{$accountHolder->corporation->address->city ?? ''}}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{$accountHolder->corporation->address->name ?? ''}}</td>
            </tr>
        </table>

        <h4 class="my-2">
            Company Contact
        </h4>

        <table class="table table-bordered list-table">

            <tr>
                <th>Phone</th>
                <td>{{$accountHolder->corporation->contact->country ?? ''}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$accountHolder->corporation->contact->email ?? ''}}</td>
            </tr>
            <tr>
                <th>Fax</th>
                <td>{{$accountHolder->corporation->contact->fax ?? ''}}</td>
            </tr>
            <tr>
                <th>Website</th>
                <td>{{$accountHolder->corporation->contact->website ?? ''}}</td>
            </tr>
        </table>

        <h4>Company Director</h4>

        <table class="table table-bordered list-table">
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

        <h4 class="my-2">
            Address
        </h4>
        <table class="table table-bordered list-table">
            <tr>
                <th>Country</th>
                <td>{{$accountHolder->add->country ?? ''}}</td>
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

        <h4>Contact</h4>

        <table class="table table-bordered list-table">
            <tr>
                <th>Mobile</th>
                <td>{{$accountHolder->contact->mobile ?? ''}}</td>
            </tr>
            <tr>
                <th>Office</th>
                <td>{{$accountHolder->contact->office ?? ''}}</td>
            </tr>
            <tr>
                <th>Fax</th>
                <td>{{$accountHolder->contact->fax ?? ''}}</td>
            </tr>
            <tr>
                <th>Website</th>
                <td>{{$accountHolder->contact->website ?? '' }}</td>
            </tr>
        </table>

        <h4 class="my-2">Business License Profile</h4>

        @php
            $businessLicense = $accountHolder->licences ? $accountHolder->licenses[0]  : null;
        @endphp

        <table class="table table-bordered list-table">
            <tr>
                <th>Business License No</th>
                <td>{{$businessLicense->license_no ?? ''}}</td>
            </tr>
            <tr>
                <th>Issuer Name</th>
                <td>{{$businessLicense->issuer_name ?? ''}}</td>
            </tr>
            <tr>
                <th>Issuer Country</th>
                <td>{{$businessLicense->issuer_country ?? ''}}</td>
            </tr>
            <tr>
                <th>Issuer State</th>
                <td>{{$businessLicense->issuer_state ?? ''}}</td>
            </tr>
            <tr>
                <th>Issuer City</th>
                <td>{{$businessLicense->issuer_city ?? ''}}</td>
            </tr>
        </table>

        <h4 class="my-2">Contact</h4>

        <table class="table table-bordered list-table">
            <tr>
                <th>Office Phone</th>
                <td>{{$businessLicense->contact->office ?? ''}}</td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td>{{$businessLicense->contact->mobile ?? ''}}</td>
            </tr>
            <tr>
                <th>Fax</th>
                <td>{{$businessLicense->contact->fax ?? ''}}</td>
            </tr>
            <tr>
                <th>Website</th>
                <td>{{$businessLicense->contact->website ?? ''}}</td>
            </tr>
        </table>

        <table>
            <tr>
                <th>Feedback</th>
                <td>{{$accountHolder->feedback ?? ''}}</td>
            </tr>
            <tr>
                <th>Comment</th>
                <td>{{$accountHolder->comment ?? ''}}</td>
            </tr>
        </table>

    </x-content>
@endsection
