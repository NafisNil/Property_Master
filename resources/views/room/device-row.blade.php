<tr>
    <input type="hidden" name="index" value="{{$index}}"/>
    <input type="hidden" name="{{'devices['. $index. '][asset_id]'}}"
    value="{{$item->id}}"
    />
    <td>{{$item->asset_name}}</td>
    <td>
        <x-form.input
            name="{{'devices['. $index. '][location]'}}"
            value="{{$item->pivot->location ?? ''}}"
        />
    </td>
    <td>
        {{$item->serial_number}}
    </td>
</tr>
