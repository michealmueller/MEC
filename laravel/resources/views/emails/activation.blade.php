@component('mail::message')
    Thank You for Registering at <a href="https://events.citizenwarfare.com">M.E.C</a>, {{ $user->email }}

@component('mail::panel')
To verify you're account you need to click the button below, then you will be able to login.
    @component('mail::button', ['url' => 'https://events.citizenwarfare.com/verify/'.$user->hash.'/'.$user->id])
        Verify You're Account Now!
    @endcomponent
@endcomponent


Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
