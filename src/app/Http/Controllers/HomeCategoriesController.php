<?php

namespace App\Http\Controllers;

use App\Models\Homecategory;
use Illuminate\Http\Request;

class HomeCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Homecategory::all();
        return view('homecategories.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homecategories.create');
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
            'name' => 'required',
            'status' => 'required',
            'url' => 'required',
            'sort' => 'required|numeric',
            'image' => 'required',
        ]);

        $cat = new Homecategory;
        $cat->name = $request->name;
        $cat->status = $request->status;
        $cat->url = $request->url;
        $cat->sort = $request->sort;
        $cat->image = $request->image;
        $cat->save();
        return redirect('homecategorys')->with('success', 'Feature banner is Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Homecategory  $homecategory
     * @return \Illuminate\Http\Response
     */
    public function show(Homecategory $homecategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Homecategory  $homecategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Homecategory $homecategory)
    {
        return view('homecategories.edit', compact('homecategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Homecategory  $homecategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Homecategory $homecategory)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'url' => 'required',
            'sort' => 'required|numeric',
            'image' => 'required',
        ]);

        $homecategory->name = $request->name;
        $homecategory->status = $request->status;
        $homecategory->url = $request->url;
        $homecategory->sort = $request->sort;
        $homecategory->image = $request->image;
        $homecategory->save();
        return redirect('homecategorys')->with('success', 'Feature banner is Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Homecategory  $homecategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homecategory $homecategory)
    {
        $homecategory->delete();
        return redirect('homecategorys')->with('warning', 'Home Category Deleted!');
    }
}
