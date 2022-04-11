<?php

namespace App\Listeners;

use App\Models\Client;
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
        info('from SalaOrderCreateListgertn');
        $Code = $event->POSCode;
        $ProductId = $event->ProductId;
        $Client = Client::orderBy('id' , 'DESC')->first();
        $Token = $Client->access_token;
        $ProductUrl = "https://api.salla.dev/admin/v2/products/{$ProductId}";
        $ProductUrlReponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $Token,
            'Accept' => 'Application/json',
        ])->get($ProductUrl);
        $Quantity = $ProductUrlReponse->object()->data->quantity;
        if($Quantity  == 0){
            $Url = "https://api.salla.dev/admin/v2/products/{$ProductId}/digital-codes";        
        // dd($Url);
        $FinalResponse = [];
        $SecretNumbers = [];
        $posUsername = $Client->pos_email;
        $secret = $Client->pos_server_key;
        $CountIteration = $Client->pos_products_count;
        $signature = md5($posUsername . $Code .$secret);
        // info([$posUsername , $secret , $CountIteration ,$signature ]);
        info('be fore foreache');
        for ($i=0; $i < $CountIteration ; $i++) {
            $terminalId =random_int(0 , 10000);
            $trxRefNumber = $terminalId . "" . time();
            $client = new SoapClient('https://www.ocstaging.net/webservice/OneCardPOSSystem.wsdl');
            $params = array(
                'posUsername'=>$posUsername,
                'productCode'=>$Code,
                'signature'=>$signature,
                'terminalId'=>$terminalId,
                'trxRefNumber'=>$trxRefNumber
                );
            $myXMLData = $client->__soapCall('POSPurchaseProduct', array($params));
            // dd([$myXMLData , $Code]);
            $FinalResponse[] =  $myXMLData;
            $SecretNumbers[] = $myXMLData->secret;
        }
        info('affter foreach');
        // $Data = json_encode(['codes' => $SecretNumbers]);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $Token,
            'Accept' => 'Application/json',
        ])->post($Url,['codes' => $SecretNumbers]);
        dd([$FinalResponse , $SecretNumbers , $response,  'sended Succesffuly']);
        }
        dd($Quantity);
    }
}
