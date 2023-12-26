<x-modal.content title="View Details">
    <table class="table table-bordered">
        <tr>
            <th>Date</th>
            <td>{{$employeeAttendance->date}}</td>
        </tr>
        <tr>
            <th>Employee Name</th>
            <td>{{$employeeAttendance->employee_name}}</td>
        </tr>
        <tr>
            <th>Time In</th>
            <td>{{$employeeAttendance->time_in}}</td>
        </tr>

        <tr>
            <th>Time Out</th>
            <td>{{$employeeAttendance->time_out}}</td>
        </tr>

    </table>
</x-modal.content>
