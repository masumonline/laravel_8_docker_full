<?php

namespace App\Http\Controllers;

use App\Models\Topbox;
use Illuminate\Http\Request;

class TopBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topboxes = Topbox::all();
        return view('topboxes.index', compact('topboxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topboxes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $boxes = new Topbox;
        $boxes->name = $request->name;
        $boxes->status = $request->status;
        $boxes->sort = $request->sort;
        $boxes->details = $request->details;
        $boxes->save();
        return redirect('topboxes')->with('success', 'Box is Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topbox = Topbox::find($id);
        return view('topboxes.edit', compact('topbox'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $boxes = Topbox::find($id);
        $boxes->name = $request->name;
        $boxes->status = $request->status;
        $boxes->sort = $request->sort;
        $boxes->details = $request->details;
        $boxes->save();
        return redirect('topboxes')->with('success', 'Box is Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boxes = Topbox::find($id);
        $boxes->delete();
        return redirect('topboxes')->with('warning', 'Box is Deleted!');
    }
}
