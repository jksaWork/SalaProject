<?php

namespace App\Http\Controllers;

use App\Events\getProductFromPOS;
use App\Events\NewCleintInitApp;
use App\Models\PosProducts;
use App\Models\Product;


class RefreshController extends Controller
{
    public function PosProduct()
    {
        // $Client = Client::find();
        PosProducts::where('client_id', auth()->user()->id)->delete();
        event(new getProductFromPOS(auth()->user()->id));
        return redirect()->back();
    }
    public function Product()
    {
        Product::where('client_id', auth()->user()->id)->delete();
        event(new NewCleintInitApp(auth()->user()->access_token, auth()->user()->id));
        return redirect()->to('https://s.salla.sa/apps');
    }
}
