<x-mail::message>
# You’ve been invited to join {{ $team->name }}

Click the link below to accept the invitation!

<x-mail::button :url="$url">
Accept invitation
</x-mail::button>

This link will expire in **3 days**.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>