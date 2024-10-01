@props([
    'model'
])

<div class="mt-4">
    @foreach($model->comments as $comment)
        <div class="alert alert-success my-2">
            {{ $comment->text }}
        </div>
    @endforeach
</div>
