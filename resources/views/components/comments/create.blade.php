@props([
    'id',
    'model'
])

<x-form action="{{ route('comments.store') }}" class="col-md-6">
    <div class="mb-3 ">
        <x-input name="id" type="hidden" class="form-control" value="{{ $id }}"/>
        <x-input name="model" type="hidden" class="form-control" value="{{ $model }}"/>
    </div>

    <div class="mb-3 ">
        <x-label for="text" class="form-label"/>
        <textarea name="text" class="form-control" rows="5"></textarea>
        <x-error field="text" class="text-danger fs-6"/>
    </div>

    <button class="btn btn-primary" type="submit">Add</button>
</x-form>

