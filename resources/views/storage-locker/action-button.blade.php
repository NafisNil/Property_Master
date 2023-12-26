<a href="{{route('storage-lockers.edit', $row->id)}}"
   class="btn btn-primary"
>Edit</a>
<button class="btn btn-danger delete-item-btn" data-href="{{route("storage-lockers.destroy", $row->id)}}">Delete</button>
