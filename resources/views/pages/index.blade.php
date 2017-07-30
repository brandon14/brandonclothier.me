@extends('layouts.base')

@php
  $title = 'Brandon Clothier | Resume Website';
  $author = 'Brandon Clothier';
  $description = 'The official website resume website of Brandon Clothier.';
  $keywords = 'resume, personal website, web developer, php, laravel';
@endphp

@section('prefix')
prefix="og: http://ogp.me/ns#"
@endsection

@section('meta')
<meta name="description" content="{{ $description }}" />
<meta name="author" content="{{ $author }}" />
<meta name="keywords" content="{{ $keywords }}" />
<link rel="license" href="{{ secure_url('/') }}/#copyright" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="canonical" href="{{ secure_url('/') }}" />
<base href="{{ secure_url('/') }}" target="_blank" />

<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('theme-color')
  <!-- Theme meta for Google Chrome on Android -->
  <meta name="theme-color" content="#212121">
@endsection

@section('social-media-meta')
<!-- Facebook OpenGraph meta -->
<meta property="og:url" content="{{ secure_url('/') }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $title }}" />
<meta property="og:description" content="{{ $description }}" />
<meta property="og:image" content="{{ secure_asset('/images/profile-large.png') }}" />

<!-- Twitter meta -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@inhal3exh4le" />
<meta name="twitter:creator" content="@inhal3exh4le" />

<!-- Dublin Core meta -->
<meta name="DC.title" content="{{ $title }}">
<meta name="DC.description" content="{{ $description }}">
<meta name="DC.type" content="text">
<meta name="DC.subject" content="{{ $keywords }}">
<meta name="DC.language" content="{{ config('app.locale') }}">
<meta name="DC.publisher" content="{{ $author }}">
<meta name="DC.contributor" content="{{ $author }}">
<meta name="DC.coverage" content="Kentucky, USA 2017{{ intval(date('Y')) > 2017 ? '-'.date('Y') : '' }}">

<!-- G+ author link -->
<link rel="author" href="https://plus.google.com/u/0/+BrandonClothier"/>

<!-- Structured Data -->
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Person",
    "name": "{{ $author }}",
    "gender": "Male",
    "email": "mailto:brandon14125@gmail.com",
    "jobTitle": "Web Developer",
    "image": "{{ secure_asset('images/profile-small.png') }}",
    "url": "{{ secure_url('/') }}",
    "sameAs": [
      "https://www.facebook.com/brandon14125",
      "https://plus.google.com/+BrandonClothier",
      "https://www.instagram.com/b_randon14",
      "https://twitter.com/inhal3exh4le",
      "https://brandon14125.tumblr.com/",
      "https://www.linkedin.com/in/brandon-clothier-16190b123"
    ]
  }
</script>
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "WebSite",
    "name": "brandonclothier.me",
    "alternateName": "{{ $description }}",
    "url": "{{ secure_url('/') }}"
  }
</script>
@endsection

@section('title', $title)

@push('stylesheets')
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('body-id', 'page-top')
@section('data-spy')
  data-spy="scroll"
@endsection
@section('data-target')
  data-target=".navbar-fixed-top"
@endsection
@section('data-offset')
  data-offset="77"
@endsection

@section('content')
  <div class="cr cr-top cr-right cr-sticky cr-blue hidden-xs">
    <a href="https://github.com/brandon14/brandonclothier.me" target="_blank">Visit me on <i class="fa fa-github" aria-hidden="true"></i></a>
  </div>
  <button id="scroll-top" class="btn btn-raised btn-circle scroll-top-btn" data-spy="affix" data-offset-top="150">
    <span class="glyphicon glyphicon glyphicon-chevron-up"></span>
  </button>
  @includeIf('partials.header')

  @includeIf('pages.sections.landing')

  <div class="container">
    @includeIf('pages.sections.about')
    @includeIf('pages.sections.resume')
    @includeIf('pages.sections.contact')
  </div>

  @includeIf('partials.footer')

  @push('scripts')
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js"></script>

    @if(config('app.env') === 'production')
      @includeIf('partials.social-media-js')
    @endif
  @endpush
@endsection
