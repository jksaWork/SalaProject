<?php

namespace App\Providers;

use App\Events\NewCleintInitApp;
use App\Events\SalaOrderCreated;
use App\Jobs\GetProductsFroMSala;
use App\Listeners\GetProductFromSalePoint;
use App\Listeners\NewCleintInitAppListner;
use App\Listeners\SalaOrderCreatedListner;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewCleintInitApp::class => [
            GetProductFromSalePoint::class,
            NewCleintInitAppListner::class,
        ],
          SalaOrderCreated::class => [
            SalaOrderCreatedListner::class
         ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
