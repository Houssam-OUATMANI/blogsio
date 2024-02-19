@php
    $type ??= "text";
    $name ??= "";
    $label ??= "";
    $value ??= "";

@endphp

<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <input
           class="form-control @error($name) is-invalid @enderror "
           type="{{$type}}"
           name="{{$name}}"
           id="{{$name}}"
           value="{{$value}}"
    >
</div>

@error($name)
    <div class="alert alert-danger">
        {{$message}}
    </div>
@enderror
