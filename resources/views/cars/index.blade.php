<x-layout.main title="Cars Catalog">

    <a href="{{ route('cars.create') }}">Add Car</a>
    <hr>
    <div class="row">
        @foreach($cars as $car)
            <div class="col m-3">
                <a href="{{ route('cars.show', [$car->id]) }}">{{ $car->brand }} {{ $car->model }}</a>
                <a href="{{ route('cars.edit', [$car->id]) }}">Edit</a>
            </div>
        @endforeach
    </div>

</x-layout.main>
