<?php

namespace App\Http\Controllers\api;

use App\Models\Menu;
use App\Models\Brand;
use App\Models\Branch;
use App\Models\Slider;
use App\Models\Topbox;
use App\Models\Feature;
use App\Models\Section;
use App\Models\Category;
use App\Models\Homecategory;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index()
    {
      
      // $categories = Category::where('status', 1)->with('child')->whereNull('childof')->orderBy('sort')->get();
      $sliders = Slider::all();
      $topbox = Topbox::where('status',1)->orderBy('sort','asc')->get();
      $features = Feature::where('status',1)->orderBy('sort','asc')->get();
      $homecat = Homecategory::where('status',1)->orderBy('sort','asc')->get();
      $sections = Section::where('status',1)->orderBy('sort','asc')->get();
      $brands = Brand::where('status',1)->where('in_home', 1)->orderBy('sort','asc')->get();
      $home = [
        'sliders' => $sliders,
        'topbox' => $topbox,
        'features' => $features,
        'homecat' => $homecat,
        'sections' => $sections,
        'brands' => $brands
      ];
      return response()->json($home);
    }

    public function footer(){
      $menus = Menu::with('items')->get();
      $branches = Branch::orderBy('sort','asc')->get();
      $footer=[
        'menus' => $menus,
        'branches' => $branches,
      ];
      return response()->json($footer);
    }
}
