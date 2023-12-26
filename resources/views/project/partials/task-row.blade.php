<tr>
    <input type="hidden" name="index" value="{{$index}}" />
    <td>
        <x-form.input
            name="{{'tasks['. $index. '][name]'}}"
            value="{{$item->task_name ?? ''}}"
        >
        </x-form.input>
    </td>
    <td>
        <x-form.input
            name="{{'tasks['. $index . '][start_date]'}}"
            type="datetime-local"
            value="{{$item->start_date ?? ''}}"
        />
    </td>
    <td>
        <x-form.input
            name="{{'tasks['. $index. '][end_date]'}}"
            type="datetime-local"
            value="{{$item->end_date ?? ''}}"
        />
    </td>
    <td>
        <x-form.input
            name="{{'tasks['. $index. '][status]'}}"
            value="{{$item->status ?? ''}}"
        />
    </td>
    <td>
        <x-form.input
            name="{{'tasks['. $index. '][comment]'}}"
            value="{{$item->comment ?? ''}}"
        />
    </td>
</tr>
