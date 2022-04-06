<?php

namespace App\Http\Controllers;

use App\Events\NewCleintInitApp;
use App\Helpers\SalaClass;
use App\Models\Client;
use Exception;
use Illuminate\Http\Request;
use Salla\OAuth2\Client\Provider\Salla;

class AuthTokenControoler extends Controller
{
    public function  getTokenWithCode(Request $req)
    {
        // info($req);
        $provider = new Salla([
            'clientId'     => 'c5e26ae228c097732386852c0194ade7', // The client ID assigned to you by Salla
            'clientSecret' => '470e3ce6a091ce4a43fe30be1792313c', // The client password assigned to you by Salla
            'redirectUri'  => 'https://sala.themsc.net/webhock', // the url for current page in your service
        ]);

        // if (!isset($_GET['code']) || empty($_GET['code'])) {
        //     // If we don't have an authorization code then get one
        //     $authUrl = $provider->getAuthorizationUrl([
        //         'scope' => 'offline_access',
        //         //Important: If you want to generate the refresh token, set this value as offline_access
        //     ]);

        //     header('Location: ' . $authUrl);
        //     exit;
        // }

        // Try to obtain an access token by utilizing the authorisations code grant.
        try {
            // $token = $provider->getAccessToken('authorization_code', [
            //     'code' => $_GET['code']
            // ]);

            //
            // ## Access Token
            //
            // You should store the access token
            // which may use in authenticated requests against the Salla's API
            // echo 'Access Token: ' . $token->getToken() . "<br>";

            //
            // ## Refresh Token
            //
            // You should store the refresh token somewhere in your system because the access token expired after 14 days
            // so you can use the refresh token after that to generate a new access token without asking any access from the merchant
            //
            // $token = $provider->getAccessToken(new RefreshToken(), ['refresh_token' => $token->getRefreshToken()]);
            //
            // echo 'Refresh Token: ' . $token->getRefreshToken() . "<br>";

            //
            // ## Expire date
            //
            // This helps you to know when the access token will be expired
            // so before that date, you should generate a new access token using the refresh token
            // echo 'Expire Date : ' . $token->getExpires() . "<br>";

            //
            // ## Merchant Details
            //
            // Using the access token, we may look up details about the merchant.
            // --- Same request in Curl ---
            // curl --request GET --url 'https://accounts.salla.sa/oauth2/user/info' --header 'Authorization: Bearer <access-token>'

            /** @var \Salla\OAuth2\Client\Provider\SallaUser $user */
            // jksa altigani osman
            // $user = $provider->getResourceOwner($token);
            // // dd([$user , $user['data']]);
            // Client::create([
            //     'access_token' =>$token->getToken() ,
            //     'refresh_token' => $token->getRefreshToken() ,
            //     'name' => $user->getName() ,
            //     'email' => 'example.php',
            //     'mobile' => '0915477450',
            // ]);

            event(new NewCleintInitApp('asdas'));#$token->getToken()));
            // header('Location: https://s.salla.sa/apps');
        
        $response = $provider->fetchResource(
                'GET',
                'https://api.salla.dev/admin/v2/orders',
                $token->getToken()
            );
            
        } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
            // Failed to get the access token or merchant details.
            // show a error message to the merchant with good UI
            exit($e->getMessage());
        }
    }

    
}
