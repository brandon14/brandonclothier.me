<!doctype html>
<html lang="{{ config('app.locale') }}" @yield('prefix', '')>
  <head>
    <!-- General meta-data -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport"              content="width=device-width, initial-scale=1" />
    @yield('meta', '')

    @yield('theme-color', '')

    @yield('social-media-meta', '')

    <!-- Google site verification -->
    <meta name="google-site-verification" content="IgeOtYawyBKAdF-WPySo9h_O2AL489RQlUxE4XFRqAE" />

    <title>@yield('title', config('app.name'))</title>

    @includeIf('components.app-css')

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
  @yield('body', '<body></body>')
</html>
