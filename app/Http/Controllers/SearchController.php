<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Product;
use App\Models\PosProducts;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function Salasearch(Request $request)

    {
        //  return $request;
        $search = $request->search;

        $Products =  Product::where('price', 'like', "%" . $search . "%")->orWhere('name', 'like', "%" . $search . "%")->paginate(70);
        // $PosProducts = PosProducts::get();

        return view('Admin.sallaProduct.index', ['Products' => $Products]);
    }

    public function Cardsearch(Request $request)

    {
        //  return $request;
        $search = $request->search;

        // $Products =  Product::where('price', 'like', "%" . $search . "%")->orWhere('name', 'like', "%" . $search . "%")->paginate(70);
        $PosProducts = PosProducts::where('product_price', 'like', "%" . $search . "%")->orWhere('name', 'like', "%" . $search . "%")->orWhere('product_currency', 'like', "%" . $search . "%")->paginate(70);

        return view('Admin.CardProduct.index', ['PosProducts' => $PosProducts]);
    }
}
