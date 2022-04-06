<?php

namespace App\Listeners;

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
        $response = Http::get('https://stoplight.io/mocks/salla/merchant/68673/products?per_page=10');
        $Products = $response->object()->data;
        // dd($Products);
        foreach($Products as $Pro){
            $Product = new Product();
            $Product->name = $Pro->name;
            $Product->sku = $Pro->sku;
            $Product->type = $Pro->type;
            $Product->price = $Pro->price;
            $Product->status = $Pro->status;
            $Product->sale_price = $Pro->sale_price;
            $Product->short_link_code = $Pro->short_link_code;
            $Product->url = $Pro->url;
            $Product->is_available = $Pro->is_available;
            $Product->quantity = $Pro->quantity;
            $Product->save();
        }
            
    }
}
