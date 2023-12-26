@component('widget.bootstrap-view-modal', ['title' => 'View Service Provider'])
    <table class="table table-borderless">
        <tr>
            <th>Name:</th>
            <td>{{$serviceProvider->name}}</td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td>{{$serviceProvider->phone}}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{$serviceProvider->email}}</td>
        </tr>
        <tr>
            <th>Contact Person Name</th>
            <td>{{$serviceProvider->contact_person_name}}
            </td>
        </tr>
    </table>
@endcomponent
