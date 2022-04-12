<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Redirect;
use Auth;
use DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $order = Order::all();
        return view('welcome', compact(search));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $orders = DB::table('order')
            ->where('product_id', 'like', "%" . $search . "%");

        return view('search.index', compact('orders'));
    }
}
