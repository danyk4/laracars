<x-layout.main title="Add Car">
    <div class="row">
        <x-form action="{{ route('cars.store') }}" class="col-md-6">
            <div class="mb-3 ">
                <x-label for="brand" class="form-label"/>
                <x-input name="brand" class="form-control"/>
                <x-error field="brand" class="text-danger fs-6"/>
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

            <button class="btn btn-primary" type="submit">Add</button>
        </x-form>
    </div>
</x-layout.main>
