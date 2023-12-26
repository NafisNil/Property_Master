<x-modal.content title="View Account Holder">
    <table class="table table-borderless">
        <tr>
            <th>First Name</th>
            <td>{{$student->first_name}}</td>
        </tr>
        <tr>
            <th>Last Name:</th>
            <td>{{$student->last_name}}</td>
        </tr>
        <tr>
            <th>Middle Name:</th>
            <td>{{$student->middle_name}}</td>
        </tr>

        <tr>
            <td>Program</td>
            <td>{{$student->detail->program->program_name}}</td>
        </tr>

        <tr>

        </tr>

        <tr>
            <td>Current Semester</td>
            <td>{{$student->detail->semester}}</td>
        </tr>

        <tr>
            <td>Father</td>
            <td>{{$student->detail->father->full_name}}</td>
        </tr>

        <tr>
            <td>Mother</td>
            <td>{{$student->detail->mother->full_name}}</td>
        </tr>

    </table>

    <h4 class="my-2">
        Address
    </h4>
    <table class="table table-bordered w-100">
        <tr>
            <th>Country</th>
            <td>{{$student->add ? $student->add->country : ''}}</td>
        </tr>
        <tr>
            <th>State</th>
            <td>{{$student->add->state ?? ''}}</td>
        </tr>
        <tr>
            <th>City</th>
            <td>{{$student->add->city ?? ''}}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{$student->address->name ?? ''}}</td>
        </tr>
    </table>

</x-modal.content>
