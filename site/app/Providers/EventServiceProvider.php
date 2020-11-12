<?php

namespace App\Providers;

use App\Events\AddBookToOrder;
use App\Events\ModifyOrderEvent;
use App\Listeners\AddRowToHistory;
use App\Listeners\OrderModification;
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
        AddBookToOrder::class => [
            AddRowToHistory::class,
        ],
        ModifyOrderEvent::class => [
            OrderModification::class,
        ],
        'App\Events\ModifyAccountEvent' => [
            'App\Listeners\AccountModificationHistory',
        ],
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
