(function(jQuery, ajax) {
  "use strict";
  // ********** DOM Caching ********** //
  var $darkOverlay = jQuery('.dark-overlay');

  var $navbarToggle = jQuery('.navbar-toggle');
  var $navbarItems = jQuery('#navbar-items > li > a');
  var $navbarBrand = jQuery('.navbar-brand');

  var $offCanvasToggle = jQuery('[data-toggle="offcanvas"]');
  var $offCanvasRow = jQuery('.row-offcanvas');

  var $levelBar = jQuery('.level-bar-inner');

  var $contactForm = jQuery('#contact-form');
  var $name = jQuery('#name');
  var $email = jQuery('#email');
  var $message = jQuery('#email-message');

  var $html = jQuery('html');
  // ********** DOM Caching ********** //

  // ********** Basic initialization ********** //
  // Set the progressbar widths to 0
  $levelBar.css('width', '0');
  // ********** Basic initialization ********** //

  // ********** Bind events ********** //
  // Collapse navbar on select
  jQuery(document).on('click', '.navbar-collapse.in', _hideOverlayOnSelect);

  // Change the brand name on navbar item select
  $navbarItems.on('click', _setNavbarBrandText);

  // Scroll to the top on navbar item select
  $navbarItems.on('click', _scrollToTop);

  // Off canvas toggle
  $offCanvasToggle.on('click', _offCanvasToggle);

  jQuery(window).on('load', _animateProgressBars);

  // Function to show the dark overlay whenever the navmenu is expanded
  $navbarToggle.on('click', _toggleOverlay);

  $contactForm.on('submit', _sendEmail);
  // ********** Bind events ********** //

  // ********** Function declarations ********** //
  /**
   * Function to  hide the dark-overlay and reenable scrolling on the page
   * whenever a navbar item is selected.
   *
   * @param  {object} e The event.
   */
  function _hideOverlayOnSelect(e) {
    if( jQuery(e.target).is('a') && jQuery(e.target).attr('class') !== 'navbar-toggle') {
      jQuery(this).collapse('hide');
      if ($darkOverlay.is(':visible')) {
        $darkOverlay.hide();
        $html.removeClass('no-scroll');
      }
    }
  }

  /**
   * Function to animate each progress bar in the DOM.
   */
  function _animateProgressBars() {
    $levelBar.each(_animateProgressBar);
  }

  /**
   * Function that will animate a single progress bar.
   */
  function _animateProgressBar() {
    var itemWidth = jQuery(this).data('level');

    jQuery(this).animate({width: itemWidth}, 800);
  }

  /**
   * Function to toggle the dark-overlay and toggle scrolling.
   */
  function _toggleOverlay() {
    $darkOverlay.toggle();
    $html.toggleClass('no-scroll');
  }

  /**
   * Function to toggle the offcanvas navmenu.
   */
  function _offCanvasToggle() {
    $offCanvasRow.toggleClass('active');
  }

  /**
   * Function to set the navbar brand text.
   */
  function _setNavbarBrandText() {
    $navbarBrand.text(jQuery(this).text());
  }

  /**
   * Function to scroll to the top of the page.
   */
  function _scrollToTop() {
    scrollTo(0, 0);
  }

  /**
   * Function to fire an AJAX request to send a contact email to my contact email from
   * a user on the page.
   *
   * @param  {object} e The event from the form submit.
   */
  function _sendEmail(e) {
    e.preventDefault();

    var name = $name.val();
    var email = $email.val();
    var message = $message.val();

    ajax.sendEmail(name, email, message, _processEmailResponse);
  }

  /**
   * Function to process the AJAX response and show a snackbar to inform the user the
   * status of his contact email.
   *
   * @param  {object} response The JSON response from the AJAX call.
   */
  function _processEmailResponse(response) {
    if (response.responseType === 'SUCCESS') {
      jQuery.snackbar({content: response.response,
                  timeout: 1500});
                  
      $name.val('');
      $email.val('');
      $message.val('');
    } else {
      jQuery.snackbar({content: 'Error Code: ' + response.responseType + '\nServer Response: ' + response.response,
                  timeout: 1500});
    }
  }
  // ********** Function declarations ********** //
})(window.jQuery, window.AjaxModule);
