<!--
/**
 * Created by PhpStorm.
 * User: arthm
 * Date: 8/20/2018
 * Time: 10:02 AM
 */-->
@component('mail::message')
    @component('mail::panel')
        {{ $organization->org_name }}, You have a new Request for account creation under your organization. Please
        visit your profile, and under the Requests tab accept or deny the request.
    @endcomponent

    Thank You,
    {{ config('app.name') }} Team
@endcomponent
