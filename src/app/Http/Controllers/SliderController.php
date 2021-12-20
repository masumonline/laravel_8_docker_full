<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('sort', 'asc')->get();
        return view('sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sort' => 'required|numeric',
            'image' => 'required',
        ]);
        $slider = new Slider;
        $slider->name = $request->name;
        $slider->sort = $request->sort;
        $slider->image = $request->image;
        $slider->url = $request->url;
        $slider->save();
        return redirect('sliders')->with('success', 'Slider Created!');
    }

    public function edit(Slider $slider)
    {
        return view('sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'name' => 'required',
            'sort' => 'required|numeric',
            'url' => 'required',
        ]);

        $slider->name = $request->name;
        $slider->sort = $request->sort;
        $slider->image = $request->image;
        $slider->url = $request->url;
        $slider->save();
        return redirect('sliders')->with('success', 'Slider Updated!');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect('sliders')->with('warning', 'Slider is Deleted!');
    }
}
