<?php

namespace App\Listeners;

use App\Jobs\GetProductsFroMSala;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;

class NewCleintInitAppListner 
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$event->token, 
            'Accept' => 'Application/json', 
        ])->
        get('https://stoplight.io/mocks/salla/merchant/68673/products?per_page=10');
        $Counts = $response->object()->pagination->count;
        dd( 'Account is ' .$Counts);
        dispatch(new GetProductsFroMSala($event->token , $event->clientId));#->delay(now()->addMinutes(2));            
    }
}
