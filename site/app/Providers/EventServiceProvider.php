<?php

namespace App\Providers;

use App\Events\AddBookToOrderEvent;
use App\Events\BookImgCreateEvent;
use App\Events\CreateOrderEvent;
use App\Events\DeleteBookToOrderEvent;
use App\Events\DeleteOrderEvent;
use App\Events\ModifyOrderEvent;
use App\Events\NewUserEvent;
use App\Events\ProfileImgCreateEvent;
use App\Events\RegistrationEvent;
use App\Events\UpdateBookToOrderEvent;
use App\Events\UpdateOrderEvent;
use App\Events\UpdateOrderStatutEvent;
use App\Listeners\AddBookInHistory;
use App\Listeners\AddNewUserInHistory;
use App\Listeners\AddRowToHistory;
use App\Listeners\CreateBookImg;
use App\Listeners\CreateOrderInHistory;
use App\Listeners\CreateProfileImg;
use App\Listeners\CreateUserInHistory;
use App\Listeners\DeleteBookInHistory;
use App\Listeners\DeleteOrderInHistory;
use App\Listeners\NewUserSendAdminMail;
use App\Listeners\NewUserSendAdminNotification;
use App\Listeners\OrderCompleteInHistory;
use App\Listeners\OrderCompleteSendAdminMail;
use App\Listeners\OrderCompleteSendAdminNotification;
use App\Listeners\OrderModification;
use App\Listeners\UpdateBookInHistory;
use App\Listeners\UpdateOrderStatut;
use App\Listeners\UpdateOrderStatutHistory;
use App\Listeners\UpdateOrderStatutMail;
use App\Listeners\UpdateOrderStatutNotification;
use App\Listeners\UpdatePriceInOrder;
use App\Listeners\WaitingPaymentNotification;
use GuzzleHttp\Promise\Create;
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
        ProfileImgCreateEvent::class => [
            CreateProfileImg::class,
        ],
        BookImgCreateEvent::class => [
            CreateBookImg::class,
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
            CreateUserInHistory::class,
            NewUserSendAdminNotification::class,
            NewUserSendAdminMail::class,
        ],
        UpdateOrderEvent::class => [
            OrderCompleteSendAdminNotification::class,
            OrderCompleteInHistory::class,
            WaitingPaymentNotification::class,
            OrderCompleteSendAdminMail::class,
        ],
        DeleteOrderEvent::class => [
            DeleteOrderInHistory::class,
        ],
        CreateOrderEvent::class => [
            CreateOrderInHistory::class,
        ],
        UpdateOrderStatutEvent::class => [
            UpdateOrderStatutNotification::class,
            UpdateOrderStatutHistory::class,
            UpdateOrderStatutMail::class,
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
