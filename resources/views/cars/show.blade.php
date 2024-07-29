<x-layout.main :title="$car->brand . ' ' . $car->model">
    <h1>{{ $car->brand }} {{ $car->model }}</h1>
    <div>
        Brand: {{ $car->brand }}
    </div>
    <div>
        Model: {{ $car->model }}
    </div>
    <div>
        Vin: {{ $car->vin }}
    </div>
    <div>
        Transmission: {{ Config::get('app-cars.transmission.' . $car->transmission) }}
    </div>
    <div>
        <a href="/cars/{{ $car->id }}/edit">Edit</a>
    </div>
</x-layout.main>
