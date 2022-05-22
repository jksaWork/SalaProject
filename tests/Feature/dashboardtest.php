<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class dashboardtest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_dashboard_card()
    {
        $response = $this->get(route('admin.dashboard'));

        $response->assertStatus(200);
    }
}
