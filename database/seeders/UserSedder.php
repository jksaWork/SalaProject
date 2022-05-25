<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Subscription;
use Illuminate\Database\Seeder;

class UserSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //     for ($i=0; $i <40 ; $i++) {
    //         Client::create([
    //             'merchant_id' => $i ,
    //             'created_at' => \Carbon\Carbon::now()->subDays($i),
    //         ]);
    //     }
        for ($i=0; $i < 40 ; $i++) {
            Subscription::create([
                'merchant_id' => $i ,
                'created_at' => \Carbon\Carbon::now()->subDays($i),
            ]);
        }
    }
}
