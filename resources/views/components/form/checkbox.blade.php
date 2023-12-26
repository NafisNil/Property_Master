<div>
    <label for="{{ $id ?: $name }}">
        <input type="hidden" name="{{ $name }}" value="0">
        <input type="checkbox" id="{{ $id ?: $name }}" name="{{ $name }}"
               value="{{ $value }}" {{ $isChecked ? 'checked' : '' }}>
        {{ __($label) }}</label>
</div>
