<div class="{{$class ?? 'col-sm-4'}}">
    <x-form.input
        name="{{isset($prefix) ? $prefix. '_country': 'country'}}"
        label="Country"
        value="{{$address->country ?? ''}}"
    />
</div>

<div class="{{$class ?? 'col-sm-4'}}">
    <x-form.input
        name="{{isset($prefix) ? $prefix. '_state' : 'state'}}"
        label="state"
        value="{{$address->state ?? ''}}"
    />
</div>

<div class="{{$class ?? 'col-sm-4'}}">
    <x-form.input
        name="{{isset($prefix) ? $prefix . '_city': 'city'}}"
        label="city"
        value="{{$address->city ?? ''}}"
    />
</div>

<div class="{{$class ?? 'col-sm-4'}}">
    <x-form.input
        name="{{isset($prefix) ? $prefix . '_street' : 'street'}}"
        label="street-no"
        value="{{$address->street ?? ''}}"
    />
</div>

<div class="{{$class ?? 'col-sm-4'}}">
    <x-form.input
        name="{{isset($prefix) ? $prefix. '_zip' : 'zip' }}"
        label="zip-code"
        value="{{$address->zip ?? ''}}"
    />
</div>

<div class="{{$class ?? 'col-sm-4'}}">
    <x-form.input
        name="{{isset($prefix) ? $prefix . '_address' : 'address'}}"
        label="address"
        value="{{$address->name ?? ''}}"
    />
</div>
