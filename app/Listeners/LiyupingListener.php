<?php

namespace App\Listeners;

use App\Events\LiyupingEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LiyupingListener implements ShouldQueue
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
     * @param  LiyupingEvent  $event
     * @return void
     */
    public function handle(LiyupingEvent $event)
    {
        //
        //echo "test event";
    }
}
