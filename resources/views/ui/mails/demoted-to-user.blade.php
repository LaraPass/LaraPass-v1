@component('mail::message')
# Dear {{ $name }},

This is an automated notification from the {{ \Setting::get('app_name') }} to inform you that you have been demoted to USER Status by {{ $admin }} on {{ \Carbon\Carbon::now() }}. You no longer have access to Admin Settings.

Regards,
<br>The {{ \Setting::get('app_name') }} Team
@endcomponent 
