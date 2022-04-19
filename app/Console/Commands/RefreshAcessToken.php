<?php

namespace App\Console\Commands;

use App\Jobs\RefreshUserToken;
use App\Models\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RefreshAcessToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:refreshToekn';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'refresh Token To User';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo 'Start Refrshing Task ..';
        $Clients = DB::select('SELECT id , UNIX_TIMESTAMP() as toDay , expired_date FROM `clients`');
        // dd($Clients);
        foreach($Clients as $Client){
            if($Client->toDay > $Client->expired_date) dispatch(new RefreshUserToken($Client->id));
        }
        echo 'End Refrshing Task';
    }
}
