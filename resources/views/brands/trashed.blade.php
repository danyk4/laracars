<x-layout.main title="Cars In Trash">

    <a href="{{ route('cars.index') }}">Go to Cars</a>
    <hr>
    <div class="row">
        @foreach($cars as $car)
            <div class="col m-3">
                <a href="{{ route('cars.show', [$car->id]) }}">{{ $car->brand }} {{ $car->model }}</a>
                <x-form method="PATCH" :action="route('cars.restore', [$car->id])">
                    <button class="btn btn-success">Restore</button>
                </x-form>
            </div>
        @endforeach
    </div>

</x-layout.main>
