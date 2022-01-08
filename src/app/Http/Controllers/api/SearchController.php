<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index($search)
    {
        $products = Product::select(
            'id',
            'name',
            'slug',
            'brands',
            'thumbnail',
            'category_id',
            'remote_data_id',
            'status'
        )
            ->where('status', 1)
            ->where('name', 'like', "%{$search}%")
            ->orWhere('tags', 'like', "%{$search}%")
            ->orWhere('model', 'like', "%{$search}%")
            ->orWhere('brands', 'like', "%{$search}%")
            ->orderBy('created_at', 'desc')
            ->with('category:id,name,slug,status,sort,childof')
            ->with('api:id,product_id,status,name,qty,retailprice')
            ->paginate(20);
            return response()->json($products);
    }
}
