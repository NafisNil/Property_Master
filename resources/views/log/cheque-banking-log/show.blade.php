<x-modal.content title="View Details">
    <table class="table table-bordered">
        <tr>
            <th>Date</th>
            <td>{{$chequeAndBankingLog->date}}</td>
        </tr>

        <tr>
            <th>Tracking No</th>
            <td>{{$chequeAndBankingLog->tracking_no}}</td>
        </tr>
        <tr>
            <th>Type</th>
            <td>{{$chequeAndBankingLog->type}}</td>
        </tr>
        <tr>
            <th>Sender</th>
            <td>{{$chequeAndBankingLog->sender}}</td>
        </tr>
        <tr>
            <th>Recipient</th>
            <td>{{$chequeAndBankingLog->recipient}}</td>
        </tr>
        <tr>
            <th>Employee Name</th>
            <td>{{$chequeAndBankingLog->employee_name}}</td>
        </tr>
        <tr>
            <th>Mail Received Date</th>
            <td>{{$chequeAndBankingLog->date_received}}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{$chequeAndBankingLog->description}}</td>
        </tr>

        <tr>
            <th>Carrier Company</th>
            <td>{{$chequeAndBankingLog->carrier_company}}</td>
        </tr>

    </table>
</x-modal.content>
