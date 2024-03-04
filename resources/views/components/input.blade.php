@php
    $type ??= "text";
    $name ??= "";
    $label ??= "";
    $value ??= "";

@endphp

<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    @if($type === "textarea")
        <textarea class="form-control" name="{{$name}}" id="{{$name}}">{{$value}}</textarea>
    @else
        <input
            class="form-control @error($name) is-invalid @enderror "
            type="{{$type}}"
            name="{{$name}}"
            id="{{$name}}"
            value="{{$value}}"
        >
    @endif


</div>

@error($name)
    <div class="alert alert-danger">
        {{$message}}
    </div>
@enderror
