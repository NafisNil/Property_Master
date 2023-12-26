<tr>
    <input type="hidden" name="index" value="{{$index ?? '0'}}" />
    <td>
        <x-form.input
            name="items[0][date]"
            type="datetime-local"
            value="{{$item->date ?? ''}}"
        />
    </td>
    <td>
        <x-form.input
            name="items[0][time_in]"
            type="datetime-local"
            value="{{$item->time_in ?? ''}}"
        />
    </td>
    <td>
        <x-form.input
            name="items[0][time_out]"
            type="datetime-local"
            value="{{$item->time_out ?? ''}}"
        />
    </td>
    <td>
        <button type="button" class="btn btn-danger btn-icon remove-item-btn">
            <i class="fa fa-trash"></i>
        </button>
    </td>
</tr>
