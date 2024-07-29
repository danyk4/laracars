<x-layout.main title="All Posts">

    <h2>All posts</h2>
    <hr>
    <a href="/posts/create">Add Post</a>
    <hr>
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ route('posts.show', [$post->id]) }}">{{ $post->title }}</a>
                <a href="{{ route('posts.edit', [$post->id]) }}">Edit</a>
            </li>
        @endforeach
    </ul>

</x-layout.main>
