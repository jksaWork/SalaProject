<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /****Admin Dashboard */
        $data = [];
        $data['UserCount'] =  Client::count();
        $data['ActivesubscriptionCount'] = Subscription::onlyTrashed()->count();
        $data['ActiveCount'] = Subscription::count();
        // dd(now()->addDays(7));
        $data['AboutExpiredCount'] = Subscription::wheredate('end_date', '>=', now())->wheredate('end_date', '<=', now()->addDays(30))->count();
        $data['ProductOrdered']  = DB::select('SELECT count(product_id) as countt , product_name FROM `order_histories` GROUP BY `product_name` ORDER BY countt DESC');
        // $data['OrdersHistory']  = OrderHistory::orderBy('id', 'desc')->limit(5)->get();
        $data['chartOne'] =  DB::select('SELECT DAYNAME(created_at) as label , Count(id) as Data FROM `order_histories` where created_at > CURRENT_DATE() -7 and client_id = ? GROUP BY date(created_at)', [auth()->user()->id]);

        return view('Admin.Dashboard.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
