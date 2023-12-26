<?php
$options = [1 => __('active'), 0 => __('inactive')];
?>

<div class="form-group">
    <x-form.select
        name="status" label="{{__('status')}}"
        :options="$options" :value="$value ?? 1"
        :required="true"
        data-rules="required"
    />
</div>
