<x-layout.main title="Add Brand">
    <div class="row">
        <x-form action="{{ route('brands.store') }}" class="col-md-6">
            <div class="mb-3 ">
                <x-label for="title" class="form-label"/>
                <x-input name="title" class="form-control"/>
                <x-error field="title" class="text-danger fs-6"/>
            </div>

            <div class="mb-3 ">
                <x-label for="description" class="form-label"/>
                <textarea name="description" class="form-control" rows="5"></textarea>
                <x-error field="description" class="text-danger fs-6"/>
            </div>

            <button class="btn btn-primary" type="submit">Add</button>
        </x-form>
    </div>
</x-layout.main>
