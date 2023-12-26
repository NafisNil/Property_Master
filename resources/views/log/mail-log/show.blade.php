<x-modal.content title="View Details">
    <table class="table table-bordered">
        <tr>
            <th>Date</th>
            <td>{{$mailLog->date}}</td>
        </tr>

        <tr>
            <th>Tracking No</th>
            <td>{{$mailLog->tracking_no}}</td>
        </tr>
        <tr>
            <th>Sender</th>
            <td>{{$mailLog->sender}}</td>
        </tr>
        <tr>
            <th>Recipient</th>
            <td>{{$mailLog->recipient}}</td>
        </tr>
        <tr>
            <th>Employee Name</th>
            <td>{{$mailLog->employee_name}}</td>
        </tr>
        <tr>
            <th>Mail Received Date</th>
            <td>{{$mailLog->date_received}}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{$mailLog->description}}</td>
        </tr>


    </table>
</x-modal.content>
