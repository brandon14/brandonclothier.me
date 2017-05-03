<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" prefix="og: http://ogp.me/ns#">
  <head>
    <!-- General meta-data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"              content="width=device-width, initial-scale=1">
    <meta name="description"           content="The official website of Brandon Clothier.">
    <meta name="author"                content="Brandon Clothier">
    <link rel="copyright"              href="#copyright">
    <link rel="icon"                   href="favicon.ico" type="image/x-icon" />

    <!-- Theme meta for Google Chrome on Android -->
    <meta name="theme-color"           content="#212121">

    <!-- Facebook OpenGraph meta -->
    <meta property="og:url"            content="https://brandonclothier.me" />
    <meta property="og:type"           content="website" />
    <meta property="og:title"          content="Brandon Clothier" />
    <meta property="og:description"    content="A website about me!" />
    <meta property="og:image"          content="https://brandonclothier.me/images/logo-large.png" />

    <!-- Twitter meta -->
    <meta name="twitter:card"          content="summary" />
    <meta name="twitter:site"          content="@inhal3exh4le" />
    <meta name="twitter:creator"       content="@inhal3exh4le" />

    <!-- Google site verification -->
    <meta name="google-site-verification" content="IgeOtYawyBKAdF-WPySo9h_O2AL489RQlUxE4XFRqAE" />

    <title>@yield('title')</title>

    @include('components.app-css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
      window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
      ]) !!};
    </script>
  </head>
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="75">
    @include('components.header')
    @yield('content')
    @include('components.footer')
    @include('components.app-js')
  </body>
</html>
