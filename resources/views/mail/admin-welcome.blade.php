<x-mail::message>
# Welcome {{$name}},

The body of your message.

<x-mail::panel>
You account password is : {{$password}}
</x-mail::panel>

<x-mail::button :url="''" color="success">
Open Dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
