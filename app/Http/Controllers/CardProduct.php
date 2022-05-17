<?php

namespace App\Http\Controllers;


use App\Models\PointOfSaleEqualSalaProduct;
use App\Models\PosProducts;

class CardProduct extends Controller
{
    public function PosProducts()
    {
        // dd(auth()->user()->id);
        // $PosProducts  = PosProducts::all();
        $PosProducts = PosProducts::paginate(20);
        return view('Admin.CardProduct', compact('PosProducts'));
    }


    public function pro()
    {
        $PosProducts = PointOfSaleEqualSalaProduct::get();
        $data = "";
        foreach ($PosProducts as $PosProduct) {
            //   event(new OrderCreatedWebHock($PosProduct->sala_product_id));
            info($PosProduct->sala_product_id);
        }
        return true;
    }
}
