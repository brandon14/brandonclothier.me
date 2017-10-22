@component('mail::message')
CT Report Email<br />
<strong>Date:</strong> {{ date('F jS, Y') }} at {{ date('h:i:s A T') }}<br />
<br />
<strong>Report:</strong>
@component('mail::panel')
```json
@json($report, JSON_PRETTY_PRINT)
@endcomponent

Copyright {{ date('Y') }} {{ config('app.name') }}
@endcomponent
