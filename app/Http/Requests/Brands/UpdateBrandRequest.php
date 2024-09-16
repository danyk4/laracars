<?php

namespace App\Http\Requests\Brands;

class UpdateBrandRequest extends SaveBrandRequest
{
    protected function titleUniqueRule()
    {
        return parent::titleUniqueRule()->ignore($this->brand->id);
    }
}
