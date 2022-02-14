@component('mail::message')
# Your account password recovery code in {{ config('app.name') }}

This email has been sent to you at your request to recover the password on the website. ** If this request was not made by you ** Ignore this email.

@component('mail::panel')
Your password recovery code: {{ $code }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
