<x-modal.content title="View Detail" size="lg">
    <div>
        <table class="table table-bordered">
            <tr>
                <th>Category</th>
                <td>{{$feesAndCharge->category->name ?? ''}}</td>
            </tr>
            <tr>
                <th>Program</th>
                <td>{{$feesAndCharge->program->program_name ?? ''}}</td>
            </tr>
            <tr>
                <th>Grade Year</th>
                <td>{{$feesAndCharge->gradeYear->program_name ?? ''}}</td>
            </tr>
            <tr>
                <th>Fee For Domestic Student</th>
                <td>{{$feesAndCharge->fee_domestic ?? ''}}</td>
            </tr>
            <tr>
                <th>Fee For International Student</th>
                <td>{{$feesAndCharge->fee_international ?? ''}}</td>
            </tr>
            <tr>
                <th>Fee For Special Needs</th>
                <td>{{$feesAndCharge->fee_special_needs ?? ''}}</td>
            </tr>
            <tr>
                <th>Refundable</th>
                <td>{{$feesAndCharge->refundable ? 'Yes' : 'No'}}</td>
            </tr>
            <tr>
                <th>Comment</th>
                <td>{{$feesAndCharge->comment ?? ''}}</td>
            </tr>
        </table>
    </div>
</x-modal.content>
