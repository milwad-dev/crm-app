@component('mail::message')
# Your account activation code in {{ config('app.name') }}

This email has been sent to you due to your registration on the {{ config('app.name') }}. ** If you have not registered ** Ignore this email.

@component('mail::panel')
Your account activation code: {{ $code }}
@endcomponent

Thnaks,<br>
{{ config('app.name') }}
@endcomponent
