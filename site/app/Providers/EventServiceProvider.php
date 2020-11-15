<?php

namespace App\Providers;

use App\Events\AddBookToOrderEvent;
use App\Events\DeleteBookToOrderEvent;
use App\Events\ModifyOrderEvent;
use App\Events\NewUserEvent;
use App\Events\RegistrationEvent;
use App\Events\UpdateBookToOrderEvent;
use App\Listeners\AddBookInHistory;
use App\Listeners\AddNewUserInHistory;
use App\Listeners\AddRowToHistory;
use App\Listeners\DeleteBookInHistory;
use App\Listeners\OrderModification;
use App\Listeners\UpdateBookInHistory;
use App\Listeners\UpdatePriceInOrder;
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
        AddBookToOrderEvent::class => [
            UpdatePriceInOrder::class,
            AddBookInHistory::class,
        ],
        UpdateBookToOrderEvent::class => [
            UpdatePriceInOrder::class,
            UpdateBookInHistory::class,
        ],
        DeleteBookToOrderEvent::class => [
            UpdatePriceInOrder::class,
            DeleteBookInHistory::class,
        ],
        NewUserEvent::class => [
            AddNewUserInHistory::class,
        ],
        'App\Events\UpdateAccountEvent' => [
            'App\Listeners\UpdateUserInHistory',
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
