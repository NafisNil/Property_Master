<button class='btn btn-info view-btn' data-href="{{route('time-sheets.show', $row->id)}}">View</button>
<a href="{{route('time-sheets.edit', $row->id)}}" class='btn btn-primary'>Edit</a>
<button data-href="{{route('time-sheets.destroy', $row->id)}}" class='btn btn-danger delete-job-order-btn'>Delete</button>
