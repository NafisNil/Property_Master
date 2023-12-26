<a href="#"
   class="btn btn-info view-item-btn"
   data-href="{{ route('SchoolMessage.show', $row->id)  }}">View</a>
<a
    href="{{route('SchoolMessage.edit', $row->id)}}"
    class="btn btn-primary">Edit</a>
<a
    data-href="{{route('SchoolMessage.destroy', $row->id)}}"
    class="btn btn-danger delete-item-btn">Delete</a>
