<x-modal.content title="View Job Order">
    <table class="table table-borderless">
        <tr>
            <th>Job Order No.</th>
            <td>{{$jobOrder->job_order_no}}</td>
        </tr>
        <tr>
            <th>Requested Date</th>
            <td>{{$jobOrder->requested_date}}</td>
        </tr>
        <tr>
            <th>Requested By</th>
            <td>{{$jobOrder->requested_by}}</td>
        </tr>
        <tr>
            <th>Department</th>
            <td>{{$jobOrder->department->name ?? ''}}</td>
        </tr>
        <tr>
            <th>Current Status</th>
            <td>{{$jobOrder->status}}</td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>{{$jobOrder->phone_number}}</td>
        </tr>
        <tr>
            <th>Type Of Service</th>
            <td>{{$jobOrder->service_type}}</td>
        </tr>
        <tr>
            <th>Priority Level:</th>
            <td>{{$jobOrder->priority_level}}</td>
        </tr>
        <tr>
            <th>Issue Date:</th>
            <td>{{$jobOrder->issue_date}}</td>
        </tr>
        <tr>
            <th>Requested Date</th>
            <td>{{$jobOrder->requested_date}}</td>
        </tr>
    </table>
</x-modal.content>
