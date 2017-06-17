import $ from 'jquery';
import axios from 'axios';
import 'jquery.easing';
import 'bootstrap-sass';
import 'bootstrap-material-design';

(() => {
  /**
   * Contact email API URL.
   *
   * @type {string}
   */
  const ajaxUrl = '/contact';

  /**
   * CSRF token retrieved from meta tag.
   *
   * @type {string}
   */
  const token = $('meta[name="csrf-token"]').attr('content');

  /*
   |--------------------------------------------------------------------------
   | DOM Caching
   |--------------------------------------------------------------------------
   | Cache all of our jQuery DOM elements here for use later.
   |
   */

  /**
   * Window jQuery object.
   *
   * @type {jQuery object}
   */
  const $window = $(window);
  /**
   * Document jQuery object.
   *
   * @type {jQuery object}
   */
  const $document = $(document);
  /**
   * HTML jQuery object.
   *
   * @type {jQuery object}
   */
  const $html = $('html');
  /**
   * HTML and body jQuery object combined.
   *
   * @type {jQuery object}
   */
  const $htmlBody = $('html, body');
  /**
   * Navbar class jQuery object.
   *
   * @type {jQuery object}
   */
  const $navbar = $('.navbar');
  /**
   * Navbar toggle class jQuery object.
   *
   * @type {jQuery object}
   */
  const $navbarToggle = $('.navbar-toggle');
  /**
   * Dark overlay class div jQuery object.
   *
   * @type {jQuery object}
   */
  const $darkOverlay = $('.dark-overlay');

  /**
   * Progress level bar class jQuery object.
   *
   * @type {jQuery object}
   */
  const $levelBar = $('.level-bar-inner');

  /**
   * Contact form jQuery object.
   *
   * @type {jQuery object}
   */
  const $contactForm = $('#contact-form');
  /**
   * Send email button jQuery object.
   *
   * @type {jQuery object}
   */
  const $sendButton = $('#send-email');
  /**
   * Name input jQuery object.
   *
   * @type {jQuery object}
   */
  const $name = $('#name');
  /**
   * Email input jQuery object.
   *
   * @type {jQuery object}
   */
  const $email = $('#email');
  /**
   * Contact email message input jQuery object.
   *
   * @type {jQuery object}
   */
  const $message = $('#email-message');
  /**
   * Contact email Bootstrap modal jQuery object.
   *
   * @type {jQuery object}
   */
  const $modal = $('#contact-modal');
  /**
   * Modal content jQuery object.
   *
   * @type {jQuery object}
   */
  const $modalContent = $('#modal-content');

  /*
   |--------------------------------------------------------------------------
   | Function Declarations
   |--------------------------------------------------------------------------
   | Declare application functions.
   |
   */

  /**
   * Function to reset the modal content.
   */
  const removeModalContent = () => {
    $modalContent.html('');
  };

  /**
   * Function to scroll to the section anchor on navbar click
   *
   * @param {object} e Event.
   */
  const sectionOnClick = (e) => {
    const $anchor = $(e.currentTarget);

    e.preventDefault();

    $htmlBody.stop().animate({
      scrollTop: $($anchor.attr('href')).offset().top,
    }, 1000, 'easeInOutExpo');
  };

  /**
   * Function to hide the dark-overlay and re-enable scrolling on the page
   * whenever a navbar item is selected.
   *
   * @param {object} e Event.
   */
  const hideOverlayOnSelect = (e) => {
    if ($(e.target).is('a') && $(e.target).attr('class') !== 'navbar-toggle') {
      $(e.currentTarget).collapse('hide');

      if ($darkOverlay.is(':visible')) {
        $darkOverlay.hide();
        $html.removeClass('no-scroll');
      }
    }
  };

  /**
   * Function to animate each progress bar in the DOM.
   */
  const animateProgressBars = () => {
    $levelBar.map(animateProgressBar);
  };

  /**
   * Function that will animate a single progress bar.
   *
   * @param {integer} index   Index of element.
   * @param {Element} element Element object.
   */
  const animateProgressBar = (index, element) => {
    const itemWidth = $(element).data('level');

    $(element).animate({ width: itemWidth }, 800);
  };

  /**
   * Function to toggle the dark-overlay and toggle scrolling.
   */
  const toggleOverlay = () => {
    $darkOverlay.toggle();
    $html.toggleClass('no-scroll');
  };

  /**
   * Function to fire an AJAX request to send a contact email to my contact email from
   * a user on the page.
   *
   * @param {object} e Event from the form submit.
   */
  const sendEmail = (e) => {
    e.preventDefault();

    const name = $name.val();
    const email = $email.val();
    const message = $message.val();

    $sendButton.prop('disabled', true);

    sendContactEmail(name, email, message, processEmailResponse);
  };

  /**
   * Function to process the AJAX response and show a modal to inform the user the
   * status of his contact email.
   *
   * @param {object} response JSON response from the AJAX call.
   */
  const processEmailResponse = (response) => {
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
  };

  /**
   * Function to make the API request to send the contact email.
   * @param {string}   name     Contact name.
   * @param {string}   email    Contact from email address.
   * @param {string}   message  Email message to send.
   * @param {function} callback Callback function to execute when response is returned.
   */
  const sendContactEmail = (name, email, message, callback) => {
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

        if (error.response.data.error.message) {
          errorMessage = error.response.data.error.message;
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
  };

  /*
   |--------------------------------------------------------------------------
   | Basic Initialization
   |--------------------------------------------------------------------------
   | Perform some basic initialization for the page.
   |
   */

  // Initialize the material design theme
  $.material.init();

  // Set up CSRF token from meta tag for Axios AJAX requests
  if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token;
  } else {
    console.error('CSRF token not found.');
  }

  // Set the progressbar widths to 0
  $levelBar.css('width', '0');

   /*
   |--------------------------------------------------------------------------
   | Bind Events
   |--------------------------------------------------------------------------
   | Bind functions to the DOM element events.
   |
   */

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
      top: 75,
    },
  });

  // Function to show the dark overlay whenever the navmenu is expanded
  $navbarToggle.on('click', toggleOverlay);

  // Send email on form submit
  $contactForm.on('submit', sendEmail);
})();
