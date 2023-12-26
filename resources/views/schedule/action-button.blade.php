<a href="{{route("schedules.show", $row->id)}}" class="btn btn-primary">{{__('view')}}</a>
<a href="{{route("schedules.edit",$row->id)}}" class="btn btn-primary">{{__('edit')}}</a>
<button class="btn btn-danger delete-item-btn" data-href="{{route('schedules.destroy', $row->id)}}">{{__('delete')}}</button>
