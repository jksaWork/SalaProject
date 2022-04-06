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
            // dd($Pro);
            $Data = [
                'name' => $Pro->name, 
                'sku' => $Pro->sku, 
                'type' => $Pro->type, 
                'price' => $Pro->price, 
                'status' => $Pro->status, 
                'sale_price' => $Pro->sale_price, 
                'short_link_code' => $Pro->short_link_code, 
                'url' => $Pro->url, 
                'is_available' => $Pro->is_available, 
                'quantity' => $Pro->quantity, 
            ];
            Product::create([
                'name' => $Pro->name,
                'name' => $Pro->name, 
                'sku' => $Pro->sku, 
                'type' => $Pro->type, 
                'price' => $Pro->price, 
                'status' => $Pro->status ?? ' ', 
                'sale_price' => $Pro->sale_price, 
                'short_link_code' => $Pro->short_link_code, 
                'url' => $Pro->url, 
                'is_available' => $Pro->is_available, 
                'quantity' => $Pro->quantity ?? '', 
            ]); 
            // dd('name is undefinded');
            Product::create($Data);
            dd('done');
        }
            
    }
}
