<button class='btn btn-info view-btn' data-href="{{route('projects.show', $row->id)}}">View</button>
<a href="{{route('projects.edit', $row->id)}}" class='btn btn-primary'>Edit</a>
<button data-href="{{route('projects.destroy', $row->id)}}" class='btn btn-danger delete-item-btn'>Delete</button>
