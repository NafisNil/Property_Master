<a href="{{route('mark-appeals.show', $row->id)}}" class="btn btn-info">{{__('view')}}</a>
<a href="{{route('mark-appeals.edit', $row->id)}}" class="btn btn-primary">{{__('edit')}}</a>
<button class="btn btn-danger delete-item-btn" data-href="{{route('mark-appeals.destroy', $row->id)}}">{{__('delete')}}</button>
