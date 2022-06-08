<?php

namespace App\Http\Controllers;

use App\Events\getProductFromPOS;
use App\Events\OrderCreatedWebHock;
use App\Events\SalaOrderCreated;
use App\Helpers\SalaClass;
use App\Models\Client;
use App\Models\Subscription;
use Exception;
use Illuminate\Http\Request;

class hock2 extends Controller
{
    public function  hock2(Request $request)
    {

        // $Inteface =new Client;
        // $events = ['order.created' => 'OrderCreateCreate()'];
        // $Inteface->{$events[$request->event]};

        if ($request->event == 'order.created') {
            info('order_created' . $request->data['items'][0]['product']['id']);
            event(new OrderCreatedWebHock($request->data['items'][0]['product']['id']));
        }
        if ($request->event == 'app.settings.updated') {
            info($request->merchant);
            $client  = Client::where('merchant_id', $request->merchant)->first();
            // update user ----------------------------------------;
            $client->update([
                'password' => bcrypt($request->data['settings']['password']),
                'email' => $request->data['settings']['user_email'],
            ]);
            // event(new getProductFromPOS($client->id));
        }

        if ($request->event == 'app.subscription.started') {
            // return $request->data['start_date'];
            $Client = Client::firstWhere('merchant_id', $request->merchant);
            if (!$Client) return;
            $data = [
                'client_id' => $Client->id,
                'plan_period' => $request->data['plan_period'],
                'start_date' => $request->data['start_date'],
                'end_date' => $request->data['end_date'],
                'total' => $request->data['total'],
                'plan_name' => $request->data['plan_name'],
                'price' => $request->data['price'],
                'plan_type' => $request->data['plan_type'],
                'merchant_id' => $request->merchant,
            ];
            return  Subscription::create($data);
        }
        info($request);
    }
}
