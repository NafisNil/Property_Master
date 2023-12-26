<x-modal.content title="view details">
    <div>
        <table class="table table-bordered list-table">
            <tr>
                <th>{{__('message-no')}}</th>
                <td>{{$message->message_no}}</td>
            </tr>
            <tr>
                <th>{{__('message-date')}}</th>
                <td>{{$message->message_date}}</td>
            </tr>
            <tr>
                <th>{{__('from-user-type')}}</th>
                <td>{{$message->fromUserType->name ??  ''}}</td>
            </tr>
            <tr>
                <th>{{__('from-user')}}</th>
                <td>{{$message->fromUser->full_name ?? ''}}</td>
            </tr>
            <tr>
                <th>{{__('to-user-type')}}</th>
                <td>{{$message->toUserType->name ??  ''}}</td>
            </tr>
            <tr>
                <th>{{__('to-user')}}</th>
                <td>{{$message->toUser->full_name ?? ''}}</td>
            </tr>
            <tr>
                <th>{{__('cc-user-type')}}</th>
                <td>{{$message->ccUserType->name ??  ''}}</td>
            </tr>
            <tr>
                <th>{{__('cc-user')}}</th>
                <td>{{$message->ccUser->full_name ?? ''}}</td>
            </tr>
            <tr>
                <th>{{__('priority-level')}}</th>
                <td>{{$message->priority_level}}</td>
            </tr>
            <tr>
                <th>{{__('subject')}}</th>
                <td>{{$message->subject}}</td>
            </tr>
            <tr>
                <th>{{__('re')}}</th>
                <td>{{$message->re}}</td>
            </tr>
            <tr>
                <th>{{__('message')}}</th>
                <td>{{$message->message}}</td>
            </tr>
        </table>
    </div>
</x-modal.content>
