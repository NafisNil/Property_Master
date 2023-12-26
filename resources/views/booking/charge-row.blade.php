<tr>
    <input type="hidden" name="index" value="{{$index}}">
    <td>
        <x-form.input
            name="{{'charges['. $index .'][title]'}}"
            value="{{$item->title}}"
        />
    </td>
    <td>
        <x-form.input
            name="{{'charges['. $index .'][amount]'}}"
            class="charge-amount"
            value="{{$item->amount}}"
        />
    </td>
    <td>
        <x-form.input
            name="{{'charges['. $index. '][discount]'}}"
            class="charge-discount"
            value="{{$item->discount}}"
        />
    </td>
    <td>
        <x-form.input
            name="{{'charges['. $index. '][net_amount]'}}"
            class="charge-net-payable"
            readonly="readonly"
            value="{{$item->net_amount}}"
        />
    </td>
    <td>
        <x-form.input
            name="{{'charges['. $index . '][comment]'}}"
            value="{{$item->comment}}"
        />
    </td>
    <td>
        <button class="btn btn-danger btn-sm remove-item-btn" type="button"
                disabled="disabled"
        >
            <i class="fa fa-trash"></i>
        </button>
    </td>
</tr>
