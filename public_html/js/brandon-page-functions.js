// Collapse navbar  on select
$(document).on('click', '.navbar-collapse.in', function(e) {
  if( $(e.target).is('a') && $(e.target).attr('class') !== 'navbar-toggle') {
    $(this).collapse('hide');
    if ($('.dark-overlay').is(':visible')) {
      $('.dark-overlay').hide();
    }
  }
});

// Change the brand name on navbar item select
$('#navbar-items > li > a').on('click', function() {
  $('.navbar-brand').text($(this).text());
});

// Off canvas toggle
$('[data-toggle="offcanvas"]').click(function () {
  $('.row-offcanvas').toggleClass('active')
});

// Function to store the lat visited tab and select it upon page revisit
$(function() { 
    // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        // save the latest tab; use cookies if you like 'em better:
        localStorage.setItem('lastTab', $(this).attr('href'));
    });

    // go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
        var tab = $('[href="' + lastTab + '"]').tab('show');
        $('.navbar-brand').text($(tab).text());
    }
});

// Function to populate and animate the skill progress bars
$(function() {
  $('.level-bar-inner').css('width', '0');

  $(window).on('load', function() {
    $('.level-bar-inner').each(function() {
      var itemWidth = $(this).data('level');

      $(this).animate({
        width: itemWidth
      }, 800);
    });
  });
});

// Function to show the dark overlay whenever the navmenu is expanded
$('.navbar-toggle').on('click', function() {
  $('.dark-overlay').toggle();
});