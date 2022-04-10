<?php
namespace App\Http\Controllers;

use App\Events\SalaOrderCreated;
use App\Helpers\SalaClass;
use App\Models\Client;
use Exception;
use Illuminate\Http\Request;
class hock2 extends Controller
{
    public function  hock2(Request $request)
    {
            if($request->event == 'product.created'){
                info('product_created'. $request);
            }
            info($request);
    }
}
