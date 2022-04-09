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
            if($request->event == 'order.created'){
                info($request);
                info($request->data['items']);
                info($request->data['items'][0]);
                info($request->data['items'][0]['products']);
                event(new SalaOrderCreated($request->data['items'][0]['products']));
            }
    }
}
