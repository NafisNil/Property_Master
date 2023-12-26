@props(['isActive' => false])
<div class="tab-content {{$isActive ? 'active': ''}}">
    {{$slot}}
</div>
