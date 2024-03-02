<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = (new Brand)->paginate(10);
        return view('admin.brands.index', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:brands|max:50|min:3',
            'description' => 'required'
        ]);

        // $validated = $request->validate([
        //     'name' => ['bail', 'required', 'unique:brands', 'max:50', 'min:3'],
        //     'description' => ['required']
        // ]);

        // $validated = $request->validateWithBag('brand', [
        //     'name' => ['bail', 'required', 'unique:brands', 'max:50', 'min:3'],
        //     'description' => ['required']
        // ]);

        Brand::create($request->all());

        // $brand = new Brand;
        // $brand->name = $request->name;
        // $brand->description = $request->description;
        // $brand->save();
        //
        return redirect()->route('admin.brands.index')->with('success', "Brand created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', ['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update($request->all());

        return redirect()->route('admin.brands.index')->with('success', "Brand updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('success', "Brand deleted successfully!");
    }
}
