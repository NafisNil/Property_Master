<x-modal.content title="View Details">

    <table class="table table-bordered">
        <tr>
            <th>{{__('memo-no')}}</th>
            <td>{{$memo->memo_no}}</td>
        </tr>
        <tr>
            <th>{{__('date-and-time')}}</th>
            <td>{{$memo->date}}</td>
        </tr>
        <tr>
            <th>{{__('priority-level')}}</th>
            <td>{{$memo->priority_level}}</td>
        </tr>
    </table>

    <div>
        <h4>From</h4>
    </div>

    <div>
        <table class="table table-bordered">
            <tr>
                <th>{{__('department')}}</th>
                <td>{{$memo->from->department->name ?? ''}}</td>
            </tr>
            <tr>
                <th>{{__('section')}}</th>
                <td>{{$memo->from->section ?? ''}}</td>
            </tr>
            <tr>
                <th>{{__('position')}}</th>
                <td>{{$memo->from->position ?? ''}}</td>
            </tr>
            <tr>
                <th>{{__('user')}}</th>
                <td>{{$memo->from->user->full_name ?? ''}}</td>
            </tr>
        </table>
    </div>

    <div>
        <h4>To</h4>
    </div>

    <div>
        <table class="table table-bordered">
            <tr>
                <th>{{__('department')}}</th>
                <td>{{$memo->to->department->name ?? ''}}</td>
            </tr>
            <tr>
                <th>{{__('section')}}</th>
                <td>{{$memo->to->section ?? ''}}</td>
            </tr>
            <tr>
                <th>{{__('position')}}</th>
                <td>{{$memo->to->position ?? ''}}</td>
            </tr>
            <tr>
                <th>{{__('user')}}</th>
                <td>{{$memo->to->user->full_name ?? ''}}</td>
            </tr>
        </table>
    </div>

    <div>
        <h4>CC</h4>
    </div>

    <div>
        <table class="table table-bordered">
            <tr>
                <th>{{__('department')}}</th>
                <td>{{$memo->cc->department->name ?? ''}}</td>
            </tr>
            <tr>
                <th>{{__('section')}}</th>
                <td>{{$memo->cc->section ?? ''}}</td>
            </tr>
            <tr>
                <th>{{__('position')}}</th>
                <td>{{$memo->cc->position ?? ''}}</td>
            </tr>
            <tr>
                <th>{{__('user')}}</th>
                <td>{{$memo->cc->user->full_name ?? ''}}</td>
            </tr>
        </table>
    </div>

    <div class="col-12">
        <table class="table table-bordered">
            <tr>
                <th>{{__('subject')}}</th>
                <td>{{$memo->subject}}</td>
            </tr>
            <tr>
                <th>{{__('message')}}</th>
                <td>{{$memo->message}}</td>
            </tr>
            <tr>
                <th>{{__('action-date')}}</th>
                <td>{{$memo->action_date}}</td>
            </tr>
        </table>
    </div>

</x-modal.content>

