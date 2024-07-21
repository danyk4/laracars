<h2>All posts</h2>
<ul>
    @foreach($posts as $post)
        <li>{{ $post['title'] }}</li>
    @endforeach
</ul>

