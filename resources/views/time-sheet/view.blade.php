<x-modal.content title="View Incident Report">
    <table class="table table-borderless">
        <tr>
            <th>Time Sheet No.</th>
            <td>{{$timeSheet->sheet_no}}</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{$timeSheet->date}}</td>
        </tr>
        <tr>
            <th>Employee</th>
            <td>{{$timeSheet->employee_name}}</td>
        </tr>
        <tr>
            <th>Department</th>
            <td>{{$timeSheet->department->name ?? ''}}</td>
        </tr>
        <tr>
            <th>Start Period</th>
            <td>{{$timeSheet->start_period}}</td>
        </tr>
        <tr>
            <th>End Period</th>
            <td>{{$timeSheet->end_period}}</td>
        </tr>
        <tr>
            <th>Pay Period</th>
            <td>{{$timeSheet->pay_period}}</td>
        </tr>
    </table>

    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Date</th>
                <th>Time In</th>
                <th>Time Out</th>
            </tr>
            </thead>
            <tbody>
            @foreach($timeSheet->items as $item)
                <tr>
                    <td>{{$item->date}}</td>
                    <td>{{$item->time_in}}</td>
                    <td>{{$item->time_out}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</x-modal.content>
