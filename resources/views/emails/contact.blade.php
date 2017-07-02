@component('mail::message')
You have a contact email!<br />
<strong>Name:</strong> {{ $name ? $name : 'Default' }}<br />
<strong>Email:</strong> {{ $email ? $email : 'test@test.com' }}<br />
<strong>Date:</strong> {{ date('F jS, Y') }} at {{ date('h:i:s A T') }}<br />
<br />
<strong>Message:</strong>
@component('mail::panel')
{{ $message ? $message : 'No message' }}
@endcomponent

Copyright {{ date('Y') }} {{ config('app.name') }}
@endcomponent
