var PageFunctions = (function() {
  // Cache the DOM
  var $darkOverlay = $('.dark-overlay');

  var $navbarToggle = $('.navbar-toggle');
  var $navbarItems = $('#navbar-items > li > a');
  var $navbarBrand = $('.navbar-brand');

  var $offCanvasToggle = $('[data-toggle="offcanvas"]');
  var $offCanvasRow = $('.row-offcanvas');

  var $tabDataToggle = $('a[data-toggle="tab"]');

  var $levelBar = $('.level-bar-inner');

  var $name = $('#name');
  var $email = $('#email');
  var $message = $('#message');
  var $sendEmail = $("#send-email");

  var $html = $('html');
  // End DOM caching

  // Basic initialization
  // Go to the latest tab, if it exists:
  var lastTab = localStorage.getItem('lastTab');
  if (lastTab) {
    var tab = $('[href="' + lastTab + '"]').tab('show');
    $navbarBrand.text($(tab).text());
  }

  // Set the progressbar widths to 0
  $levelBar.css('width', '0');
  // End init

  // Bind events
  // Collapse navbar on select
  $(document).on('click', '.navbar-collapse.in', _hideOverlayOnSelect);

  // Save the last selected tab to the local storage
  $tabDataToggle.on('shown.bs.tab', _showLastTab);

  // Change the brand name on navbar item select
  $navbarItems.on('click', _setNavbarBrandText);

  // Scroll to the top on navbar item select
  $navbarItems.on('click', _scrollToTop);

  // Off canvas toggle
  $offCanvasToggle.on('click', _offCanvasToggle);

  $(window).on('load', _animateProgressBars);

  // Function to show the dark overlay whenever the navmenu is expanded
  $navbarToggle.on('click', _toggleOverlay);
  // End event binding
  
  function _hideOverlayOnSelect(e) {
    if( $(e.target).is('a') && $(e.target).attr('class') !== 'navbar-toggle') {
      $(this).collapse('hide');
      if ($darkOverlay.is(':visible')) {
        $darkOverlay.hide();
        $html.removeClass('no-scroll');
      }
    }
  }

  function _animateProgressBars() {
    $levelBar.each(_animateProgressBar);
  }

  function _animateProgressBar() {
    var itemWidth = $(this).data('level');

    $(this).animate({width: itemWidth}, 800);
  }
  
  function _toggleOverlay() {
    $darkOverlay.toggle();
    $html.toggleClass('no-scroll');
  }

  function _offCanvasToggle() {
    $offCanvasRow.toggleClass('active');
  }

  function _setNavbarBrandText() {
    $navbarBrand.text($(this).text());
  }

  function _showLastTab() {
    localStorage.setItem('lastTab', $(this).attr('href'));
  }

  function _scrollToTop() {
    console.log('Scrolling to top');
    scrollTo(0, 0);
  }
})();