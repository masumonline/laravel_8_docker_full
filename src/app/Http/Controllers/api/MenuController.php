<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Menu;


class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('items')->get();
        return response()->json($menus);
    }
}
