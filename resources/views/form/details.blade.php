<x-modal.content title="View Details">

    <table class="table table-bordered">
        <tr>
            <th>{{__('form-no')}}</th>
            <td>{{$form->form_no}}</td>
        </tr>
        <tr>
            <th>{{__('form-type')}}</th>
            <td>{{$form->type->form_name}}</td>
        </tr>
        <tr>
            <th>{{__('date-and-time')}}</th>
            <td>{{$form->date}}</td>
        </tr>
        <tr>
            <th>{{__('priority-level')}}</th>
            <td>{{$form->priority_level}}</td>
        </tr>
        <tr>
            <th>{{__('to-user')}}</th>
            <td>{{$form->toUser->full_name ?? ''}}</td>
        </tr>
        <tr>
            <th>{{__('from-user')}}</th>
            <td>{{$form->fromUser->full_name ?? ''}}</td>
        </tr>
        <tr>
            <th>{{__('subject')}}</th>
            <td>{{$form->subject}}</td>
        </tr>
        <tr>
            <th>{{__('message')}}</th>
            <td>{{$form->message}}</td>
        </tr>
    </table>

</x-modal.content>

