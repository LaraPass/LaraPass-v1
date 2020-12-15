@component('mail::message')
# Dear {{ auth()->user()->name }},

This is an automated notification to inform you the accounts in your vault have been recently decrypted & exported. If you are not the one that performed this action, login to your {{ \Setting::get('app_name') }} account and change your password immediately. Also be sure to activate 2-Step authentication if you haven't already.

Regards,
<br>The {{ \Setting::get('app_name') }} Team
@endcomponent 
