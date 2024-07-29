<?php

namespace App\Http\Requests\Cars;

class UpdateCarRequest extends SaveCarRequest
{
    protected function vinUniqueRule()
    {
        return parent::vinUniqueRule()->ignore($this->car);
    }
}
