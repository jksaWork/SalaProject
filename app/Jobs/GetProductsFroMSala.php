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
    public function __construct($token)
    {
        // dd($token);
        $this->token = $token;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Http
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->token, 
            'Accept' => 'Application/json', 
        ])->
        get('https://stoplight.io/mocks/salla/merchant/68673/products?per_page=10');
        $Counts = $response->object()->pagination->count;
        dd( 'Account is ' .$Counts);
        for ($i = 0; $i < $Counts; $i++) {
            $response = Http::get('https://stoplight.io/mocks/salla/merchant/68673/products?per_page=10');
            $Products = $response->object()->data;
            if(!$Products) break;
            foreach ($Products as $Pro) {
                Product::create([
                    'client_id' => $this->client_id,
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
