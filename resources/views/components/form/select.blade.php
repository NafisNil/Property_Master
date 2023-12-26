@php
    if(empty($value)){
        $value = old($name);
    }
@endphp

<div class="form-group mb-3">

    @if (!empty($label))
        <label for="{{ $id ?? $name}}" class="font-bold">{{__($label)}}
            @if(!empty($required))
                <span class="text-danger ml-1">*</span>
            @endif
        </label>
    @endif

    @if(!is_array($options) && !is_iterable($options))
        <pre class="text-danger">Data Error</pre>
    @else

        <select class="{{$class}}" id="{{$id ?? $name}}" name="{{$name}}" {{$attributes}}
        @if(!empty($required))
            required="required"
            @endif
        >
            <option
                value="">{{ $placeholder ? '--'. __($placeholder). '--' : !empty($label) ? '--'. __($label). '--' : '--Select One--'}}</option>
            @foreach($options as $key=>$option)
                <option value="{{$key}}"
                        @if(gettype($value) == 'array' ? in_array($key, $value) : strval($key) == strval($value)) selected="selected" @endif>{{$option}}</option>
            @endforeach
        </select>
    @endif
</div>
