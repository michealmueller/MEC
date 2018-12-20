<?php

namespace App\Listeners;

use App\Events\newUser;
use App\Mail\newUserMail;
use App\Organization;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class newUserListener
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
     * @param  newUser  $event
     * @return void
     */
    public function handle(newUser $event)
    {
        //
        Mail::to($event->user)->send(new newUserMail($event->organization));
    }
}
