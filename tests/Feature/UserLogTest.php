<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_log_function()
    {
        UserLog('["jksa altigani oosamn"]' , 'log');
        $this->assertDatabaseHas('client_logs' , [
            'content' => '["jksa altigani oosamn"]',
        ]);
    }
}
