<x-modal.content title="View Incident Report">
    <table class="table table-borderless">
        <tr>
            <th>Project No.</th>
            <td>{{$project->project_no}}</td>
        </tr>
        <tr>
            <th>Project Name</th>
            <td>{{$project->name}}</td>
        </tr>
        <tr>
            <th>Current Status</th>
            <td>{{$project->status}}</td>
        </tr>
    </table>

    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Date</th>
                <th>Start Date</th>
                <th>End Date
                <th>Comment</th>
            </tr>
            </thead>
            <tbody>
            @foreach($project->durations as $item)
                <tr>
                    <td>{{$item->description}}</td>
                    <td>{{$item->start_date}}</td>
                    <td>{{$item->end_date}}</td>
                    <td>{{$item->comment}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</x-modal.content>
