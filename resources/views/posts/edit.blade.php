<x-layout.main title="Edit Post">
    <h2>Edit or Delete Post</h2>

    <form method="POST" action="{{ route('posts.update', [$post->id]) }}">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">Title</label>
            <input name="title" type="text" value="{{ $post->title }}">
        </div>
        @error('title')
        <div style="color:red;">{{ $message }}</div>
        @enderror

        <div>
            <label for="content">Content</label>
            <textarea name="content">{{ $post->content }}</textarea>
        </div>
        @error('content')
        <div style="color:red;">{{ $message }}</div>
        @enderror

        <a href="/posts/{{ $post->id }}">Cancel</a>
        <button type="submit">Update</button>
        <button form="delete-form" type="submit">Delete</button>
    </form>

    <form method="POST" action="{{ route('posts.destroy', [$post->id]) }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout.main>
