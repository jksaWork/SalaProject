<?php
namespace App\Http\Controllers;
use App\Helpers\SalaClass;
use App\Models\Client;
use Exception;
use Illuminate\Http\Request;
class hock2 extends Controller
{
    public function  hock2(Request $request)
    {
        $info = 'route is here';
        info($request);
        return $info;
            // dd($request);
    }


}
