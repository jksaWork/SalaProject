<?php

namespace App\Http\Controllers;

use App\Models\OrderHistory;
use App\Models\PosProducts;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function index()
    {
        // select id , month(created_at) as monthename  from clients WHERE created_at > DATE_SUB(now(), INTERVAL 5 MONTH) GROUP BY monthename;
        $data = [];
        $data['SallaCount'] =  Product::count();
        $data['PosCount'] =  PosProducts::count();
        $data['OrderCount']  = OrderHistory::count();
        $data['OrdersHistory']  = OrderHistory::orderBy('id', 'desc')->limit(5)->get();
        $data['ProductOrdered']  = DB::select('SELECT count(product_id) as countt , product_name FROM `order_histories` GROUP BY `product_name` ORDER BY countt DESC');
        $data['chartOne'] =  DB::select('SELECT DAYNAME(created_at) as label , Count(id) as Data FROM `order_histories` where created_at > CURRENT_DATE() -7 and client_id = ? GROUP BY date(created_at)' , [auth()->user()->id]);
        return view('Admin.Dashbord.index', $data);
    }

}
