<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index($slug)
    {
           $product = Product::select('id', 'category_id', 'name', 'model', 'slug', 'photo', 'thumbnail','details','status','tags','meta_tag','meta_description','youtube','brands','short','specification','remote_data_id')->where('slug', $slug)->with('api:id,product_id,status,qty,retailprice')->with('gallery')->where('status', 1)->with('category.parent.parent')->first();
        //    $product = Product::select('products.id', 'products.category_id', 'products.name', 'products.model', 'products.slug', 'products.photo', 'products.thumbnail','products.details','products.status','products.tags','products.meta_tag','products.meta_description','products.youtube','products.brands','products.short','products.specification','products.remote_data_id','products_galleries.id','products_galleries.product_id', 'products_galleries.photo')->where('slug', $slug)->with('api:id,product_id,status,qty,retailprice')->join('products_galleries', 'products.id', '=', 'products_galleries.product_id')->where('status', 1)->with('category.parent.parent')->first();
        // $product = Product::select(['products.id', 'products.name', 'products_galleries.thumb'])
        //     ->where('slug', $slug)
        //     ->join('products_galleries', 'products_galleries.product_id', '=', 'products.id')
        //     ->get();
        return response()->json($product);
    }
}
