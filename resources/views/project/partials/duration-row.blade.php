<tr>
    <input type="hidden" name="index" value="{{$index}}" />
    <td>
        <x-form.input
            name="{{'durations['. $index. '][description]'}}"
            value="{{$item->description ?? ''}}"
        >
        </x-form.input>
    </td>
    <td>
        <x-form.input
            name="{{'durations['. $index . '][start_date]'}}"
            type="datetime-local"
            value="{{$item->start_date ?? ''}}"
        />t
    </td>
    <td>
        <x-form.input
            name="{{'durations['. $index. '][end_date]'}}"
            type="datetime-local"
            value="{{$item->end_date ?? ''}}"
        />
    </td>
    <td>
        <x-form.input
            name="{{'durations['. $index. '][comment]'}}"
            value="{{$item->comment ?? ''}}"
        />
    </td>
</tr>
