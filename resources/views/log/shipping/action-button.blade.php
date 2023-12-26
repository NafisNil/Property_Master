<a href="{{route("shipping-logs.edit",$row->id)}}"
class="btn btn-primary"
>{{__('edit')}}</a>
<button class="btn btn-danger delete-item-btn" data-href="{{route('shipping-logs.destroy', $row->id)}}">{{__('delete')}}</button>
