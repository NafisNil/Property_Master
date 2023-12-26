<tr>
    <input type="hidden" name="index" value="{{$index}}"/>
    <td>
        <x-form.input
            name="{{'payments['. $index. '][payment_no]'}}"
            value="{{$item->payment_no ?? ''}}"
        >
        </x-form.input>
    </td>
    <td>
        <x-form.input
            name="{{'payments['. $index . '][due_date]'}}"
            type="datetime-local"
            value="{{$item->due_date ?? ''}}"
        />
    </td>
    <td>
        <x-form.input
            name="{{'payments['. $index. '][amount]'}}"
            value="{{$item->amount ?? ''}}"
        />
    </td>
    <td>
        <x-form.input
            name="{{'payments['. $index. '][balance]'}}"
            value="{{$item->balance ?? ''}}"
        />
    </td>
    <td>
        <x-form.input
            name="{{'payments['. $index. '][status]'}}"
            value="{{$item->status ?? ''}}"
        />
    </td>
</tr>
