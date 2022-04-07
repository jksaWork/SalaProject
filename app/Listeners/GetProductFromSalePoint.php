<?php

namespace App\Listeners;

use App\Models\PosProducts;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use SoapClient;

class GetProductFromSalePoint implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // dd('cood from here');
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $posUsername = 'info@dataked.com';
        $secret = 'v35r#UhJgT$AJzN3BB';
        $signature = md5($posUsername . $secret);
        // SoapClient
        $client = new SoapClient('https://www.ocstaging.net/webservice/OneCardPOSSystem.wsdl');
        $params = array(
            'posUsername' => $posUsername,
            'signature' => $signature,
        );
        $response = $client->__soapCall('POSGetProductList', array($params));
        $Products = $response->productList->product;
        // dd($Products);
        foreach ($Products as $Product) {
            PosProducts::create([
                "product_code" => $Product->productCode,
                "name" => json_encode(['ar' => $Product->nameAr , 'en' => $Product->nameEn]),
                "product_price" => $Product->productPrice,
                "product_currency" => $Product->productCurrency,
                "pos_price" => $Product->productCurrency,
                "available" => $Product->available,
                "merchant_id" => $Product->merchantID,
                "merchant_name" => json_encode(['ar' => $Product->merchantNameEn, 'en' => $Product->merchantNameAr])
            ]);
        }
    }
}