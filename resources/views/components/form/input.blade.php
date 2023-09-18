@if(isset($label)) <label for="{{ $name }}" class="form-label">{{ $label }}</label> @endif
<input
    type="{{ $type }}"
    name="{{ $name }}"
    @error($name) style="border-color: red" @enderror
    id="{{ $name }}"
    placeholder="{{ $placeholder }}"
    value="{{ $value == '' ? old($name) : $value }}"
>

@error($name)
    <small id="helpId" style="color: red">{{ $message }}</small>
@enderror
