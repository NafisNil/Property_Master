<a href="{{route("templates.show", $row->id)}}" class="btn btn-primary">{{__('view')}}</a>
<a href="{{route('templates.edit', $row->id)}}" class="btn btn-info">{{__('edit')}}</a>
<button data-href="{{route("templates.destroy",$row->id)}}" class="btn btn-primary delete-item-btn">{{__('delete')}}</button>
