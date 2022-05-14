<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function  getSeting(){
         return view('setting');
    }

    public function update(Request $request){
        try{
            auth()->user()->pos_secret = encrypt($request->BotagatySecretKey);
            auth()->user()->pos_email = $request->BotagatyUserName;
            auth()->user()->save();
            return redirect()->back();
        }catch(Exception $e){
            return redirect()->back();
        }
        return $request;

    }
}
