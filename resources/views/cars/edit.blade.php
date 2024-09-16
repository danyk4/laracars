<x-layout.main title="Edit Car #{{ $car->id }}">
    <h2>Edit Car #{{ $car->id }}</h2>

    <div class="row">
        <x-form method="POST" action="{{ route('cars.update', [$car->id]) }}" class="col-md-6">
            @method('PATCH')
            @csrf
            <div class="mb-3 ">
                <x-label for="brand_id" class="form-label"/>
                <x-form.select name="brand_id" label="Brand" :options="$brands" :selected="$car->brand->id"/>
                @error('brand_id')
                <div class="text-danger fs-6">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3 ">
                <x-label for="model" class="form-label"/>
                <x-input name="model" class="form-control" value="{{ $car->model }}"/>
                <x-error field="model" class="text-danger fs-6"/>
            </div>

            <div class="mb-3 ">
                <x-label for="vin" class="form-label"/>
                <x-input name="vin" class="form-control" value="{{ $car->vin }}"/>
                <x-error field="vin" class="text-danger fs-6"/>
            </div>

            <div class="mb-3">
                <x-label for="transmission" class="form-label"/>
                <x-form.select name="transmission" label="Коробка передач" :options="$transmission" :selected="$car->transmission"/>
                @error('transmission')
                <div class="text-danger fs-6">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <x-label for="tags" class="form-label"/>
                {{--                <x-form.selectmulti name="tags[]" label="Tags" :options="$tags" multiple="" size="{{  $tags->count() }}" :selected="$defaultTags"/>--}}
                <select name="tags[]" label="Tags" multiple="" value="{{ $tags }}" size="{{ $tags->count() }}" class="form-control">
                    @foreach ($tags as $key => $tag)
                        @if(\Str::contains($defaultTags, $key))
                            <option value="{{ $key }}" selected>{{ $tag }}</option>
                        @else
                            <option value="{{ $key }}">{{ $tag }}</option>
                        @endif
                    @endforeach
                </select>
                @error('tags')
                <div class="text-danger fs-6">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="d-inline-flex gap-2">
                <a class="btn btn-secondary" href="/cars/{{ $car->id }}">Cancel</a>
                <button class="btn btn-primary" type="submit">Update</button>
                <button class="btn btn-danger" form="delete-form" type="submit">Delete</button>
            </div>
        </x-form>
    </div>

    <x-form method="POST" action="{{ route('cars.destroy', [$car->id]) }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </x-form>
</x-layout.main>
