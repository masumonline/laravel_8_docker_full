<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($cat, $sort=1)
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

        if($sort == 1){
            $order  = 'desc';
        } 
        
        if($sort==2){
            $order = 'asc';
        }
        
        $products = Product::select('id','name','slug','brands','thumbnail','category_id','remote_data_id')->whereIn('category_id', $id)->with('category:id,name,slug,status,sort,childof')->with('api:id,product_id,status,name,qty,retailprice')->where('status', '!=', 0)->orderBy('created_at',$order)->paginate(20);
        return response()->json($products);
    }
}
