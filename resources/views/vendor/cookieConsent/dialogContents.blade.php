<!-- Cookie consent dialog and message -->
<div class="alert alert-info alert-dismissable js-cookie-consent cookie-consent" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <span class="cookie-consent__message">
    {!! trans('cookieConsent::texts.message') !!}
  </span>

  <button class="btn btn-sm btn-link js-cookie-consent-agree cookie-consent__agree">
    {{ trans('cookieConsent::texts.agree') }}
  </button>
</div>
