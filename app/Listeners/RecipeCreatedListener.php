<?php

namespace App\Listeners;

use App\Events\RecipeCreatedEvent;
use App\Mail\RecipeStored;
use App\Recipe;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class RecipeCreatedListener
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
     * @param  RecipeCreatedEvent  $event
     * @return void
     */
    public function handle(RecipeCreatedEvent $event)
    {
        \Mail::to('maxmk978@gmail.com')->send(new RecipeStored($event->recipe));
    }
}
