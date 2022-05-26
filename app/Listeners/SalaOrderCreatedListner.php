<?php
namespace App\Listeners;
use App\Models\Client;
use App\Models\OrderHistory;
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
        $Client = Client::find(auth()->user()->name);
        $Token = $Client->access_token;
        dd($Code ,$ProductId ,$Client , $Token);
        $ProductUrl = "https://api.salla.dev/admin/v2/products/{$ProductId}";
        $ProductUrlReponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $Token,
            'Accept' => 'Application/json',
        ])->get($ProductUrl);
        $Quantity = $ProductUrlReponse->object()->data->quantity;
        if($Quantity  == 0){
            $Url = "https://api.salla.dev/admin/v2/products/{$ProductId}/digital-codes";
        // dd($Url);
        $posUsername = $Client->pos_email;
        $secret = $Client->pos_secret;
        $CountIteration = $Client->pos_products_count;
        $signature = md5($posUsername . $Code .$secret);
        // info([$posUsername , $secret , $CountIteration ,$signature ]);
        info('Be For Pruchess');
        // PruchesProduct Function Purche The Product And return The Code gat It
        $SecretNumbers = $this->PruchesProducts($CountIteration ,$posUsername ,$Code, $signature);
        // info($SecretNumbers);
        info('affter Pruchess');
        try {
            $this->SaveTheOprationInOrderHistory($ProductId , $SecretNumbers);
        } catch (\Throwable $th) {
            // Go Jksa Altigani Osman Inline Jksa Altigani
        }
        info('------------codes-------------' . date('y-m-d h:i:s'));
        info($SecretNumbers);
        info('------------End Codes --------' . date('y-m-d h:i:s'));
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $Token,
            'Accept' => 'Application/json',
        ])->post($Url,['codes' => $SecretNumbers]);
        UserLog(json_encode($SecretNumbers) , 'logo');
        }

    }


     /**
     * Show the form for editing the specified resource.
     * @param  CountIteration count of product to purches
     * @param  posUsername To Use In Credianles
     * @param  Code Product Code In Point Of Sale
     * @param  signature to Approve  Credials
     * @return SecretNumbers witch id prucehs sccuessfly
     */
    public function PruchesProducts($CountIteration ,$posUsername ,$Code, $signature){
        $FinalResponse = [];
        $SecretNumbers = [];
        for ($i=0; $i < $CountIteration ; $i++) {
            $terminalId =random_int(0 , 10000);
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

    public function SaveTheOprationInOrderHistory($ProductId  , $SecretNumbers){
        OrderHistory::create([
            'product_id' => $ProductId,
            'product_name' => 'product name',
            'history_code' => json_encode($SecretNumbers),
            'client_id' => 1,
        ]);
    }
}
