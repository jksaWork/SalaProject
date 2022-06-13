<?php

namespace App\Http\Controllers;

use App\Models\OrderHistory;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function OrderHistory()
    {
        $Orders = OrderHistory::paginate(10);
        return view('orders.history', compact('Orders'));
    }
}
