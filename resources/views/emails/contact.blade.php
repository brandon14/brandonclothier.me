@component('mail::message')
# You have a contact email!
## Name: {{ $name or 'Default' }}
## Email: {{ $email or 'test@test.com' }}
## Date: {{ date('F jS, Y') }} at {{ date('h:i:s A T') }}

## Message:
@component('mail::panel')
{{ $message or 'No message' }}
@endcomponent

Copyright {{ date('Y') }} {{ config('app.name') }}
@endcomponent
