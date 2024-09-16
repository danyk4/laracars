<?php

namespace App\Http\Requests\Brands;

use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveBrandRequest extends FormRequest
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
          'title'       => ['required', 'min:2', 'max:64', $this->titleUniqueRule()],
          'description' => 'required|min:2',
        ];
    }

    public function attributes()
    {
        return [
          'title'       => 'Бренд',
          'description' => 'Описание',
        ];
    }

    protected function titleUniqueRule()
    {
        return Rule::unique(Brand::class, 'title');
    }
}
