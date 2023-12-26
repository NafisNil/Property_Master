<tr>
    <td>
        <x-form.select
            name="{{'recipients['. $index. '][department_id]'}}"
            :options="$departments"
            value="{{$recipient->department_id ?? ''}}"
        />
    </td>

    <td>
        <x-form.input
            name="{{'recipients['. $index . '][section]'}}"
            value="{{$recipient->section ?? ''}}"
        />
    </td>

    <td>
        <x-form.input
            name="{{'recipients['. $index.  '][position]'}}"
            value="{{$recipient->position ?? ''}}"
        />
    </td>

    <td>
        <x-form.select
            name="{{'recipients['. $index. '][user_id]'}}"
            :options="$users"
            value="{{$recipient->user_id ?? ''}}"
        />
    </td>
</tr>
