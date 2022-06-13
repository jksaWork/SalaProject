<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Client;
use App\Notifications\TickitCreated;
use App\Notifications\OrderDoneSuccessfuly;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Notifications\Notification as NotificationsNotification;

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
        $notification = new \App\Notifications\LowBlance(2);
        $content = $notification->toMail($user)->render();
        $this->assertStringContainsString('your Salla blance is', $content);
        $notification = $user->notify($notification);
        Notification::assertSentTo($user, \App\Notifications\LowBlance::class);
    }


    public function test_notification_tikit_create_send_on_tickit_create()
    {
        $this->withoutExceptionHandling();
        Notification::fake();
        $user = User::first();
        $client = Client::first();
        $data = [
            'topic_selected' => 1,
            'subject' => 'jksa altigani subject',
        ];

        $res1 = $this->actingAs($client, 'client')->get(route('ticket.create'));
        $res1->assertStatus(200);

        $res1->assertSee(__('translation.topic'));
        $res1->assertSee(__('translation.subject'));
        $res = $this->actingAs($client, 'client')->post(route('ticket.store'), $data);

        $res->assertRedirect();
        Notification::assertSentTo($client, TickitCreated::class);
        $res3 = $this->actingAs($client, 'client')->get(route('technical.support'));
        $res3->assertStatus(200);
        $res3->assertSee('jksa altigani subject');
    }
}
