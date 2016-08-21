var PageFunctions = (function() {
  // Cache the DOM
  var $darkOverlay = $('.dark-overlay');
  var $navbarItems = $('#navbar-items > li > a');
  var $navbarBrand = $('.navbar-brand');
  var $offCanvasToggle = $('[data-toggle="offcanvas"]');
  var $offCanvasRow = $('.row-offcanvas');
  var $tabDataToggle = $('a[data-toggle="tab"]');
  var $levelBar = $('.level-bar-inner');
  var $navbarToggle = $('.navbar-toggle');
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
  $(document).on('click', '.navbar-collapse.in', function(e) {
    if( $(e.target).is('a') && $(e.target).attr('class') !== 'navbar-toggle') {
      $(this).collapse('hide');
      if ($darkOverlay.is(':visible')) {
        $darkOverlay.hide();
      }
    }
  });

  // Save the last selected tab to the local storage
  $tabDataToggle.on('shown.bs.tab', function (e) {
    localStorage.setItem('lastTab', $(this).attr('href'));
  });

  // Change the brand name on navbar item select
  $navbarItems.on('click', function() {
    $navbarBrand.text($(this).text());
  });

  // Off canvas toggle
  $offCanvasToggle.on('click', function () {
    $offCanvasRow.toggleClass('active')
  });

  $(window).on('load', function() {
    $levelBar.each(function() {
      var itemWidth = $(this).data('level');

      $(this).animate({
        width: itemWidth
      }, 800);
    });
  });

  // Function to show the dark overlay whenever the navmenu is expanded
  $navbarToggle.on('click', function() {
    $darkOverlay.toggle();
  });
  // End event binding
})();