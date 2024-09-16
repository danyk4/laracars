<?php

namespace App\Http\Controllers;

use App\Http\Requests\Brands\SaveBrandRequest;
use App\Http\Requests\Brands\UpdateBrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('title')->get();

        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(SaveBrandRequest $request)
    {
        Brand::create($request->validated());

        return redirect(route('brands.index'));
    }

    public function show(Brand $brand)
    {
        return view('brands.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update($request->validated());

        return redirect(route('brands.index'));
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect(route('brands.index'));
    }
}
