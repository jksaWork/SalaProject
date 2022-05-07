<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\OrderCreatedWebHock;
use App\Models\Client;
use App\Models\PointOfSaleEqualSalaProduct;
use App\Models\PosProducts;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SallaProduct extends Controller
{
    public function product()
    {
        // dd(auth()->user()->id);
        $Products = Product::all();
        return view('Admin.SallaProduct', compact('Products'));
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
    public function sallProduct()
    {
        return 'jks aatiani';
    }
}
