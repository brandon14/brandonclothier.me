<!doctype html>
<html lang="{{ config('app.locale') }}" @yield('prefix', '')>
  <head>
    <!-- General meta-data -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="@yield('favicon', manifest_asset('images/favicon.png'))" type="image/x-icon" />
    @yield('meta', '')

    @yield('theme-color', '')

    @yield('social-media-meta', '')

    @if(config('app.env') === 'production')
      <!-- Google site verification -->
      <meta name="google-site-verification" content="IgeOtYawyBKAdF-WPySo9h_O2AL489RQlUxE4XFRqAE" />

      <!-- Bing site verification -->
      <meta name="msvalidate.01" content="7CDE65628F07986372F78CECD79ED32A" />

      <!-- Pinterest site verification -->
      <meta name="p:domain_verify" content="b5787839fd0a4aa494bd04b4bc379e09" />
    @endif

    <title>@yield('title', config('app.name'))</title>

    @stack('stylesheets')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="@yield('body-id', 'page-top')" @yield('data-spy', '') @yield('data-target', '') @yield('data-offset', '')>
    @yield('content', '')
    @stack('scripts')
  </body>
</html>
