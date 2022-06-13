<?php

namespace App\Providers;

use App\Events\NewCleintInitApp;
use App\Events\SalaOrderCreated;
use App\Events\getProductFromPOS;
use App\Jobs\GetProductsFroMSala;
use App\Events\BuyOrderByDashboard;
use App\Events\OrderCreatedWebHock;
use App\Listeners\ByOrderByDashboardListner;
use App\Listeners\ByOrderByDashboardListner2;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\GetProductFromSalePoint;
use App\Listeners\NewCleintInitAppListner;
use App\Listeners\SalaOrderCreatedListner;
use App\Listeners\OrderCreatedWebHockListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
            // GetProductFromSalePoint::class,
            NewCleintInitAppListner::class,
        ],
        SalaOrderCreated::class => [
            SalaOrderCreatedListner::class
        ],
        OrderCreatedWebHock::class => [
            OrderCreatedWebHockListener::class
        ],
        getProductFromPOS::class => [
            GetProductFromSalePoint::class,
        ],
        BuyOrderByDashboard::class => [
            ByOrderByDashboardListner::class,
            // ByOrderByDashboardListner2::class,
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
