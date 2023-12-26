<a href="{{route("DailyReport.edit", $row->id)}}" class="btn btn-primary">{{__('edit')}}</a>
<button class="btn btn-danger delete-item-btn" data-href="{{route('DailyReport.destroy', $row->id)}}">{{__('delete')}}</button>
