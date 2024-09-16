<?php

namespace App\Http\Controllers;

use App\Enums\Cars\Status;
use App\Http\Requests\Cars\SaveCarRequest;
use App\Http\Requests\Cars\UpdateCarRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('brand.country', 'tags')->where('status', Status::ACTIVE)->orderByDesc('created_at')->get();

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transmission = config('app-cars.transmission');
        $brands       = Brand::orderBy('title')->pluck('title', 'id');
        $tags         = Tag::orderBy('title')->pluck('title', 'id');

        return view('cars.create', compact('transmission', 'brands', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveCarRequest $request)
    {
        $data = collect($request->validated());
        $car  = Car::make($data->except('tags')->toArray());

        DB::transaction(function () use ($data, $car) {
            $car->save();
            $car->tags()->sync($data->get('tags'));
        });


        return redirect()->route('cars.show', [$car->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //$car = Car::findOrFail($id);
        //dd($car->status->name);

        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)  // string $id
    {
        //$car          = Car::findOrFail($id);
        $transmission = config('app-cars.transmission');
        $brands       = Brand::orderBy('title')->pluck('title', 'id');
        $tags         = Tag::orderBy('title')->pluck('title', 'id');
        $defaultTags  = $car->tags()->pluck('tag_id');

        return view('cars.edit', compact('car', 'transmission', 'brands', 'tags', 'defaultTags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $data = collect($request->validated());
        $car->update($data->except(['tags'])->toArray());
        $car->tags()->sync($data->get('tags'));

        return redirect()->route('cars.show', compact('car'))->with('alert', trans('notifications.cars.edited'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index')->with('alert', trans('notifications.cars.deleted'));
    }

    public function trashed()
    {
        $cars = Car::onlyTrashed()->orderByDesc('created_at')->get();

        return view('cars.trashed', compact('cars'));
    }

    public function restore(string $id)
    {
        $car = Car::onlyTrashed()->findOrFail($id);

        if (Car::where('vin', $car->vin)->exists()) {
            return redirect()->route('cars.trashed')->with('alert', trans('notifications.cars.restore-fail-vin', ['vin' => $car->vin]));
        }

        $car->restore();

        return redirect()->route('cars.index')->with('alert', trans('notifications.cars.restored'));
    }
}
