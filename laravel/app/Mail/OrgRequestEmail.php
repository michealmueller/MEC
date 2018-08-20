<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrgRequestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $organization;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $organization)
    {
        //
        $this->user = $user;
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
            ->markdown('emails.orgrequestemail')
            ->with('user', $this->user)
            ->with('organization', $this->organization);
    }
}
