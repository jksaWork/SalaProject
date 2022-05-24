<?php

namespace Tests\Feature;

use App\Http\Controllers\OrgnazationProfile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;


class UserTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_add_new_user_from_admin_and_re_check_it_in_admin_table()
    {
        $this->seed();

        $Data = [
            "name" => "jksa altigani",
            "email" => "admin@gmail.com",
            "password" => "123456789",
            "perms" => [
                "client",
                "users",
                "subscription",
            ]
        ];

        $User =\App\Models\User::create([
            'name' =>'Test Admin',
            'email' => 'testadmin@gmail.com',
            'password' =>bcrypt('123456'),
        ]);

        $response = $this->actingAs($User, 'web')->post(route('admin.users.store'), $Data);
        $response->assertSee('jksa altigani');
        $response->assertSee('admin@gmail.com');
        $response->assertSee('users');
        $response->assertSee('User Mangement');
    }


    public function test_localization_work_successfuley(){
        $this->seed();
        $Data = [
            "name" => "jksa altigani",
            "email" => "admin@gmail.com",
            "password" => "123456789",
            "perms" => [
                "client",
                "users",
                "subscription",
            ]
        ];

        \App\Models\OrganizationProfile::create([
            'name' => 'Sall & Point f sala',
            'logo' => 'logo/logo.svg',
        ]);
        $User =\App\Models\User::create([
            'name' =>'Test Admin',
            'email' => 'testadmin@gmail.com',
            'password' =>bcrypt('123456'),
        ]);
        $response = $this->actingAs($User, 'web')->get(route('admin.technical.support'));
        $response->assertStatus(200);

    }
}
