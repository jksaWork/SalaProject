<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Product;
use App\Models\PosProducts;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)

    {
        //  return $request;
        $search = $request->search;

        $Products =  Product::where('price', 'like', "%" . $search . "%")->orWhere('name', 'like', "%" . $search . "%")->paginate(70);
        $PosProducts = PosProducts::get();
        return view('ProductCode', ['Products' => $Products, 'PosProducts' => $PosProducts]);
    }
}
