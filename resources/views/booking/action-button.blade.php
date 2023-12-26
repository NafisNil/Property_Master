<a href="{{route('bookings.show', $row->id)}}" class="btn btn-primary">{{__('view')}}</a>
<a href="{{route('bookings.edit', $row->id)}}" class="btn btn-primary">{{__('edit')}}</a>
<button class="btn btn-danger delete-item-btn" data-href="{{route('bookings.destroy', $row->id)}}">{{__('delete')}}</button>
