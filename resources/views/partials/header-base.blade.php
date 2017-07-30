<header>
  <!-- Navbar -->
  <nav id="navbar" class="navbar navbar-fixed-top navbar-default" data-spy="affix" data-offset-top="150">
    <div class="container">
      <!-- Navbar header -->
      <div class="navbar-header page-scroll">
        <a class="navbar-brand page-scroll" href="@yield('brand-url', '#page-top')">@yield('brand-title', 'brandonclothier.me')</a>
        @yield('collapse-button', '')
      </div>
      <!-- End navbar header -->
      @yield('navbar-items', '')
    </div>
  </nav>
</header>
