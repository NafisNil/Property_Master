<a href="{{route('parking-lots.edit',$row->id)}}" class="btn btn-primary">Edit</a>
<button class="btn btn-danger delete-item-btn" data-href="{{route("parking-lots.destroy", $row->id)}}">Delete</button>
