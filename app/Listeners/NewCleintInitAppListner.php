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
        // Http
        // dd($event);
        

        dispatch(new GetProductsFroMSala('sala'));
        dd('dispatch done');
            
    }
}
