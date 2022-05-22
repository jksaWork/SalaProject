<?php

namespace Database\Seeders;

use App\Models\OrderHistory;
use App\Models\OrganizationProfile;
use App\Models\Permissions;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' =>'Test Admin',
            'email' => 'admin@gmail.com',
            'password' =>bcrypt('123456'),
        ]);
        $Codes = ['123123', '123123' , '12312' , 'mohamme' , 'hd3' , 'mohammed' , 'mohammed'];
        \App\Models\OrderHistory::create(
            [
                'product_id' => 123123,
                'product_name' => 'mohammed altignai',
                'history_code' => json_encode($Codes),
            ]
            );
            Topic::create(['topicname'=> 'topic 1']);
            OrganizationProfile::create([
                'name' => 'Sall & Point f sala',
                'logo' => 'logo/logo.svg',
            ]);

        $roles = [
            'client',
            'users',
            'subscription',
            'support',
            'setting',
        ];
        Permissions::create([
            'user_id' => 1,
            'roles' => json_encode($roles),
        ]);
    }
}
