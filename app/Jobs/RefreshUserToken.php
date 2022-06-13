<?php

namespace App\Jobs;

use App\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Salla\OAuth2\Client\Provider\Salla;

class RefreshUserToken implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $provider;
    public $clientId;
    public function __construct($clientId)
    {
        $this->clientId =  $clientId;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client =  Client::find($this->clientId);
        $provider = new Salla([
            'clientId'     =>   '321c9c607655a619a3de84cc171b4365' , #'c5e26ae228c097732386852c0194ade7', // The client ID assigned to you by Salla
            'clientSecret' =>  '65976caae352444b8c304ca5e0b991d8' ,  #'470e3ce6a091ce4a43fe30be1792313c', // The client password assigned to you by Salla
            //'clientId'     =>   'c5e26ae228c097732386852c0194ade7' , #'c5e26ae228c097732386852c0194ade7', // The client ID assigned to you by Salla
            //'clientSecret' =>  '470e3ce6a091ce4a43fe30be1792313c' ,  #'470e3ce6a091ce4a43fe30be1792313c', // The client password assigned to you by Salla
            // 'redirectUri'  => 'https://dev.sala.gulfsmo.net/webhock' , // the url for current page in your service
        ]);

        $token = $provider->getAccessToken('refresh_token', ['refresh_token' => $client->refresh_token]);

        $client->update(
            [
                'access_token' => $token->getToken(),
                'refresh_token' => $token->getRefreshToken(),
                'expired_date' => $token->getExpires(),
            ]
        );
    }
}
