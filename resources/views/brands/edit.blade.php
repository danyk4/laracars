<x-layout.main title="Edit Brand #{{ $brand->id }}">
    <h2>Edit Brand #{{ $brand->id }}</h2>

    <div class="row">
        <x-form method="POST" action="{{ route('brands.update', [$brand->id]) }}" class="col-md-6">
            @method('PATCH')
            @csrf
            <div class="mb-3 ">
                <x-label for="title" class="form-label"/>
                <x-input name="title" class="form-control" value="{{ $brand->title }}"/>
                <x-error field="title" class="text-danger fs-6"/>
            </div>

            <div class="mb-3 ">
                <x-label for="description" class="form-label"/>
                <textarea name="description" class="form-control" rows="5">{{ $brand->description }}</textarea>
                <x-error field="description" class="text-danger fs-6"/>
            </div>

            <div class="d-inline-flex gap-2">
                <a class="btn btn-secondary" href="/brands/{{ $brand->id }}">Cancel</a>
                <button class="btn btn-primary" type="submit">Update</button>
                <button class="btn btn-danger" form="delete-form" type="submit">Delete</button>
            </div>
        </x-form>
    </div>

    <x-form method="POST" action="{{ route('brands.destroy', [$brand->id]) }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </x-form>
</x-layout.main>
