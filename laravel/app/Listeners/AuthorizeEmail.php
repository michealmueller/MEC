<?php

namespace App\Listeners;

use App\Mail\AuthorizationEmail;
use App\Events\AuthorizeRequest;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AuthorizeEmail
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
     * @param  AuthorizeRequest  $event
     * @return void
     */
    public function handle(AuthorizeRequest $event)
    {
        //
        \Mail::to($event->user)->send(new AuthorizationEmail($event->user));
    }
}
