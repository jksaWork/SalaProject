<?php
namespace App\Helpers;
use Salla\OAuth2\Client\Provider\Salla;

class SalaClass {
    public $provider;
    public function __construct()
    {
        $this->provider = new Salla([
            'clientId'     => '{client-id}', // The client ID assigned to you by Salla
            'clientSecret' => '{client-secret}', // The client password assigned to you by Salla
            'redirectUri'  => 'https://yourservice.com/callback_url', // the url for current page in your service
        ]);
    }
}
