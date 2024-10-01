<x-layout.main :title="$post->title">
    <h2>{{ $post->title }}</h2>
    <div>
        {{ $post->content }}
    </div>
    <div>
        <a href="{{ route('posts.edit', [$post->id]) }}">Edit</a>
    </div>
</x-layout.main>
