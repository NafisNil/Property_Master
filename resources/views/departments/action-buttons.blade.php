<a href="#" class="btn btn-info view-item-btn">View</a>
<a
    href="{{route('Departments.edit', $department->unique_id)}}" class="btn btn-primary">Edit</a>
<a
    href="{{route('Departments.destroy', $department->id)}}" class="btn btn-danger delete-item-btn"
    >Delete</a>
