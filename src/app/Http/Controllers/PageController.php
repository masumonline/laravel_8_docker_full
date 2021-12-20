<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::paginate(20);
        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
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
            'title' => 'required',
            'slug' => 'required|unique:pages',
            'details' => 'required'
        ]);
        $page = new Page;
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->details = $request->details;
        $page->meta_tag = $request->tag;
        $page->meta_description = $request->description;
        $page->header = $request->header;
        $page->footer = $request->footer;
        $page->save();
        return redirect('page')->with('success', 'Page is Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('pages')->ignore($page->id)],
            'details' => 'required'
        ]);
        //return $request->all();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->details = $request->details;
        $page->meta_tag = $request->tag;
        $page->meta_description = $request->description;
        $page->header = $request->header;
        $page->footer = $request->footer;
        $page->save();
        return redirect('page')->with('success', 'Page is Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect('page')->with('warning', 'Page is Deleted!');
    }
}
