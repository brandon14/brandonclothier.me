@extends('main')

@section('prefix')
prefix="og: http://ogp.me/ns#"
@endsection

@section('meta')
<meta name="description"           content="The official website resume website of Brandon Clothier." />
<meta name="author"                content="Brandon Clothier" />
<meta name="keywords"              content="resume, personal website, web developer, php, laravel" />
<link rel="copyright"              href="#copyright" />
<link rel="icon"                   href="favicon.ico" type="image/x-icon" />
@endsection

@section('theme-color')
  <!-- Theme meta for Google Chrome on Android -->
<meta name="theme-color"           content="#212121">
@endsection

@section('social-media-meta')
<!-- Facebook OpenGraph meta -->
<meta property="og:url"            content="https://brandonclothier.me" />
<meta property="og:type"           content="website" />
<meta property="og:title"          content="Brandon Clothier" />
<meta property="og:description"    content="The official website resume website of Brandon Clothier." />
<meta property="og:image"          content="https://brandonclothier.me/images/logo-large.png" />

<!-- Twitter meta -->
<meta name="twitter:card"          content="summary" />
<meta name="twitter:site"          content="@inhal3exh4le" />
<meta name="twitter:creator"       content="@inhal3exh4le" />

<!-- Dublin Core meta -->
<meta name="DC.title" content="Brandon Clothier | Resume Website">
<meta name="DC.description" content="The official website resume website of Brandon Clothier.">
<meta name="DC.type" content="text">
<meta name="DC.subject" content="Resume, Personal Website">
<meta name="DC.language" content="{{ config('app.locale') }}">
<meta name="DC.publisher" content="Brandon Clothier">
<meta name="DC.contibutor" content="Brandon Clothier">
<meta name="DC.coverage" content="Kentucky, USA 2017{{ date('Y') > 2017 ? '-'.date('Y') : '' }}">

<!-- G+ author link -->
<link rel=”author”                 href=”https://plus.google.com/u/0/+BrandonClothier”/>
@endsection

@section('title', 'Brandon Clothier | Resume Website')

@section('body')
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="75" itemscope itemtype="http://schema.org/Person">
  @includeIf('components.header')
  @includeIf('sections.landing')
  <div class="container">
    @includeIf('sections.about')
    @includeIf('sections.resume')
    @includeIf('sections.contact')
  </div>
  @includeIf('components.footer')
  @includeIf('components.app-js')
</body>
@endsection
