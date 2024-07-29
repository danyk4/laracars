@props([
  'options' => [],
  'name' => '',
  'selected' => null
  ])
<select name="{{ $name }}" {{ $attributes }} class="form-select">
    {{--    @if(!old($name))--}}
    {{--        <option selected disabled>Choose...</option>--}}
    {{--    @endif--}}
    @foreach($options as $key => $val)
        <option value="{{ $key }}" @selected(old($name) == $key) @if($key == $selected) selected @endif>{{ $val }}</option>
    @endforeach
    @error("{{ $name }}")
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</select>
