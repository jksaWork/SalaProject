<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LocalizationTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_locacleization_work_good()
    {
        // $this->seed();
        $text = 'الدعم الفني';
        $User =\App\Models\User::first();
        $response = $this->actingAs($User, 'web')->get('/admin/ticket-support');
        $response->assertStatus(200);
        $response->assertSee("Technical_Support"); 
        app()->setLocale('ar');
        $response = $this->actingAs($User, 'web')->get('/admin/ticket-support');
        $response->assertStatus(200);
        $response->assertSee('الدعم الفني');
    }
}
