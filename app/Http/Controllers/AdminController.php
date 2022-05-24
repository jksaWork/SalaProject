<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Ticket;
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
        /* Admin Dashboard   */
        $data = [];
        $data['UserCount'] =  Client::count();
        $data['ActivesubscriptionCount'] = Subscription::onlyTrashed()->count();
        $data['ActiveCount'] = Subscription::count();
        // dd(now()->addDays(7));
        $data['AboutExpiredCount'] = Subscription::wheredate('end_date', '>=', now())->wheredate('end_date', '<=', now()->addDays(30))->count();
        $data['ProductOrdered']  = DB::select('SELECT count(product_id) as countt , product_name FROM `order_histories` GROUP BY `product_name` ORDER BY countt DESC');
        // $data['OrdersHistory']  = OrderHistory::orderBy('id', 'desc')->limit(5)->get();
        $data['chartOne'] =  DB::select("SELECT count(id)  as Data , MONTH(created_at)  as monthename , MONTHNAME(created_at) as label  from clients WHERE created_at > DATE_SUB(now(), INTERVAL 4 MONTH) GROUP BY monthename");
        $data['charttwo'] =  DB::select("SELECT count(id)  as Data , MONTH(created_at)  as monthename , MONTHNAME(created_at) as label  from subscriptions WHERE created_at > DATE_SUB(now(), INTERVAL 4 MONTH) GROUP BY monthename");
     
        $data['progressticket'] = Ticket::where('status' , 'inprogress')->count();
        $data['completeticket'] = Ticket::where('status' , 'copmplated')->count();
        $data['newticket'] = Ticket::where('status' , 'pending')->count();
        // dd($data['chartOne']);
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
