@component('mail::message')
    @component('mail::panel')
        {{ $user->username }}, Your Request has been approved!
        You can Login and create events now!
    @endcomponent

    Thank You,
    {{ config('app.name') }} Team
@endcomponent