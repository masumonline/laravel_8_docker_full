<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index($brand){
        return Product::where('brands', $brand)->where('status', '!=', 0)->paginate(20);
    }
}
