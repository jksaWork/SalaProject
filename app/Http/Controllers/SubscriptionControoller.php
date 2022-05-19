<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionControoller extends Controller
{
    public function index(){
        $Subscriptions =  Subscription::paginate(10);
        return view('subscrption.index', compact('Subscriptions'));
    }
}
