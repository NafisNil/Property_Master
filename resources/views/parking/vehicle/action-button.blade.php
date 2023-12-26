<a href="{{route("vehicles.edit", $row->id)}}" class="btn btn-primary btn-sm">{{__('edit')}}</a>
<button class="btn btn-danger btn-sm delete-item-btn" data-href="{{route("vehicles.destroy", $row->id)}}">{{__('delete')}}</button>
