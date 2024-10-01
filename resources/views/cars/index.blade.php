<x-layout.main title="Cars Catalog">

    <a href="{{ route('cars.create') }}">Add Car</a>
    <a href="{{ route('cars.trashed') }}">Cars in Trash</a>
    <hr>
    <div class="row">
        @foreach($cars as $car)
            <div class="col-3 m-3">
                <em>{{ $car->brand->country->title }}</em>
                <a class="d-block" href="{{ route('cars.show', [$car->id]) }}">{{ $car->brand->title }} {{ $car->model }}</a>
                <div>Vin: {{ $car->vin }}</div>
                <div>Tags:
                    @foreach($car->tags as $tag)
                        <span class="btn btn-danger btn-sm me-1 mb-1"> {{ $tag->title }}</span>
                    @endforeach
                </div>
                <div>{{ $car->status->text() }}</div>
                <a class="d-block" href="{{ route('cars.edit', [$car->id]) }}">Edit</a>
            </div>
        @endforeach
    </div>

</x-layout.main>
