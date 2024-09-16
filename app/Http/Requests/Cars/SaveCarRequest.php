<?php

namespace App\Http\Requests\Cars;

use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveCarRequest extends FormRequest
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
        $transmission = config('app-cars.transmission');

        return [
            'brand_id'     => 'required|integer|exists:brands,id',
            'model'        => 'required|min:2|max:64',
            //'vin'          => 'required|min:4|max:14|unique:cars,vin',
            'vin'          => ['required', 'min:4', 'max:14', $this->vinUniqueRule()],
            'transmission' => ['required', Rule::in(array_keys($transmission))],
            'tags'         => 'array',
            'tags.*'       => 'integer|exists:tags,id',
        ];
    }

    public function attributes()
    {
        return [
            'brand_id'     => 'Марка',
            'model'        => 'Модель',
            'vin'          => 'Vin номер',
            'transmission' => 'Коробка передач',
            'tags'         => 'Теги',
        ];
    }

    protected function vinUniqueRule()
    {
        return Rule::unique(Car::class, 'vin')->whereNull('deleted_at');
        //return Rule::unique(Car::class, 'vin');
    }
}
