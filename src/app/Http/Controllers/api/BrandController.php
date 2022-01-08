<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index($brand, $sort = 1)
    {
        if ($sort == 1) {
            $order  = 'desc';
            $products = Product::select('id', 'name', 'slug', 'brands', 'thumbnail', 'category_id', 'remote_data_id', 'status')->with('category:id,name,slug,status,sort,childof')->with('api:id,product_id,status,name,qty,retailprice')->where('brands', $brand)->where('status', '!=', 0)->orderBy('created_at', $order);
        }

        if ($sort == 2) {
            $order = 'asc';
            $products = Product::select('id', 'name', 'slug', 'brands', 'thumbnail', 'category_id', 'remote_data_id', 'status')->with('category:id,name,slug,status,sort,childof')->with('api:id,product_id,status,name,qty,retailprice')->where('brands', $brand)->where('status', '!=', 0)->orderBy('created_at', $order);
        }

        if ($sort == 3) {
            $order  = 'desc';
            $products = Product::select(
                'products.id',
                'products.name',
                'products.slug',
                'products.brands',
                'products.thumbnail',
                'products.category_id',
                'products.status',
                'products.remote_data_id',
                'remote_data.retailprice',
                'remote_data.product_id'
            )->where('brands', $brand)->with('category:id,name,slug,status,sort,childof')->with('api:id,product_id,status,name,qty,retailprice')->join('remote_data', 'products.remote_data_id', '=', 'remote_data.product_id')->where('products.status', '!=', 0);

            $products->orderBy('remote_data.retailprice', $order);
        }

        if ($sort == 4) {
            $order = 'asc';
            $products = Product::select(
                'products.id',
                'products.name',
                'products.slug',
                'products.brands',
                'products.thumbnail',
                'products.category_id',
                'products.status',
                'products.remote_data_id',
                'remote_data.retailprice',
                'remote_data.product_id'
            )->where('brands', $brand)->with('category:id,name,slug,status,sort,childof')->with('api:id,product_id,status,name,qty,retailprice')->join('remote_data', 'products.remote_data_id', '=', 'remote_data.product_id')->where('products.status', '!=', 0);

            $products->orderBy('remote_data.retailprice', $order);
        }
        return response()->json($products->paginate(20));

    }
}
