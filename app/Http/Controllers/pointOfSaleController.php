<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;

class pointOfSaleController extends Controller
{
    public function index()
    {
        $posUsername = 'info@dataked.com';
        $secret = 'v35r#UhJgT$AJzN3BB';
        $signature = md5($posUsername . $secret);
        // dd($signature);
        // SoapClient
        $client = new SoapClient('https://www.ocstaging.net/webservice/OneCardPOSSystem.wsdl');

        $params = array(
            'posUsername' => $posUsername,
            'signature' => $signature,
        );

        $myXMLData = $client->__soapCall('refillAccount', array($params));

        echo "<pre>";
        echo var_dump($myXMLData);
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
        echo var_dump($myXMLData);
        echo "<pre>";
    }
}
