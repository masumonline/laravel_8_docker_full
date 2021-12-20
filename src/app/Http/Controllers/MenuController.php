<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;

class MenuController extends Controller
{
    public function index(){
        $categories = Category::where('status', 1)->with('sub')->whereNull('childof')->get();
        //return $categories;
        $menus = Menus::all();
        return view('menu.index', compact('menus','categories'));
    }

    public function savemenu(Request $request){
        $menu = $request->menus;
        $cat_id = $request->category;
        $category = Category::find($cat_id);
        $items = new MenuItems;
        $items->label = $category->name;
        $items->link = $category->slug;
        $items->parent = 99;
        $items->sort = 0;
        $items->menu = $menu;
        $items->depth = 0;
        $items->save();
        return back();
    }

}
