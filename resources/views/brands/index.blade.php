<x-layout.main title="Brands">

    <a href="{{ route('brands.create') }}">Add Brand</a>
    {{--    <a href="{{ route('brands.trashed') }}">Brands in Trash</a>--}}
    <hr>
    @if($brands->isNotEmpty())
        <div class="row">
            @foreach($brands as $brand)
                <div class="col m-3">
                    <a class="d-block" href="{{ route('brands.show', [$brand->id]) }}">{{ $brand->title }}</a>
                    <div>{{ $brand->description }}</div>
                    <a class="d-block" href="{{ route('brands.edit', [$brand->id]) }}">Edit</a>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">No brands yet. Just add first one!</div>
    @endif

</x-layout.main>
