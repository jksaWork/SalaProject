<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLoginFrom(){
        return view('auth.login');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // return $credentials;
        if (Auth::guard('client')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/product-code');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);2
    }
}
