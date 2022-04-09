<?php

namespace App\Listeners;

use App\Models\PointOfSaleEqualSalaProduct;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use SoapClient;

class SalaOrderCreatedListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // dd('jksa');
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // dd('jksa');
        $FinalResponse = [];
        for ($i=0; $i < 5 ; $i++) {
            $posUsername = 'info@dataked.com';
            $secret = 'v35r#UhJgT$AJzN3BB';
            $productCode ='3176';
            $signature = md5($posUsername . $productCode .$secret);
            $terminalId ='307598';
            $trxRefNumber = $terminalId . "" . time();
            $client = new SoapClient('https://www.ocstaging.net/webservice/OneCardPOSSystem.wsdl');
            $params = array(
                'posUsername'=>$posUsername,
                'productCode'=>$productCode,
                'signature'=>$signature,
                'terminalId'=>$terminalId,
                'trxRefNumber'=>$trxRefNumber
                );
            $myXMLData = $client->__soapCall('POSPurchaseProduct', array($params));
            $FinalResponse[] =  $myXMLData;
        }
        dd($FinalResponse);
    }
}
