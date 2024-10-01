<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class SaveCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'text' => 'required|min:5|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'text' => 'Комментарий',
        ];
    }

    public function checkCommentable()
    {
        $commentables = config('commentable');

        if ( ! isset($commentables[$this->model])) {
            Log::alert('Some fucker try to change model name');
            throw ValidationException::withMessages([
                'model' => 'wrong model',
            ]);
        }

        $model = $commentables[$this->model]::findOrFail($this->id);

        return $model;
    }
}
 
