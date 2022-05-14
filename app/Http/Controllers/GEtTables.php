<?php

namespace App\Http\Controllers;

use App\Events\OrderCreatedWebHock;
use App\Models\Client;
use App\Models\PointOfSaleEqualSalaProduct;
use App\Models\PosProducts;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


use SoapClient;

class GEtTables extends Controller
{
    public function products()
    {
        // dd(auth()->user()->id);
        $Products = Product::all();
        return view('Product', compact('Products'));
    }
    public function PosProducts()
    {
        $Products = PosProducts::all();
        return view('PosProducts', compact('Products'));
    }

    public function ProductCode()
    {
        $Products = Product::where("type", "codes")->paginate(20);
        $PosProducts = PosProducts::get();

        return view('ProductCode', compact('Products', 'PosProducts'));
    }

    public function Productscode()
    {
        $Products = Product::where("type", "codes")->paginate(20);
        $PosProducts = PosProducts::get();

        return view('Admin.SallaProduct.index', compact('Products', 'PosProducts'));
    }


    public function FirestCode()
    {

        $PosProducts = PointOfSaleEqualSalaProduct::get();
        $data = "";
        foreach ($PosProducts as $PosProduct) {
            //   event(new OrderCreatedWebHock($PosProduct->sala_product_id));
            info($PosProduct->sala_product_id);
        }
        return true;
    }


    public function getblance()
    {
        $Client = Client::find(auth()->user()->id);
        $FinalResponse = [];
        $SecretNumbers = [];
        $posUsername = $Client->pos_email;
        $secret = $Client->pos_secret;
        $CountIteration = $Client->pos_products_count;
        // return $Client->pos_secret;
        $signature = md5($posUsername  . $secret);
        // info([$posUsername , $secret , $CountIteration ,$signature ]);
        info('be fore foreache');

        $terminalId = random_int(0, 10000);
        $trxRefNumber = $terminalId . "" . time();

        $client = new SoapClient('https://www.netader.com/webservice/OneCardPOSSystem.wsdl');
        $params = array(
            'posUsername' => $posUsername,
            'signature' => $signature,
        );
        $myXMLData = $client->__soapCall('POSCheckBalance', array($params));
        // dd([$myXMLData , $Code]);
        return $myXMLData;
    }





    public function Productprint()
    {
        $Products = DB::select("SELECT * from sala_products where  product_id  in( select sala_product_id from point_of_sale_equal_sala_products ) ");
        $notFoundProducts = DB::select("SELECT * from sala_products where  product_id  not in ( select sala_product_id from point_of_sale_equal_sala_products )  and type='codes'");
        $PosProducts = PosProducts::get();
        return view('welcome', compact('Products', 'PosProducts', 'notFoundProducts'));
    }
    public function ProductCodeStore(Request $request)
    {
        // return $request;
        // return
        PointOfSaleEqualSalaProduct::updateOrCreate(
            ['botagate_product_code' => $request->ProductCode],
            ['sala_product_id' => $request->product_id],
        );
        return redirect()->back();
    }


    public function ProductStore(Request $request)
    {
        // return $request;
        // return
        PointOfSaleEqualSalaProduct::updateOrCreate(
            ['botagate_product_code' => $request->ProductCode],
            ['sala_product_id' => $request->product_id],
        );
        return redirect()->back();
    }


    public function GetOneProdectFromPosToSalla(Request $request)
    {

        try {
            // init envairoment  -----------------
            info('from SalaOrderCreateListgertn');
            $Code = $request->POSCode;
            $ProductId = $request->product_id;
            $Client = Client::find(auth()->user()->id);
            $Token = $Client->access_token;
            $Url = "https://api.salla.dev/admin/v2/products/{$ProductId}/digital-codes";


            // old code and Workin successfuly  -------------------
            $FinalResponse = [];
            $SecretNumbers = [];
            $posUsername = $Client->pos_email;
            $secret = $Client->pos_secret;
            $CountIteration = $request->quabitiy;
            $signature = md5($posUsername . $Code . $secret);
            info('be fore foreache');
            for ($i = 0; $i < $CountIteration; $i++) {
                $terminalId = random_int(0, 10000);
                $trxRefNumber = $terminalId . "" . time();
                $client = new SoapClient('https://www.netader.com/webservice/OneCardPOSSystem.wsdl');
                $params = array(
                    'posUsername' => $posUsername,
                    'productCode' => $Code,
                    'signature' => $signature,
                    'terminalId' => $terminalId,
                    'trxRefNumber' => $trxRefNumber
                );
                $myXMLData = $client->__soapCall('POSPurchaseProduct', array($params));
                // dd([$myXMLData , $Code]);
                $FinalResponse[] =  $myXMLData;
                $SecretNumbers[] = $myXMLData->secret;
                info($SecretNumbers);
                info('affter foreach');
            }
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $Token,
                'Accept' => 'Application/json',
            ])->post($Url, ['codes' => $SecretNumbers]);
            // New Code TO Get Product Quantity Code  -------TEST-------
            $ProdcutUrl = "https://api.salla.dev/admin/v2/products/{$ProductId}";
            $requestToGetQunantity = Http::withHeaders([
                'Authorization' => 'Bearer ' . $Token,
                'Accept' => 'Application/json',
            ])->get($ProdcutUrl);
            // update Quantity
            $newQuantity = $requestToGetQunantity->object()->data->quantity;
            Product::where('product_id', $ProductId)->update(['quantity' => $newQuantity]);
            return redirect()->back();
        } catch (Exception $e) {
            return $e;
        }
    }
}
