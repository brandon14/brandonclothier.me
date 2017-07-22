@extends('partials.footer-base')

@section('share-buttons')
  @if(config('app.env') === 'production')
    <div class="share-buttons">
      <!-- Facebook root div -->
      <div id="fb-root"></div>
      <!-- Facebook share button -->
      <div class="fb-share-button" data-href="https://brandonclothier.me/" data-layout="button_count"
        data-mobile-iframe="true">
        <a class="fb-xfbml-parse-ignore" target="_blank"
          href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"></a>
      </div>
      <!-- Twitter button -->
      <div class="twitter-button">
        <a class="twitter-share-button"
          href="https://twitter.com/intent/tweet?text=brandonclothier.me%20is%20an%20awesome%20website!"></a>
      </div>
      <!-- Google+ button -->
      <div class="g-plusone" data-size="medium" data-href="https://brandonclothier.me"></div>
      <!-- Pinterest save button -->
      <div class="pinterest-button">
        <a data-pin-do="buttonBookmark" data-pin-save="true" href="https://www.pinterest.com/pin/create/button/"></a>
      </div>
    </div>
  @endif
@endsection

@section('follow-buttons')
  @if(config('app.env') === 'production')
    <!-- Twitter follow button -->
    <div class="twitter-follow">
      <a class="twitter-follow-button" href="https://twitter.com/inhal3exh4le"></a>
    </div>
    <!-- Google follow button -->
    <div class="google-follow">
      <div class="g-follow" data-annotation="bubble" data-height="20" data-href="//plus.google.com/u/0/105418902459110698510" data-rel="author"></div>
    </div>
  @endif
@endsection
