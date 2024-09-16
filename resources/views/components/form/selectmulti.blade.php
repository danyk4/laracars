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
        <option value="{{ $key }}" @selected(old($name) == $key) @if(in_array(array_values($selected), $key)) selected @endif>{{ $val }}</option>
    @endforeach
    @error("{{ $name }}")
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</select>
@foreach ($defaultTags as $key => $tag)
    <option value="{{ $tag }}" {{ (old("tags") == $tag ? "selected":"") }}>{{ $tag }}</option>
@endforeach
