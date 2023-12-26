<?php

$fields = ['name', 'office', 'phone', 'mobile', 'email', 'website', 'fax'];

if (isset($except)) {
    $fields = \Illuminate\Support\Arr::$except($fields, $except);
}

?>


<div class="{{$class ?? 'col-sm-4'}}">
    <x-form.input
        name="{{isset($prefix) ? $prefix. '_name': 'name'}}"
        label="name"
        value="{{$contact->name ?? ''}}"
    />
</div>

<div class="{{$class ?? 'col-sm-4'}}">
    <x-form.input
        name="{{isset($prefix) ? $prefix. '_office': 'office'}}"
        label="phone-office"
        value="{{$contact->office ?? ''}}"
    />
</div>

<div class="{{$class ?? 'col-sm-4'}}">
    <x-form.input
        name="{{isset($prefix) ? $prefix . '_phone' : 'phone'}}"
        label="phone"
        value="{{$contact->phone ?? ''}}"
    />
</div>

<div class="{{$class ?? 'col-sm-4'}}">
    <x-form.input
        name="{{isset($prefix) ? $prefix . '_mobile' : 'mobile'}}"
        label="mobile"
        value="{{$contact->mobile ?? ''}}"
    />
</div>

<div class="{{$class ?? 'col-sm-4'}}">
    <x-form.input
        name="{{isset($prefix) ? $prefix. '_email': 'email'}}"
        label="email"
        value="{{$contact->email ?? ''}}"
    />
</div>

<div class="{{$class ?? 'col-sm-4'}}">
    <x-form.input
        name="{{isset($prefix) ? $prefix. '_website' : 'website'}}"
        label="website"
        value="{{$contact->website ?? ''}}"
    />
</div>
