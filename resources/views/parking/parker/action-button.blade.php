<a href="{{route('parkers.edit', $row->id)}}"
   class="btn btn-primary"
>Edit</a>
<button class="btn btn-danger delete-item-btn" data-href="{{route("parkers.destroy", $row->id)}}">Delete</button>
