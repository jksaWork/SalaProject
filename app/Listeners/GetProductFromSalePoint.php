<?php

namespace App\Listeners;

use App\Models\Client;
use App\Models\PosProducts;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use SoapClient;

class GetProductFromSalePoint
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
        $Client = Client::first();
        $posUsername = $Client->pos_email;
        info($posUsername); // must be #'info@dataked.com';
        $secret =$Client->pos_secret ;
        info($secret); //must be #'v35r#UhJgT$AJzN3BB';
        $signature = md5($posUsername . $secret);
        // SoapClient
        // dev https://www.ocstaging.net/webservice/OneCardPOSSystem.wsdl
        // prod https://www.netader.com/webservice/OneCardPOSSystem.wsdl
        $client = new SoapClient('https://www.netader.com/webservice/OneCardPOSSystem.wsdl');
        $params = array(
            'posUsername' => $posUsername,
            'signature' => $signature,
        );
        $response = $client->__soapCall('POSGetProductList', array($params));
        info('before_line.48');
        $Products = $response->productList->product;
        info($Products);
        foreach ($Products as $Product) {
            PosProducts::create([
                'client_id' => $event->clientId,
                "product_code" => $Product->productCode,
                "name" => json_encode(['ar' => $Product->nameAr , 'en' => $Product->nameEn]),
                "product_price" => $Product->productPrice,
                "product_currency" => $Product->productCurrency,
                "pos_price" => $Product->posPrice,
                "available" => $Product->available,
                "merchant_id" => $Product->merchantID,
                "merchant_name" => json_encode(['ar' => $Product->merchantNameEn, 'en' => $Product->merchantNameAr])
            ]);
        }
    }
}


/*

PosProducts::create([
                "product_code" => 'mohmmmed' ,
                "name" => json_encode(['ar' => 'sadsd' , 'en' => 'sads']),
                "product_price" => '2133',
                "product_currency" => 'sar',
                "pos_price" => '2131' ,
                "available" =>'true',
                "merchant_id" => 'sadsd',
                "merchant_name" => json_encode(['ar' => 'mohammed '])
            ]);

*/
