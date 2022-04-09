<?php

namespace App\Listeners;

use App\Models\PointOfSaleEqualSalaProduct;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
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
        $SecretNumbers = [];
        $Token = 'WlQr7CX5deEPmfLOIaGF4ZMNX11gMVTgV_ftyKdzYtU.1AcFdmOQPm3vnuJ87KPNTI4BNcXccCZd1hsEzHJKIfo';
        for ($i=0; $i < 5 ; $i++) {
            $posUsername = 'info@dataked.com';
            $secret = 'v35r#UhJgT$AJzN3BB';
            $productCode ='3176';
            $signature = md5($posUsername . $productCode .$secret);
            $terminalId =random_int(0 , 10000);
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
            $SecretNumbers[] = $myXMLData->secret;
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $Token,
            'Accept' => 'Application/json',
        ])->post("https://api.salla.dev/admin/v2
        /products/" . $event->ProductId. "/digital-codes" ,
        [
            'codes' =>$SecretNumbers,
        ]
        );
        dd([$FinalResponse , $SecretNumbers , $response,  'sended Succesffuly']);
    }
}
