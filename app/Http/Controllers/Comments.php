<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCommentRequest;
use App\Models\Comment;

class Comments extends Controller
{
    public function store(SaveCommentRequest $request)
    {
        $model = $request->checkCommentable();

        $model->comments()->save(Comment::make($request->only('text')));

        return redirect()->back();
    }
}
