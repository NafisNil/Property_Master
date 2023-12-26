<x-modal.content title="View-details">
    <div>
        <table class="table table-bordered">
            <tr>
                <th>{{__('name')}}</th>
                <td>{{$department->name}}</td>
            </tr>
            <tr>
                <th>{{__('type')}}</th>
                <td>{{$department->type}}</td>
            </tr>
            <tr>
                <th>{{'head'}}</th>
                <td>{{$department->head}}</td>
            </tr>
            <tr>
                <th>{{__('campus')}}</th>
                <td>{{$department->campus->name ?? ''}}</td>
            </tr>
            <tr>
                <th>{{__('phone')}}</th>
                <td>{{$department->phone}}</td>
            </tr>
            <tr>
                <th>{{__('email')}}</th>
                <td>{{$department->email}}</td>
            </tr>
            <tr>
                <th>{{__('operation-hour')}}</th>
                <td>{{$department->operation_hour}}</td>
            </tr>
        </table>
    </div>
</x-modal.content>
