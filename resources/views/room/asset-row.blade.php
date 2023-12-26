<tr>
    <input type="hidden" name="index" value="{{$index}}"/>
    <input type="hidden" name="{{'assets['. $index. '][asset_id]'}}"
    value="{{$item->id}}"
    />
    <td>{{$item->asset_name}}</td>
    <td>
        <x-form.input
            name="{{'assets['. $index. '][location]'}}"
            value="{{$item->pivot->location ?? ''}}"
        />
    </td>
    <td>
        {{$item->serial_number}}
    </td>
</tr>
