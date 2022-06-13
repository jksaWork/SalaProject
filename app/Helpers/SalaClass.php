<?php
namespace App\Helpers;
use Salla\OAuth2\Client\Provider\Salla;

class SalaClass {
    public $provider;
    public function __construct()
    {
        $this->provider = new Salla([
            'clientId'     => 'c5e26ae228c097732386852c0194ade7', // The client ID assigned to you by Salla
            'clientSecret' => '470e3ce6a091ce4a43fe30be1792313c', // The client password assigned to you by Salla
            'redirectUri'  => 'https://dev.faster.themsc.net', // the url for current page in your service
        ]);
    }
}
