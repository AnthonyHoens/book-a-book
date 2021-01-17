<?php

namespace App\Listeners;

use App\Events\BookImgCreateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateBookImg
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BookImgCreateEvent  $event
     * @return void
     */
    public function handle(BookImgCreateEvent $event)
    {
        //
    }
}
