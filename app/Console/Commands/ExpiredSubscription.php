<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;

class ExpiredSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ExpiredSubscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        echo "command to get Subscription Is Runnig  ... \n";
        $subscription = Subscription::with('Client')->get();
        foreach ($subscription as $subscrip) {
            // you are gooing good -------------

            $unixDate = Carbon::parse($subscrip->end_date);
            $nowDate = Carbon::now();
            $Cond  = $nowDate->gt($unixDate);
            if ($Cond) {
                echo "Deleted \n";
                $subscrip->Client->update(['sub_expired' => 0]);
                $subscrip->delete();
            }
        }
        echo "command Is Ended ... \n";
    }
}
