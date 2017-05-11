
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import $ from 'jquery';
import axios from 'axios';

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Set up CSRF token from meta tag for Axios AJAX requests
const token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found.');
}

window.axios = axios;
window.$ = $;
window.jQuery = $;

require('jquery.easing');
require('bootstrap-sass');
require('bootstrap-material-design');

(() => {
  // ********** Contact API URL ********** //
  const ajaxUrl = '/contact';

  // ********** DOM Caching ********** //
  const $darkOverlay = $('.dark-overlay');

  const $window = $(window);
  const $document = $(document);
  const $htmlBody = $('html, body');
  const $navbar = $('.navbar');
  const $navbarToggle = $('.navbar-toggle');

  const $levelBar = $('.level-bar-inner');

  const $contactForm = $('#contact-form');
  const $sendButton = $('#send-email');
  const $name = $('#name');
  const $email = $('#email');
  const $message = $('#email-message');
  const $modal = $('#contact-modal');
  const $modalContent = $('#modal-content');

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

  // Remove modal content on hide
  $modal.on('hidden.bs.modal', removeModalContent);

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
  /**
   * Function to reset the modal content.
   */
  function removeModalContent() {
    $modalContent.html('');
  }

  /**
   * Function to scroll to the section anchor on navbar click
   *
   * @param {object} e Event.
   */
  function sectionOnClick(e) {
    const $anchor = $(this);

    e.preventDefault();

    $htmlBody.stop().animate({
      scrollTop: $($anchor.attr('href')).offset().top,
    }, 1000, 'easeInOutExpo');
  }

  /**
   * Function to hide the dark-overlay and reenable scrolling on the page
   * whenever a navbar item is selected.
   *
   * @param {object} e Event.
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
   * @param {object} e Event from the form submit.
   */
  function sendEmail(e) {
    e.preventDefault();

    const name = $name.val();
    const email = $email.val();
    const message = $message.val();

    $sendButton.prop('disabled', true);

    sendContactEmail(name, email, message, processEmailResponse);
  }

  /**
   * Function to process the AJAX response and show a snackbar to inform the user the
   * status of his contact email.
   *
   * @param {object} response JSON response from the AJAX call.
   */
  function processEmailResponse(response) {
    if (response.status === 200) {
      $modalContent.html(response.response);

      $name.val('');
      $email.val('');
      $message.val('');
    } else if (response.status === 429) {
      $modalContent.html(response.response);
    } else {
      $modalContent.html(`Error Code: ${response.status} \nServer Response: ${response.response}`);
    }

    $modal.modal({
      backdrop: 'static',
    });

    $sendButton.prop('disabled', false);
  }

  /**
   * Function to make the API request to send the contact email.
   * @param {String}   name     Contact name.
   * @param {String}   email    Contact from email address.
   * @param {String}   message  Email message to send.
   * @param {Function} callback Callback function to execute when response is returned.
   */
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
      let tResponse = {};

      if (error.response) {
        let errorMessage = 'Undefined error.';

        if (error.response.data.error_message) {
          errorMessage = error.response.data.error_message;
        } else if (error.response.data.response) {
          errorMessage = error.response.data.response;
        } else {
          errorMessage = error.response.data;
        }

        tResponse = {
          status: error.response.status,
          response: errorMessage,
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
