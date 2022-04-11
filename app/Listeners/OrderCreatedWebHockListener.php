<?php

namespace App\Listeners;

use App\Events\SalaOrderCreated;
use App\Models\PointOfSaleEqualSalaProduct;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderCreatedWebHockListener
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
    {   info('form create Hook listener');
        $Code = PointOfSaleEqualSalaProduct::Where('sala_product_id' , $event->ProdcutId)->firstOrFail()->botagate_product_code;
        event(new SalaOrderCreated($Code,$event->ProdcutId));
    }
}
