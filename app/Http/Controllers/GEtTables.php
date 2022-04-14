<?php

namespace App\Http\Controllers;
use App\Events\OrderCreatedWebHock;

use App\Models\PointOfSaleEqualSalaProduct;
use App\Models\PosProducts;
use App\Models\Product;
use Illuminate\Http\Request;

class GEtTables extends Controller
{
    public function products()
    {
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
        $Products = Product::where("type" , "codes")->paginate(20);
        $PosProducts = PosProducts::get();

        return view('ProductCode', compact('Products', 'PosProducts'));
    }

    public function FirestCode()
    {

        $PosProducts = PointOfSaleEqualSalaProduct::get();
$data="";
        foreach($PosProducts as $PosProduct )
        {
            
            event(new OrderCreatedWebHock($PosProduct->sala_product_id));
            info($PosProduct->sala_product_id );

        }

        return true;

    }


    public function getblance(){

        $FinalResponse = [];
        $SecretNumbers = [];
        $posUsername = $Client->pos_email;
        $secret = $Client->pos_server_key;
        $CountIteration = $Client->pos_products_count;
        $signature = md5($posUsername  .$secret);
        // info([$posUsername , $secret , $CountIteration ,$signature ]);
        info('be fore foreache');
        for ($i=0; $i < $CountIteration ; $i++) {
            $terminalId =random_int(0 , 10000);
            $trxRefNumber = $terminalId . "" . time();

            $client = new SoapClient('https://www.netader.com/webservice/OneCardPOSSystem.wsdl');
            $params = array(
                'posUsername'=>$posUsername,
                'signature'=>$signature,
                );
            $myXMLData = $client->__soapCall('POSCheckBalance', array($params));
            // dd([$myXMLData , $Code]);
            return $myXMLData;
           
        }

    }




    public function Productprint()
    {


        $Products = \DB::select("SELECT * from sala_products where  product_id  in( select sala_product_id from point_of_sale_equal_sala_products ) ");
        $notFoundProducts = \DB::select("SELECT * from sala_products where  product_id  not in ( select sala_product_id from point_of_sale_equal_sala_products )  and type='codes'");

        
  $PosProducts = PosProducts::get();
        return view('welcome', compact('Products', 'PosProducts','notFoundProducts'));
    }
    public function ProductCodeStore(Request $request)
    {
        // return $request;
        PointOfSaleEqualSalaProduct::create([
            'botagate_product_code' => $request->ProductCode,
            'sala_product_id' => $request->product_id,
        ]);
        return redirect()->back();
    }
}
