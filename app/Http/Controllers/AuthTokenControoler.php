<?php

namespace App\Http\Controllers;

use App\Helpers\SalaClass;
use Exception;
use Illuminate\Http\Request;

class AuthTokenControoler extends Controller
{
    public function getTokenWithCode(Request $request){
        $SalaInstance  = new SalaClass;
        // $SalaInstance->provider
        try {
            $token = $SalaInstance->provider->getAccessToken('authorization_code', [
                'code' => $_GET['code']
            ]);

            //
            // ## Access Token
            //
            // You should store the access token
            // which may use in authenticated requests against the Salla's API
            echo 'Access Token: '.$token->getToken()."<br>";

            //
            // ## Refresh Token
            //
            // You should store the refresh token in somewhere in your system because the access token expired after 14 days
            // so you can use the refresh token after that to generate an new access token without ask any access from the merchant
            //
            // $token = $provider->getAccessToken(new RefreshToken(), ['refresh_token' => $token->getRefreshToken()]);
            //
            echo 'Refresh Token: '.$token->getRefreshToken()."<br>";

            //
            // ## Expire date
            //
            // This help you to know when the access token will expired
            // so before that date you should generate a new access token using the refresh token
            echo 'Expire Date : '.$token->getExpires()."<br>";
        }catch(\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e){
            $e->getMessage();
        }
    }
}
