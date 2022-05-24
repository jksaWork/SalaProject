<?php

namespace App\Http\Controllers;

use App\Models\OrganizationProfile;
use Illuminate\Http\Request;

class OrgnazationProfile extends Controller
{
    public function get(){
        // return ;
        return view('setting.orgnization-profile');
    }

    public function stroe(Request $request){
        $profile = OrganizationProfile::first();
        $profile->name = $request->name;
        if($request->hasFile('logo')){
            $LogoName = $request->logo->getClientOriginalName();
            $request->logo->move(public_path(). '/logos' , $LogoName);
            // dd($LogoName);
            $profile->logo = $LogoName;
        }
        $profile->save();
        return redirect()->back();
    }
}
