<?php

namespace App\Listeners;

use App\Jobs\GetProductsFroMSala;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;

class NewCleintInitAppListner #implements ShouldQueue
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
        $Token  = $event->token;
        $Client = $event->clientId;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $Token,
            'Accept' => 'Application/json',
        ])->get('https://api.salla.dev/admin/v2/products');
        $Counts = $response->object()->pagination->totalPages;
        for ($i = 1; $i <= $Counts; $i++) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $Token,
                'Accept' => 'Application/json',
            ])->get('https://api.salla.dev/admin/v2/products?page=' . $i);
            $Products = $response->object()->data;
            if (!$Products) break;
            foreach ($Products as $Pro) {
                Product::create([
                    'client_id' => $Client,
                    'product_id' => $Pro->id,
                    'name' => $Pro->name,
                    'sku' => $Pro->sku,
                    'type' => $Pro->type,
                    'short_link_code' => $Pro->short_link_code,
                    'price' => $Pro->price->amount,
                    'status' => $Pro->status ?? ' ',
                    'sale_price' => $Pro->sale_price->amount ?? 'not null',
                    'url' => $Pro->urls->customer ?? ' ',
                    'is_available' => $Pro->is_available,
                    'quantity' => $Pro->quantity,
                ]);
            }
        }
    }
}
