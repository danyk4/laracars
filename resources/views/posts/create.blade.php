<x-layout.main title="Add Post">
    <h2>Add Post</h2>

    <form method="POST" action="/posts">
        @csrf
        <div>
            <label for="title">Title</label>
            <input name="title" type="text" value="{{ old('title') }}">
        </div>
        @error('title')
        <div style="color:red;">{{ $message }}</div>
        @enderror
        <div>
            <label for="content">Content</label>
            <textarea name="content">{{ old('content') }}</textarea>
        </div>
        @error('content')
        <div style="color:red;">{{ $message }}</div>
        @enderror
        <button type="submit">Send</button>
    </form>
</x-layout.main>
