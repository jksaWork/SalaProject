<?php

namespace App\Listeners;

use App\Models\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ByOrderByDashboardListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    { }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        info('from SalaOrderCreateListgertn');
        $Code = $event->botagaty;
        $ProductId = $event->SallProduct;
        $Client = Client::find(auth()->user()->id);
        $Token = $Client->access_token;
        // dd($Code, $ProductId, $Client, $Token);
        $ProductUrl = "https://api.salla.dev/admin/v2/products/{$ProductId}";
        $ProductUrlReponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $Token,
            'Accept' => 'Application/json',
        ])->get($ProductUrl);
        $Url = "https://api.salla.dev/admin/v2/products/{$ProductId}/digital-codes"; //updated Oroduct 
        // dd($Url);
        $posUsername = $Client->pos_email;
        $secret = $Client->pos_secret;
        $CountIteration =  $event->quantity;

        $signature = md5($posUsername . $Code . $secret);
        // info([$posUsername , $secret , $CountIteration ,$signature ]);
        info('Be For Pruchess');
        // PruchesProduct Function Purche The Product And return The Code gat It
        $SecretNumbers = $this->PruchesProducts($CountIteration, $posUsername, $Code, $signature);
        // info($SecretNumbers);
        info('affter Pruchess');
        try {
            $this->SaveTheOprationInOrderHistory($ProductId, $SecretNumbers, $Client->id);
        } catch (\Throwable $th) {
            // Go Jksa Altigani Osman Inline Jksa Altigani
        }
        info('------------Codes-------------' . date('y-m-d h:i:s'));
        info($SecretNumbers);
        info('------------End Codes --------' . date('y-m-d h:i:s'));
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $Token,
            'Accept' => 'Application/json',
        ])->post($Url, ['codes' => $SecretNumbers]);
    }



    public function PruchesProducts($CountIteration, $posUsername, $Code, $signature)
    {
        $FinalResponse = [];
        $SecretNumbers = [];
        for ($i = 0; $i < $CountIteration; $i++) {
            $terminalId = random_int(0, 10000);
            $trxRefNumber = $terminalId . "" . time();
            // dev https://www.ocstaging.net/webservice/OneCardPOSSystem.wsdl
            // prod https://www.netader.com/webservice/OneCardPOSSystem.wsdl
            $client = new SoapClient('https://www.netader.com/webservice/OneCardPOSSystem.wsdl');
            $params = array(
                'posUsername'  =>  $posUsername,
                'productCode'  => $Code,
                'signature'    => $signature,
                'terminalId'   => $terminalId,
                'trxRefNumber' => $trxRefNumber
            );
            $myXMLData = $client->__soapCall('POSPurchaseProduct', array($params));
            $FinalResponse[] =  $myXMLData;
            $SecretNumbers[] = $myXMLData->secret;
        }
        info($FinalResponse);
        info($SecretNumbers);
        return  $SecretNumbers;
    }

    public function SaveTheOprationInOrderHistory($ProductId, $SecretNumbers, $id)
    {
        OrderHistory::create([
            'product_id' => $ProductId,
            'product_name' => 'product name',
            'history_code' => json_encode($SecretNumbers),
            'client_id' => $id,
        ]);
    }
}
