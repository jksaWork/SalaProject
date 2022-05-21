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
        // for dev -----------------------------
        $provider = new Salla([
            'clientId'     =>   'c5e26ae228c097732386852c0194ade7' , #'c5e26ae228c097732386852c0194ade7', // The client ID assigned to you by Salla
            'clientSecret' =>  '470e3ce6a091ce4a43fe30be1792313c' ,  #'470e3ce6a091ce4a43fe30be1792313c', // The client password assigned to you by Salla
            'redirectUri'  => 'https://dev.sala.gulfsmo.net/webhock' , // the url for current page in your service
        ]);
        // for prodction  --------------------------
        // $provider = new Salla([
        //     'clientId'     =>   '321c9c607655a619a3de84cc171b4365' , #'c5e26ae228c097732386852c0194ade7', // The client ID assigned to you by Salla
        //     'clientSecret' =>  '65976caae352444b8c304ca5e0b991d8' ,  #'470e3ce6a091ce4a43fe30be1792313c', // The client password assigned to you by Salla
        //     'redirectUri'  => 'https://sala.gulfsmo.net/webhock' , // the url for current page in your service
        // ]);
        if (!isset($_GET['code']) || empty($_GET['code'])) {
            // If we don't have an authorization code then get one
            $authUrl = $provider->getAuthorizationUrl([
                'scope' => 'offline_access',
                //Important: If you want to generate the refresh token, set this value as offline_access
            ]);
            header('Location: ' . $authUrl);
            exit;
        }

        // Try to obtain an access token by utilizing the authorisations code grant.
        try {
            $token = $provider->getAccessToken('authorization_code', [
                'code' => $_GET['code']
            ]);
            /** @var \Salla\OAuth2\Client\Provider\SallaUser $user */
            // jksa altigani osma
            $user = $provider->getResourceOwner($token);
            // info($user->toArray()['id']);
            $Client_json = json_encode($user->toArray());
            $Client = Client::updateOrCreate(
                ['merchant_id' => $user->toArray()['id']],
                [
                'access_token' =>$token->getToken() ,
                'refresh_token' => $token->getRefreshToken() ,
                'name' => $user->getName() ,
                'email' => $user->getEmail(),
                'mobile' => $user->getMobile(),
                'expired_date' => $token->getExpires(),
                'client_json' => $Client_json,
            ]);
            /*
            * @var update Or Create Example -------------------
            $Client = Client::updateOrCreate(
                ['merchant_id' => '12'],
                [
                'access_token' => 'jksaaltigani12',
                'refresh_token' => 'mohammed altigani' ,
                'name' => 'mohammed altigani',
                'email' => 'inline blcok',
                'mobile' => 'jka',
            ]);
            */
            event(new NewCleintInitApp($token->getToken() , $Client->id));
            return redirect()->to('https://s.salla.sa/apps');
        } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
            // Failed to get the access token or merchant details.
            // show a error message to the merchant with good UI
            exit($e->getMessage());
        }catch(Exception $e){
            return $e;
        }
    }
}
