<tr>
    <input type="hidden" name="index" value="{{$index}}" />
    <td>
        <x-form.input
            name="{{'budgets['. $index. '][description]'}}"
            value="{{$item->description ?? ''}}"
        >
        </x-form.input>
    </td>
    <td>
        <x-form.select
            name="{{'budgets['. $index. '][type]'}}"
            :options="$budgetTypes"
            value="{{$item->type ?? ''}}"
            />
    </td>
    <td>
        <x-form.input
            name="{{'budgets['. $index . '][amount_before_tax]'}}"
            class="amount-before-tax"
            value="{{$item->amount_before_tax ?? ''}}"
        />
    </td>
    <td>
        <x-form.input
            name="{{'budgets['. $index. '][tax_amount]'}}"
            class="tax-amount"
            value="{{$item->tax_amount ?? ''}}"
        />
    </td>
    <td>
        <x-form.input
            name="{{'budgets['. $index. '][amount_after_tax]'}}"
            class="amount-after-tax"
            readonly="true"
            value="{{$item->amount_after_tax ?? ''}}"
        />
    </td>
</tr>
