@component('mail::message')
# Dear {{ $name }},

This is an automated notification to inform you that your {{ \Setting::get('app_name') }} account associated with the Email ID ({{ $email }}) has been permanantly deleted on {{ \Carbon\Carbon::now() }}. All your data and information has been purged from our servers. We are sad to see your go but have high hopes of having you back again soon.

Regards,
<br>The {{ \Setting::get('app_name') }} Team
@endcomponent 
