<?php

namespace App\Http\Controllers;

use App\Models\PosProducts;
use App\Models\Product;
use Illuminate\Http\Request;

class GEtTables extends Controller
{
    public function products(){
        $Products = Product::paginate(20);
        return view('Product' , compact('Products'));
    }
    public function PosProducts(){
        $Products = PosProducts::paginate(20);
        return view('PosProducts' , compact('Products'));
    }
}
