<button class="btn btn-info view-item-btn" data-href="{{route('cheque-banking-logs.show',$row->id)}}">View</button>
<a href="{{route('cheque-banking-logs.edit', $row->id)}}" class="btn btn-primary">Edit</a>
<button class="btn btn-danger delete-item-btn" data-href="{{route('cheque-banking-logs.destroy', $row->id)}}">Delete</button>
