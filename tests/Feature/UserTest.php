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
        $Data = [
            "name" => "jksa altigani",
            "email" => "admin11@gmail.com",
            "password" => "123456789",
            "perms" => [
                "client",
                "users",
                "subscription",
            ]
        ];

        $User =\App\Models\User::first();
        $response = $this->actingAs($User, 'web')->post(route('admin.users.store'), $Data);
        $response->assertRedirect();
        // $response->assertSee('jksa altigani');
        // $response->assertSee('admin11@gmail.com');
    }
}
