<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = [];  // all fillable

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
