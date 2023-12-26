@props(['isActive' => false])
<li class="tab-link {{$isActive ? 'active' : ''}}">
    {{$slot}}
</li>
