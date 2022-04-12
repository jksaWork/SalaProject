<?php

namespace App\Http\Controllers;

use App\Events\getProductFromPOS;
use App\Events\NewCleintInitApp;
use App\Jobs\GetProductsFroMSala;
use App\Models\Client;
use App\Models\PosProducts;
use App\Models\Product;
use Illuminate\Http\Request;

class RefreshController extends Controller
{
    public function PosProduct(){
        // NewCleintInitApp
        $Client = Client::first();
        PosProducts::where('client_id' , $Client->id)->delete;
        // GetProductsFroMSala
        // getProductFromPOS
        event(new getProductFromPOS($Client->id));
        return redirect()->back();
    }
    public function Product(){
        $Client = Client::first();
        Product::where('client_id' , $Client->id)->delete();
        event(new NewCleintInitApp($Client->access_token , $Client->id));
        return redirect()->to('https://s.salla.sa/apps');
    }
}
