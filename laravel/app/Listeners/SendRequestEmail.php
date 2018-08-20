<?php

namespace App\Listeners;

use App\Events\OrganizationRequest;
use App\Mail\OrgRequestEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRequestEmail
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
     * @param  OrganizationRequest  $event
     * @return void
     */
    public function handle(OrganizationRequest $event)
    {
        //
        \Mail::to($event->user)->send(new OrgRequestEmail($event->user, $event->organization));
    }
}
