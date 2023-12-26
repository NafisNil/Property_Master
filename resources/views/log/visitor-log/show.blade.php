<x-modal.content title="View Details">
    <table class="table table-bordered">
        <tr>
            <th>Date</th>
            <td>{{$visitorLog->date}}</td>
        </tr>

        <tr>
            <th>Visitor Name</th>
            <td>{{$visitorLog->visitor_name}}</td>
        </tr>
        <tr>
            <th>Reason For Visit</th>
            <td>{{$visitorLog->purpose}}</td>
        </tr>
        <tr>
            <th>Department</th>
            <td>{{$visitorLog->department}}</td>
        </tr>
        <tr>
            <th>Meeting With</th>
            <td>{{$visitorLog->meeting_with}}</td>
        </tr>
        <tr>
            <th>Time In</th>
            <td>{{$visitorLog->time_in}}</td>
        </tr>
        <tr>
            <th>Time Out</th>
            <td>{{$visitorLog->time_out}}</td>
        </tr>

    </table>
</x-modal.content>
