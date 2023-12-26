<x-modal.content title="View Details">
    <table class="table table-bordered">
        <tr>
            <th>Date</th>
            <td>{{$keyLog->date}}</td>
        </tr>

        <tr>
            <th>Key Name</th>
            <td>{{$keyLog->name}}</td>
        </tr>
        <tr>
            <th>Key No.</th>
            <td>{{$keyLog->key_no}}</td>
        </tr>
        <tr>
            <th>Purpose</th>
            <td>{{$keyLog->purpose}}</td>
        </tr>
       <tr>
           <th>Stuff Name</th>
           <td>{{$keyLog->stuff_name}}</td>
       </tr>
        <tr>
            <th>Time In</th>
            <td>{{$keyLog->time_in}}</td>
        </tr>
        <tr>
            <th>Returned Time</th>
            <td>{{$keyLog->returned_time}}</td>
        </tr>

    </table>
</x-modal.content>
