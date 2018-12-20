<?php

namespace App\Mail;

use App\Organization;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class newUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $organization;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Organization $organization)
    {
        //
        $this->organization = $organization;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('support@citizenwarfare.com')
                    ->markdown('emails.newUserEmail')
                    ->with('user', $this->organization);
    }
}
