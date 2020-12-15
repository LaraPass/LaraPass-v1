@component('mail::message')
# Dear {{ auth()->user()->name }},

Your {{ \Setting::get('app_name') }} account is no longer marked for deletion. Your account and all associated entities will remain active.

If you are not the one that cancelled the deletion, log-in to your {{ \Setting::get('app_name') }} account change your account password.

> **Account Deletion Cancelled On** : {{ \Carbon\Carbon::Now() }}

This is an automated message. Do not reply to it. If you have any issues, feel free to get in touch with our Support Department.

Regards,
<br>The {{ \Setting::get('app_name') }} Team
@endcomponent 
