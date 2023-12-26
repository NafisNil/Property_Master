<button class="btn btn-info view-item-btn" data-href="{{route('employee-attendance-logs.show',$row->id)}}">View</button>
<a href="{{route('employee-attendance-logs.edit', $row->id)}}" class="btn btn-primary">Edit</a>
<button class="btn btn-danger delete-item-btn" data-href="{{route('employee-attendance-logs.destroy', $row->id)}}">Delete</button>
