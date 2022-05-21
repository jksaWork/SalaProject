<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertDoesNotMatchRegularExpression;
use function PHPUnit\Framework\assertTrue;

class WebhookTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_subscription_web_hook_work_successfuly()
    {
        $FunctionName = 'GetFunctionTrain';

        $c = Client::create([
            'merchant_id' => '1234509876',
        ]);
        // dd($c);
        $this->assertDatabaseHas('clients', [
            'merchant_id' => '1234509876',
        ]);
        $Client = Client::where(['merchant_id' => '1234509876'])->exists();

        $data = [
            'client_id' => 1,
            'plan_period' => 1,
            'start_date' => "2021-11-09T21:00:00.000000Z",
            'end_date' => '2021-11-09T21:00:00.000000Z',
            'total' => "20.4",
            'plan_name' => "jkas-paln",
            'price'=>"20",
            'plan_type' => "test Plan",
            'merchant_id' => 1234509876,
        ];
        $PostData =
        [
            "event"=> "app.subscription.started",
            "merchant"=> 1234509876,
            "created_at"=> "2022-12-31 12:31:25",
            'data'=> $data,
        ];
        $res = $this->postJson('/webhock2',$PostData);
        $res->assertStatus(201);
        $res->assertSee("merchant_id");
        $res->assertSee("1234509876");
        $this->assertDatabaseHas('subscriptions', [
            'merchant_id' => '1234509876'
        ]);
    }


    public function test_order_create_web_hook_work_successfuly(){

    }

}
