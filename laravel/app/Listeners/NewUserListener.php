<?php

namespace App\Listeners;

use App\Events\NewRegistration;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class NewUserListener implements ShouldQueue
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
     * @param  NewUser  $event
     * @return void
     */
    public function handle(NewRegistration $event)
    {
        //send the email with verification information
        Mail::to($event->user)->send(new VerificationEmail($event->user));
    }
}
