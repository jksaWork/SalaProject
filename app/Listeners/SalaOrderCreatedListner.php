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
        $posUsername = 'info@dataked.com';
        $secret = 'v35r#UhJgT$AJzN3BB';
        $signature = md5($posUsername . $secret);
        $productCode ='3176';
        $terminalId ='307598';
        $trxRefNumber = $terminalId + time();
        $client = new SoapClient('https://www.ocstaging.net/webservice/OneCardPOSSystem.wsdl');

        $params = array(
        	'posUsername'=>$posUsername,
        	'productCode'=>$productCode,
        	'signature'=>$signature,
        	'terminalId'=>$terminalId,
        	'trxRefNumber'=>$trxRefNumber
        	);
        $myXMLData = $client->__soapCall('POSPurchaseProduct', array($params));
        echo "<pre>";
        echo var_dump($myXMLData);
        echo "<pre>";



    }
}
