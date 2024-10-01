<x-layout.guest title="Cars Catalog">
    <div class="row">
        @foreach($cars as $car)
            <div class="col-3 m-3">
                <em>{{ $car->brand->country->title }}</em>
                <a class="d-block" href="{{ route('catalog.show', [$car->id]) }}">{{ $car->brand->title }} {{ $car->model }}</a>
                <div>Vin: {{ $car->vin }}</div>
                @if($car->tags->isNotEmpty())
                    <div>Tags:
                        @foreach($car->tags as $tag)
                            <span class="btn btn-danger btn-sm me-1 mb-1"> {{ $tag->title }}</span>
                        @endforeach
                    </div>
                @endif
                @auth
                    <div>{{ $car->status->text() }}</div>
                    <a class="d-block" href="{{ route('cars.edit', [$car->id]) }}">Edit</a>
                @endif
            </div>
        @endforeach
    </div>

</x-layout.guest>
