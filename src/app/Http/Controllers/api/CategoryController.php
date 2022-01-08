<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use App\Models\Category;
use App\Models\ApiProduct;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index($cat, $sort = 1)
    {
        $category = Category::where('slug', $cat)->with('child')->first();
        //return $category;
        $id = [$category->id];

        if ($category->child) {
            foreach ($category->child as $child) {
                $id = Arr::prepend($id, $child->id);
                if ($child->sub) {
                    foreach ($child->sub as $sub) {
                        $id = Arr::prepend($id, $sub->id);
                    }
                }
            }
        }
        $orderName = 'created_at';

        if ($sort == 1) {
            $order  = 'desc';
            $products = Product::select('id', 'name', 'slug', 'brands', 'thumbnail', 'category_id', 'remote_data_id', 'status')->whereIn('category_id', $id)->with('category:id,name,slug,status,sort,childof')->with('api:id,product_id,status,name,qty,retailprice')->where('status', '!=', 0)->orderBy($orderName, $order);
        }

        if ($sort == 2) {
            $order = 'asc';
            $products = Product::select('id', 'name', 'slug', 'brands', 'thumbnail', 'category_id', 'remote_data_id', 'status')->whereIn('category_id', $id)->with('category:id,name,slug,status,sort,childof')->with('api:id,product_id,status,name,qty,retailprice')->where('status', '!=', 0)->orderBy($orderName, $order);
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
            )->whereIn('products.category_id', $id)->with('category:id,name,slug,status,sort,childof')->with('api:id,product_id,status,name,qty,retailprice')->join('remote_data', 'products.remote_data_id', '=', 'remote_data.product_id')->where('products.status', '!=', 0);

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
            )->whereIn('products.category_id', $id)->with('category:id,name,slug,status,sort,childof')->with('api:id,product_id,status,name,qty,retailprice')->join('remote_data', 'products.remote_data_id', '=', 'remote_data.product_id')->where('products.status', '!=', 0);

            $products->orderBy('remote_data.retailprice', $order);
        }
        return response()->json($products->paginate(20));
    }
}
