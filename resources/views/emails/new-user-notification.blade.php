<x-mail::message>
# New User Registration

A new user has registered on your platform.

## User Details

**Name:** {{ $user->name }}  
**Email:** {{ $user->email }}  
**Registered At:** {{ $user->created_at->format('F d, Y \a\t h:i A') }}

<x-mail::button :url="url('/admin/users')">
View User
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
