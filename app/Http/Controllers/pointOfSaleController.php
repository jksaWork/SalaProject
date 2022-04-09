<?php

namespace App\Http\Controllers;

use App\Events\NewCleintInitApp;
use App\Events\SalaOrderCreated;
use Illuminate\Http\Request;
use SoapClient;

class pointOfSaleController extends Controller
{
    public function index()
    {
        event(new NewCleintInitApp('token' , 'id'));
        $posUsername = 'info@dataked.com';
        $secret = 'v35r#UhJgT$AJzN3BB';
        $signature = md5($posUsername . $secret);

        $client = new SoapClient('https://www.ocstaging.net/webservice/OneCardPOSSystem.wsdl');
        $params = array(
            'posUsername' => $posUsername,
            'signature' => $signature,
        );
        $myXMLData = $client->__soapCall('POSGetProductList', array($params));

        echo "<pre>";
        dd($myXMLData);
        echo "<pre>";
    }

    public function Products()
    {
        $posUsername = "info@dataked.com";
        $signature = 'v35r#UhJgT$AJzN3BB';
        $client = new SoapClient('https://www.ocstaging.net/webservice/OneCardPOSSystem.wsdl');
        $params = array(
            'posUsername' => $posUsername,
            'signature' => $signature
        );
        $myXMLData = $client->__soapCall('POSGetProductIDRequest', array($params));

        echo "<pre>";
         dd($myXMLData);
        echo "<pre>";
    }

    public function pay(){
        event(new SalaOrderCreated('jksa'));

    }
}
