<x-layout.guest :title="$car->brand->title . ' ' . $car->model">
    <a href="{{ route('home.public') }}">Go to Cars</a>
    <h1>{{ $car->brand->title }} {{ $car->model }}</h1>
    <div>
        Brand: {{ $car->brand->title }}
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
    <div>Tags:
        @foreach($car->tags as $tag)
            <span class="btn btn-danger btn-sm me-1 mb-1"> {{ $tag->title }}</span>
        @endforeach
    </div>
    <div>{{ $car->status->text() }}</div>
    <x-comments.create :id="$car->id" model="car"/>

    <x-comments.viewer :model="$car"/>

    {{--    <div>--}}
    {{--        <a href="/cars/{{ $car->id }}/edit">Edit</a>--}}
    {{--    </div>--}}
</x-layout.guest>
