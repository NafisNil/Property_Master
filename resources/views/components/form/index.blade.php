@props(['method' => 'POST', 'action', 'class' => '', 'files', 'novalidate' => false])
<form method="POST" action="{{$action}}"
      enctype='multipart/form-data'
      class="{{$class}}"
      @if($novalidate) novalidate="novalidate" @endif
>
    @csrf
    @method($method)
    {{$slot}}
</form>
