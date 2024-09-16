<x-layout.main :title="$brand->title">
    <a href="{{ route('brands.index') }}">Go to Brands</a>
    <h1>{{ $brand->title }}</h1>
    <div>
        {{ $brand->description }}
    </div>
    <div>
        <a href="/brands/{{ $brand->id }}/edit">Edit</a>
    </div>
    <hr>
    <ul>
        @foreach($brand->cars as $car)
            <li>{{ $car->model }} {{ $car->vin }}</li>
        @endforeach
    </ul>
</x-layout.main>
