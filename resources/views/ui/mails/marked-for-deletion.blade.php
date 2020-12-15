@component('mail::message')
# Dear {{ auth()->user()->name }},

Your {{ \Setting::get('app_name') }} account has been marked for deletion and will be permanantly deleted in {{ \Carbon\Carbon::parse(auth()->user()->delete_on)->diffForHumans() }}.

If you are not the one that marked it for deletion, log-in to your {{ \Setting::get('app_name') }} account and cancel deletion from your profile settings immediately. Also be sure to change your account and email password aswell.

<strong>Note:</strong> Once the grace period is over, all associated accounts and files will be destroyed from our server. No trace of your account or profile will exist.

> **Date of Deletion** : {{ \Carbon\Carbon::parse(auth()->user()->delete_on)->format('Y-m-d H:i:m') }}

This is an automated message. Do not reply to it. If you have any issues, feel free to get in touch with our Support Department.

Regards,
<br>The {{ \Setting::get('app_name') }} Team
@endcomponent 
