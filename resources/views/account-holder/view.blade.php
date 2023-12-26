<x-modal.content title="View Account Holder">
    <table class="table table-borderless">
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
        <tr>
            <th>
                Education:
            </th>
            <td>{{$accountHolder->education ?? ''}}</td>
        </tr>
    </table>

    <h4 class="my-2">
        Address
    </h4>
    <table class="table table-bordered w-100">
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

    <h4 class="my-2">Contact</h4>

    <table class="table table-bordered">
        <tr>
            <th>Mobile</th>
            <td>{{$accountHolder->contact->mobile ?? ''}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$accountHolder->contact->email ?? ''}}</td>
        </tr>
        <tr>
            <th>Fax</th>
            <td>{{$accountHolder->contact->fax ?? ''}}</td>
        </tr>
        <tr>
            <th>Website</th>
            <td>{{$accountHolder->contact->fax ?? ''}}</td>
        </tr>
    </table>

    @if($accountHolder->type->slug == 'seller' || $accountHolder->type->slug == 'service-provider')

        <h4 class="my-2">
            Corporation
        </h4>

        <table class="table table-bordered w-100">
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
                <th>Office Country</th>
                <td>{{$accountHolder->corporation->office_state ?? ''}}</td>
            </tr>
            <tr>
                <th>Office Country</th>
                <td>{{$accountHolder->corporation->office_city ?? ''}}</td>
            </tr>
        </table>

        <h4 class="my-2">
            Corporation Address
        </h4>

        <table class="table table-bordered w-100">

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
            Insurance
        </h4>

        <table class="table table-bordered w-100">
            <tr>
                <th>Policy No.</th>
                <td>{{$accountHolder->insurance->policy_no ?? ''}}</td>
            </tr>
            <tr>
                <th>Maximum Coverage</th>
                <td>{{$accountHolder->insurance->maximum_coverage ?? ''}}</td>
            </tr>
            <tr>
                <th>Issuer Name</th>
                <td>{{$accountHolder->insurance->issuer_name ?? ''}}</td>
            </tr>
            <tr>
                <th>Issuer Country</th>
                <td>{{$accountHolder->corporation->issuer_country ?? ''}}</td>
            </tr>
            <tr>
                <th>Issuer Country</th>
                <td>{{$accountHolder->corporation->office_state ?? ''}}</td>
            </tr>
            <tr>
                <th>Issuer</th>
                <td>{{$accountHolder->corporation->office_city ?? ''}}</td>
            </tr>
        </table>

        <h4 class="my-2">
            Corporation Address
        </h4>

        <table class="table table-bordered w-100">

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

    @endif

</x-modal.content>
