<button class='btn btn-info view-btn' data-href="{{route('incident-reports.show', $row->id)}}">View</button>
<a href="{{route('incident-reports.edit', $row->id)}}" class='btn btn-primary'>Edit</a>
<button data-href="{{route('incident-reports.destroy', $row->id)}}" class='btn btn-danger delete-job-order-btn'>Delete</button>
