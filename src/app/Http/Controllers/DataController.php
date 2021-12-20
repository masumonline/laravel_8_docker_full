<?php

namespace App\Http\Controllers;

use App\Models\ApiProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        $products = Product::paginate(20);
        return view('dashboard', compact('products'));
    }
}
