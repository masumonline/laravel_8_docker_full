<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('sub')->orderBy('sort', 'asc')->paginate(20);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->with('sub')->whereNull('childof')->get();
        return view('category.create', compact('categories'));
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
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->status = $request->status;
        $category->sort = $request->sort;
        $category->childof = $request->childof;
        $category->save();
        return redirect('category')->with('success', 'Category is Updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::where('status', 1)->with('sub')->whereNull('childof')->get();
        return view('category.edit', compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',Rule::unique('categories')->ignore($category->id),
        ]);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->sort = $request->sort;
        $category->childof = $request->childof;
        $category->save();
        $page = $request->page;
        return redirect($page)->with('success', 'Category is Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('category')->with('warning', 'Category is Deleted!');
    }

    public function search(Request $request){
        $categories = Category::where('name', 'LIKE', "%{$request->name}%")->orderBy('id', 'desc')->paginate(20);
        // return $products;
        return view('category.index', compact('categories'));
    }
}
