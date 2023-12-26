<x-modal.content title="View Incident Report">
    <table class="table table-borderless">
        <tr>
            <th>Incident No.</th>
            <td>{{$incidentReport->incident_no}}</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{$incidentReport->date}}</td>
        </tr>
        <tr>
            <th>Noticed By</th>
            <td>{{$incidentReport->noticed_by}}</td>
        </tr>
        <tr>
            <th>Department</th>
            <td>{{$incidentReport->department->name ?? ''}}</td>
        </tr>
        <tr>
            <th>what happend?</th>
            <td>{{$incidentReport->title}}</td>
        </tr>
        <tr>
            <th>Incident Time</th>
            <td>{{$incidentReport->incident_time}}</td>
        </tr>
        <tr>
            <th>Incident Location</th>
            <td>{{$incidentReport->incident_location}}</td>
        </tr>
        <tr>
            <th>People Involved</th>
            <td>{{$incidentReport->people_involved}}</td>
        </tr>
        <tr>
            <th>Cause</th>
        </tr>
        <tr>
            <td>{{$incidentReport->cause}}</td>
        </tr>
        <tr>
            <th>Description</th>
        </tr>
        <tr>
            <td>{{$incidentReport->description}}</td>
        </tr>
    </table>
</x-modal.content>
