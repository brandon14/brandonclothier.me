@component('mail::message')
You have a contact email!<br />
<strong>Name:</strong> {{ $name or 'Default' }}<br />
<strong>Email:</strong> {{ $email or 'test@test.com' }}<br />
<strong>Date:</strong> {{ date('F jS, Y') }} at {{ date('h:i:s A T') }}<br />
<br />
<strong>Message:</strong>
@component('mail::panel')
{{ $message or 'No message' }}
@endcomponent

Copyright {{ date('Y') }} {{ config('app.name') }}
@endcomponent
