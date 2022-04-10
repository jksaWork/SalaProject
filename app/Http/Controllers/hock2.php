<?php
namespace App\Http\Controllers;

use App\Events\OrderCreatedWebHock;
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
                // OrderCreatedWebHock
                info('order_created' , $request->data['items'][0]['product']['id']);
                event( new OrderCreatedWebHock($request->data['items'][0]['product']['id']));
            }
            // info($request);
    }
}
