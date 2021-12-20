<?php

namespace App\Http\Controllers;

use App\Models\ApiProduct;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function index(){
        $erps = ApiProduct::orderBy('id', 'desc')->paginate(20);
        return view('erp.index',compact('erps'));
    }

    public function update(Request $request){
        $erp = ApiProduct::findOrFail($request->id);
        if($erp->status==1){
            $erp->status=0;
        }else{
            $erp->status=1;
        }
        $erp->save();
        return back()->with('success', 'Data is Updated!');
    }

    public function search(Request $request)
    {
        $erps = ApiProduct::where('name', 'LIKE', "%{$request->name}%")->orderBy('id', 'desc')->paginate(20);
        return view('erp.index', compact('erps'));
    }
}
