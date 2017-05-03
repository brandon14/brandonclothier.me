
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import $ from 'jquery';
import axios from 'axios';

axios.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios = axios;
window.$ = $;
window.jQuery = $;

require('jquery.easing');
require('bootstrap-sass');
require('bootstrap-material-design');
require('snackbarjs');

(() => {
  // ********** API URL ********** //
  const ajaxUrl = '/api/contact';

  // ********** DOM Caching ********** //
  const $darkOverlay = $('.dark-overlay');

  const $window = $(window);
  const $document = $(document);
  const $htmlBody = $('html, body');
  const $navbar = $('.navbar');
  const $navbarToggle = $('.navbar-toggle');

  const $levelBar = $('.level-bar-inner');

  const $contactForm = $('#contact-form');
  const $name = $('#name');
  const $email = $('#email');
  const $message = $('#email-message');

  const $html = $('html');
  // ********** DOM Caching ********** //

  // ********** Basic initialization ********** //
  // Set the progressbar widths to 0
  $levelBar.css('width', '0');
  // ********** Basic initialization ********** //

  // ********** Bind events ********** //
  // Collapse navbar on select
  $document.on('click', '.navbar-collapse.in', hideOverlayOnSelect);

  // Scroll to section on section click
  $document.on('click', 'a.page-scroll', sectionOnClick);

  // Animate the resume progress bars
  $window.on('load', animateProgressBars);

  // Affix for navbar to collapse on scroll
  $navbar.affix({
    offset: {
      top: 150,
    },
  });

  // Function to show the dark overlay whenever the navmenu is expanded
  $navbarToggle.on('click', toggleOverlay);

  // Send email on form submit
  $contactForm.on('submit', sendEmail);
  // ********** Bind events ********** //

  // ********** Function declarations ********** //
  function sectionOnClick(e) {
    const $anchor = $(this);
    const hash = this.hash;

    e.preventDefault();

    $htmlBody.stop().animate({
      scrollTop: $($anchor.attr('href')).offset().top,
    }, 1000, 'easeInOutExpo');
  }

  /**
   * Function to hide the dark-overlay and reenable scrolling on the page
   * whenever a navbar item is selected.
   *
   * @param  {object} e The event.
   */
  function hideOverlayOnSelect(e) {
    if ($(e.target).is('a') && $(e.target).attr('class') !== 'navbar-toggle') {
      $(this).collapse('hide');

      if ($darkOverlay.is(':visible')) {
        $darkOverlay.hide();
        $html.removeClass('no-scroll');
      }
    }
  }

  /**
   * Function to animate each progress bar in the DOM.
   */
  function animateProgressBars() {
    $levelBar.each(animateProgressBar);
  }

  /**
   * Function that will animate a single progress bar.
   */
  function animateProgressBar(){
    const itemWidth = $(this).data('level');

    $(this).animate({ width: itemWidth }, 800);
  }

  /**
   * Function to toggle the dark-overlay and toggle scrolling.
   */
  function toggleOverlay() {
    $darkOverlay.toggle();
    $html.toggleClass('no-scroll');
  }

  /**
   * Function to fire an AJAX request to send a contact email to my contact email from
   * a user on the page.
   *
   * @param  {object} e The event from the form submit.
   */
  function sendEmail(e) {
    e.preventDefault();

    const name = $name.val();
    const email = $email.val();
    const message = $message.val();

    sendContactEmail(name, email, message, processEmailResponse);
  }

  /**
   * Function to process the AJAX response and show a snackbar to inform the user the
   * status of his contact email.
   *
   * @param  {object} response The JSON response from the AJAX call.
   */
  function processEmailResponse(response) {
    if (response.status === 200) {
      $.snackbar({
        content: response.response,
        timeout: 1500,
      });

      $name.val('');
      $email.val('');
      $message.val('');
    } else {
      $.snackbar({
        content: `Error Code: ${response.status} \nServer Response: ${response.response}`,
        timeout: 1500,
      });
    }
  }

  function sendContactEmail(name, email, message, callback) {
    axios.post(ajaxUrl, {
      name,
      email,
      message,
    }).then((response) => {
      callback({
        status: response.status,
        response: response.data.response,
      });
    }).catch((error) => {
      let tResponse;

      if (error.response) {
        tResponse = {
          status: error.response.status,
          response: error.response.data.response,
        };
      } else if (error.request) {
        tResponse = {
          status: 500,
          response: error.request,
        };
      } else {
        tResponse = {
          status: 500,
          response: error.message,
        };
      }

      callback(tResponse);
    });
  }
  // ********** Function declarations ********** //
})();

$.material.init();
