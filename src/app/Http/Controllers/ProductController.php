<?php

namespace App\Http\Controllers;

use App\Models\ApiProduct;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('api')->orderBy('id', 'desc')->paginate(20);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::where('status', 1)->with('sub')->whereNull('childof')->get();
        return view('product.create', compact('brands', 'categories'));
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
            'sku' => 'required',
            'slug' => 'required|unique:products',
            'model' => 'required',
            'photo' => 'required',
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->slug = $request->slug;
        $product->model = $request->model;
        $product->category_id = $request->category_id;
        if ($request->photo) {
            $product->photo = $request->photo;
            $img_thumb = explode('/', $request->photo);
            $directory = dirname($request->photo);
            $thumbnail = $directory . '/thumbs/' . end($img_thumb);
            $product->thumbnail = $thumbnail;
        }
        $product->details = $request->details;
        $product->status = $request->status;
        $product->tags = $request->tags;
        $product->features = $request->features;
        $product->meta_tag = $request->meta_tag;
        $product->meta_description = $request->meta_description;
        $product->youtube = $request->youtube;
        $product->featured = $request->featured;
        $product->brands = $request->brands;
        $product->short = $request->short;
        $product->specification = $request->specification;
        if ($request->livesearch) {
            $product->remote_data_id = $request->livesearch;
        }
        $product->save();
        if ($request->gallery) {
            $gphotos = explode(',', $request->gallery);
            foreach ($gphotos as $photo) {
                $gallery = new Gallery;
                $gallery->product_id = $product->id;
                $gallery->photo = $photo;
                $gallery->save();
            }
        }
        return redirect('products')->with('success', 'Product is Updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $galleries = Gallery::where('product_id', $product->id)->get();
        return view('product.show', compact('product', 'galleries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $galleries = Gallery::where('product_id', $product->id)->get();
        $categories = Category::where('status', 1)->with('sub')->whereNull('childof')->get();
        //$apiproducts = ApiProduct::all();
        return view('product.edit', compact('product', 'brands', 'categories', 'galleries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required',
            'slug' => 'required', Rule::unique('products')->ignore($product->id),
            'model' => 'required',
            'photo' => 'required',
        ]);
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->slug = $request->slug;
        $product->model = $request->model;
        if (is_numeric($request->category_id)) {
            $product->category_id = $request->category_id;
        }
        if ($request->photo) {
            $product->photo = $request->photo;
            $img_thumb = explode('/', $request->photo);
            $directory = dirname($request->photo);
            $thumbnail = $directory . '/thumbs/' . end($img_thumb);
            $product->thumbnail = $thumbnail;
        }

        if ($request->gallery) {
            $galleries = Gallery::where('product_id', $product->id)->get();
            foreach ($galleries as $gallery) {
                $gallery->delete();
            }
            $gphotos = explode(',', $request->gallery);
            foreach ($gphotos as $photo) {
                $newgalleries = new Gallery;
                $newgalleries->product_id = $product->id;
                $newgalleries->photo = $photo;
                $newgalleries->save();
            }
        }
        $product->details = $request->details;
        $product->status = $request->status;
        $product->tags = $request->tags;
        $product->features = $request->features;
        $product->meta_tag = $request->meta_tag;
        $product->meta_description = $request->meta_description;
        $product->youtube = $request->youtube;
        $product->featured = $request->featured;
        $product->brands = $request->brands;
        $product->short = $request->short;
        $product->specification = $request->specification;
        if ($request->livesearch) {
            $product->remote_data_id = $request->livesearch;
        }
        $product->save();
        $page = $request->page;
        return redirect($page)->with('success', 'Product is Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Request $request)
    {
        $galleries = Gallery::where('product_id', $product->id)->get();
        foreach ($galleries as $gallery) {
            $gallery->delete();
        }
        $product->delete();

        $page = url()->previous();
        return redirect($page)->with('warning', 'Product is Deleted!');
    }

    public function select(Request $request)
    {
        $erpdata = [];

        if ($request->has('q')) {
            $search = $request->q;
            $erpdata = ApiProduct::select("product_id", "name")
                ->where('status', 1)
                ->where('name', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($erpdata);
    }

    public function search(Request $request)
    {
        $products = Product::with('api')->where('name', 'LIKE', "%{$request->name}%")->orderBy('id', 'desc')->paginate(20);
        // return $products;
        return view('product.index', compact('products'));
    }
}
