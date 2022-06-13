<?php

namespace App\Http\Controllers;

use App\Models\PointOfSaleEqualSalaProduct;
use App\Models\PosProducts;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class LinkedProductController extends Controller
{
    public function LinkProduct(){
        $SalaProduct = Product::select('name', 'id','product_id' )->where('client_id' , auth()->user()->id)->get();
        $BotagatyProduct = PosProducts::select('name', 'id', 'product_code')->where('client_id' , auth()->user()->id)->get();
        return view('link.add', compact('SalaProduct' , 'BotagatyProduct'));
    }

    public function LinkWithAjax(Request $request){
        try{
            PointOfSaleEqualSalaProduct::create([
                'botagate_product_code' => $request->botagaty_product,
                'sala_product_id' => $request->sala_product ,
                'quantitiy' => $request->qunatity,
                'client_id' => $request->client_id,
            ]);

            return response()->json([
                'message' => 'the Product Was Realte Successfuley',
                'code' => 1,
            ]);
        }catch(Exception $e){
            return $e;
            return response()->json([
                'message' => 'Some Thing Went Wrong',
                'code' => 2,
            ]);
        }
    }
}

