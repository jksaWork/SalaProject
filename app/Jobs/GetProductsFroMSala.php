<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class GetProductsFroMSala implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $token;
    public $client_id;
    public function __construct($token , $client_id)
    {
        // dd($token);
        $this->token = $token;
        $this->client_id = $client_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
            'Accept' => 'Application/json',
        ])->get('https://api.salla.dev/admin/v2/products');
        $Counts = $response->object()->pagination->totalPages;
        for ($i = 1; $i <= $Counts; $i++) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->token,
                'Accept' => 'Application/json',
            ])->get('https://api.salla.dev/admin/v2/products?page=' .$i);
            $Products = $response->object()->data;
            if (!$Products) break;
            foreach ($Products as $Pro) {
                Product::create([
                    'client_id' => $this->client_id,
                    'product_id' => $Pro->id , 
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


            // dd( 'Account is ' .$Counts);
            // dispatch(new GetProductsFroMSala($event->token , $event->clientId));#->delay(now()->addMinutes(2));            
        }
    }
}
