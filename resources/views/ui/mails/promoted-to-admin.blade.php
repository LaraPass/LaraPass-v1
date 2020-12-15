@component('mail::message')
# Dear {{ $name }},

This is an automated notification from the {{ \Setting::get('app_name') }} to inform you that you have been promoted to ADMIN Status by {{ $admin }} on {{ \Carbon\Carbon::now() }}. You now have access to all Admin Settings and Features.

Regards,
<br>The {{ \Setting::get('app_name') }} Team
@endcomponent 
