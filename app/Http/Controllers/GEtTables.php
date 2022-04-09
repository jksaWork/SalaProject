<?php

namespace App\Http\Controllers;

use App\Models\PointOfSaleEqualSalaProduct;
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

    public function ProductCode(){
        $Products = Product::paginate(20);
        $PosProducts = PosProducts::get();
        return view('ProductCode' , compact('Products' ,'PosProducts'));
    }

    public function ProductCodeStore(Request $request){
        // return $request;
        PointOfSaleEqualSalaProduct::create([
            'botagate_product_code' => $request->ProductCode ,
            'sala_product_id' => $request->product_id ,
        ]);
        return redirect()->back();
    }
}
