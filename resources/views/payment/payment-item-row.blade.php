<tr>

    <input type="hidden" name="index" value="{{$index}}"/>
    <input type="hidden" name="{{'items['. $index. '][id]'}}" value="{{$item->id}}"/>
    <td>
        {{$item->invoice_no}}
    </td>
    <td>{{$item->date}}</td>
    <td>
        {!! Form::text('items['. $index. '][amount]', $item->amount, ['class' => 'form-control item-amount']) !!}
    </td>
    <td>
        {!! Form::text('items['. $index .'][total_paid]', $totalPaid, ['class' => 'form-control item-paid', 'readonly' => true]) !!}
    </td>
    <td>
        {!! Form::text('items['. $index .'][total_due]', $item->amount - $totalPaid, ['class' => 'form-control item-due', 'readonly' => true]) !!}
    </td>
</tr>
