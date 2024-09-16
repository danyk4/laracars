<x-layout.main title="Add Car">
    <div class="row">
        <x-form action="{{ route('cars.store') }}" class="col-md-6">
            <div class="mb-3 ">
                <x-label for="brand_id" class="form-label"/>
                <x-form.select name="brand_id" label="Brand" :options="$brands"/>
                @error('brand_id')
                <div class="text-danger fs-6">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3 ">
                <x-label for="model" class="form-label"/>
                <x-input name="model" class="form-control"/>
                <x-error field="model" class="text-danger fs-6"/>
            </div>

            <div class="mb-3 ">
                <x-label for="vin" class="form-label"/>
                <x-input name="vin" class="form-control"/>
                <x-error field="vin" class="text-danger fs-6"/>
            </div>

            <div class="mb-3">
                <x-label for="transmission" class="form-label"/>
                <x-form.select name="transmission" label="Коробка передач" :options="$transmission"/>
                @error('transmission')
                <div class="text-danger fs-6">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                {{--                @foreach($cars->tags as $tag)--}}
                {{--                <x-checkbox name="tags" class="form-label"/>--}}
                <x-label for="tags" class="form-label"/>
                <x-form.select name="tags[]" label="Tags" :options="$tags" multiple="" size="{{  $tags->count() }}"/>
                @error('tags')
                <div class="text-danger fs-6">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Add</button>
        </x-form>
    </div>
</x-layout.main>
