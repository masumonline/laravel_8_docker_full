<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function category(){
        $categories = Category::where('status', 1)->with('child')->whereNull('childof')->orderBy('sort')->get();
        $brands = Brand::where('status', 1)->orderBy('sort', 'asc')->get();
        $menus = [
            'brands' => $brands,
            'categories'=> $categories
        ];
        return response()->json($menus);
    }
}
