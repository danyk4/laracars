<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Car;

class CarPublicController extends Controller
{
    public function index()
    {
        $cars = Car::with('brand.country', 'tags')->ofActive()->orderByDesc('created_at')->get();

        return view('public.cars.index', compact('cars'));
    }

    public function show(Car $car)
    {
        return view('public.cars.show', compact('car'));
    }
}
