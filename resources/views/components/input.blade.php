@props([
  'label',
  'name',
])

<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <input name="{{ $name }}" type="text">
</div>
@error('{{ $name }}')
<div style="color:red;">{{ $message }}</div>
@enderror

