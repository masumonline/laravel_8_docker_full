<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::all();
        return view('features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.create');
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
            'sort' => 'required|numeric',
            'image' => 'required',
            'url' => 'required',
        ]);

        $feature = new Feature;
        $feature->name = $request->name;
        $feature->status = $request->status;
        $feature->sort = $request->sort;
        $feature->image = $request->image;
        $feature->url = $request->url;
        $feature->save();
        return redirect('features')->with('success', 'Feature banner is Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        return view('features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'sort' => 'required|numeric',
            'image' => 'required',
            'url' => 'url',
        ]);
        $feature->name = $request->name;
        $feature->status = $request->status;
        $feature->sort = $request->sort;
        $feature->image = $request->image;
        $feature->url = $request->url;
        $feature->save();
        return redirect('features')->with('success', 'Feature banner is Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect('features')->with('warning', 'Feature Deleted!');
    }
}
