<tr>
    <input type="hidden" name="index" value="{{$index}}"/>
    <td>
        <x-form.input
            name="participants[0][name]"
            value="{{$item->name ?? ''}}"
        />
    </td>
    <td>
        <x-form.input
            name="participants[0][type]"
            value="{{$item->type ?? ''}}"
        />
    </td>
</tr>
