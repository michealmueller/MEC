@component('mail::message')
    Welcome to CitizenWarfare, Thank You for Registering at <a href="https://citizenwarfare.com" target="_blank">Citizenwarfare</a>

@component('mail::panel')
If you have a questions check out our <a href="https://citizenwarfare.com/faq" target="_blank">F.A.Q</a>, otherwise you can reach support <a href="Mailto:support@citizenwarfare.com">support@citizenwarfare.com</a>
@endcomponent


Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
