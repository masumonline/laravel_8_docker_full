<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sections.create');
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
        $section = New Section;
        $section->name = $request->name;
        $section->status = $request->status;
        $section->sort = $request->sort;
        $section->image = $request->image;
        $section->url = $request->url;
        $section->save();
        return redirect('sections')->with('success', 'Section is Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'sort' => 'required|numeric',
            'image' => 'required',
            'url' => 'required',
        ]);
        $section->name = $request->name;
        $section->status = $request->status;
        $section->sort = $request->sort;
        $section->image = $request->image;
        $section->url = $request->url;
        $section->save();
        return redirect('sections')->with('success', 'Section Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return redirect('sections')->with('warning', 'Section Deleted!');
    }
}
