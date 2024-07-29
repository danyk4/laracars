<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cars\SaveCarRequest;
use App\Http\Requests\Cars\UpdateCarRequest;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::orderByDesc('created_at')->get();

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transmission = config('app-cars.transmission');

        return view('cars.create', compact('transmission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveCarRequest $request)
    {
        $car = Car::create($request->validated());

        return redirect()->route('cars.show', [$car->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //$car = Car::findOrFail($id);

        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)  // string $id
    {
        //$car          = Car::findOrFail($id);
        $transmission = config('app-cars.transmission');

        return view('cars.edit', compact('car', 'transmission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update($request->validated());

        return redirect()->route('cars.show', compact('car'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index');
    }
}
