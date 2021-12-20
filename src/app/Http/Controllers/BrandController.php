<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('sort', 'asc')->paginate(20);
        return view('brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands',
            'sort' => 'required|numeric'
        ]);

        $brand = new Brand;
        $brand->name = $request->name;
        $brand->in_home = $request->in_home;
        $brand->status = $request->status;
        $brand->sort = $request->sort;
        $brand->logo = $request->logo;
        $brand->image = $request->image;
        $brand->url = $request->url;
        $brand->save();
        return redirect('brands')->with('success', 'Brand is Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required',Rule::unique('brands')->ignore($brand->id),
            'sort' => 'required|numeric'
        ]);
        $brand->name = $request->name;
        $brand->in_home = $request->in_home;
        $brand->status = $request->status;
        $brand->sort = $request->sort;
        $brand->logo = $request->logo;
        $brand->image = $request->image;
        $brand->url = $request->url;
        $brand->save();
        return redirect('brands')->with('success', 'Brand is Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect('brands')->with('warning', $brand->name.' Brand is Deleted!');
    }
}
