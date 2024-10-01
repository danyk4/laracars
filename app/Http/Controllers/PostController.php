<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\SavePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class);
    }

    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(SavePostRequest $request)
    {
        $post          = Post::make($request->validated());
        $post->user_id = auth()->id();
        $post->save();

        return redirect(route('posts.index'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(SavePostRequest $request, Post $post)
    {
        $post->update($request->validated()); // if use fillable, otherwise use fill() and save()

        return redirect()->route('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
