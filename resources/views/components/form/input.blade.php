<div class="form-group mb-3">
    @if(!empty($label))
        <label for="{{ $id ?? $name}}" @class(["$labelClass font-bold"])>{{__($label)}}
            @if(!empty($required))
                <span class="text-danger ml-1">*</span>
            @endif
        </label>
    @endif
    <input id="{{$id ?? $name}}" name="{{$name}}"
           placeholder="{{$placeholder ? __($placeholder):  __($label)}}"
           @class(["$class form-control"]) {{$attributes}}
           value="{{old($name) ?? ($value != null ? $value : '')}}"
           @if(!empty($required))
               required="required"
        @endif
    >
</div>
