@if(isset($label)) <label for="{{ $name }}" @if(isset($labelStyle)) style="{{ $labelStyle }}" @endif>{{ $label }}</label> @endif
<input
    type="{{ $type }}"
    name="{{ $name }}"
    @if(isset($style)) style="{{ $style }}" @endif
    @error($name) style="border-color: red" @enderror
    id="{{ $name }}"
    placeholder="{{ $placeholder }}"
    value="{{ $value == '' ? old($name) : $value }}"
>

@error($name)
    <small id="helpId" style="color: red; display: block">{{ $message }}</small>
@enderror
