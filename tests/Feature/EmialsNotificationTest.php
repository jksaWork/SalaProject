<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\User;
use App\Notifications\OrderDoneSuccessfuly;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class EmialsNotificationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_notifiy_new_tikit_email()
    {
        Notification::fake();
        $user = User::first();
        $notification = new OrderDoneSuccessfuly(['jksa', '23', '123S']);
        $content = $notification->toMail($user)->render();
        $this->assertStringContainsString('See The Codes' , $content);
        $notification = $user->notify($notification);
        Notification::assertSentTo($user , OrderDoneSuccessfuly::class);
    }

    public function test_notification_tikit_create_send_on_tickit_create(){
        Notification::fake();
        $user = User::first();
        $client = Client::first();
        $data = [
            'topic_id' => 1,
            'subject' => 'jksa altigani',
        ];
        $res = $this->actingAs($client, 'client')->post(route('ticket.store'), $data);

        // dd($res);
        // $res->assertRedirect();
        // $res->assertStatus(200);
    }
}
