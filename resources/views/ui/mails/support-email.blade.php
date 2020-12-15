@component('mail::message')
# Hello!

You just received a Support Request on {{ config('app.name') }}

> **Username:** {{ auth()->user()->username }}<br>
> **User Email:** {{ auth()->user()->email }}<br>
> **Type:** {{ $type }}<br>
> **Subject:** {{ $subject }}<br>
> **Message:** {{ $message }}

This message was sent using the in-build system. Contact the user directly to resolve their issue.c

Regards,<br>{{ config('app.name') }}
@endcomponent 
