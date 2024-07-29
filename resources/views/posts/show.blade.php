<x-layout.main :title="$post->title">
    <h2>{{ $post->title }}</h2>
    <div>
        {{ $post->content }}
    </div>
    <div>
        <a href="/posts/{{ $post->id }}/edit">Edit</a>
    </div>
</x-layout.main>
