@php
    $type ??= "text";
    $name ??= "";
    $label ??= "";

@endphp

<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <input
           class="form-control"
           type="{{$type}}"
           name="{{$name}}"
           id="{{$name}}">
</div>
