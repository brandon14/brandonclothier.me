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
  /**
   * Scroll to top button.
   *
   * @type {jQuery object}
   */
  const $scrollButton = $('#scroll-top');

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
   * @param {number}  index   Index of element.
   * @param {element} element Element object.
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

    $sendButton.html('Sending...');
    $sendButton.prop('disabled', true);

    const name = $name.val();
    const email = $email.val();
    const message = $message.val();

    sendContactEmail(name, email, message)
      .then((response) => {
        processEmailResponse({
          status: response.status,
          response: response.data.message,
        });
      })
      .catch((response) => {
        processEmailResponse(handleContactErrorResponse(response));
      });
  };

  /**
   * Function to process the AJAX response and show a modal to inform the user the
   * status of his contact email.
   *
   * @param {object} response JSON response from the AJAX call.
   */
  const processEmailResponse = (response) => {
    if (window.grecaptcha) {
      window.grecaptcha.reset();
    }

    $sendButton.prop('disabled', false);
    $sendButton.html('Send');

    if (response.status === 200) {
      $name.val('');
      $email.val('');
      $message.val('');
    }

    $modalContent.html(response.response);

    $modal.modal({
      backdrop: 'static',
    });
  };

  /**
   * Function to make the API request to send the contact email and return the
   * Promise. Will reject a Promise if no Google reCAPTCHA object is found.
   *
   * @param   {string}   name     Contact name.
   * @param   {string}   email    Contact from email address.
   * @param   {string}   message  Email message to send.
   *
   * @returns {Promise}
   */
  const sendContactEmail = (name, email, message) => {
    if (!window.grecaptcha) {
      return Promise.reject({ // eslint-disable-line prefer-promise-reject-errors
        status: 500,
        message: 'Cannot find Google reCAPTCHA API.',
      });
    }

    return axios.post(ajaxUrl, {
      name,
      email,
      message,
      'g-recaptcha-response': window.grecaptcha.getResponse(),
    });
  };

  /**
   * Function to handle the error response from the AJAX call and return a standardized
   * response object.
   *
   * @param   {object} error Error object.
   *
   * @returns {object}
   */
  const handleContactErrorResponse = (error) => {
    const unknownError = 'Unknown error occurred.';
    let response;
    let status = 500;

    if (error.response) {
      status = error.response.status ? error.response.status : 500;
      response = handleErrorResponse(error.response);
    } else if (error.request) {
      response = error.request;
    } else {
      response = error.message;
    }

    return {
      status,
      response: response || unknownError,
    };
  };

  /**
   * Handle a error response from the server.
   *
   * @param   {object} error Error response object.
   * @returns {string}
   */
  const handleErrorResponse = (error) => {
    if (error.data && error.data.error) {
      const errorResponse = error.data.error;

      if (errorResponse.message) {
        if (errorResponse.errors) {
          return `${errorResponse.message}<br />${handleMultipleErrors(errorResponse.errors)}`;
        }

        return errorResponse.message;
      } else if (errorResponse.errors) {
        return handleMultipleErrors(errorResponse.errors);
      }
    } else {
      return error.response.data;
    }

    return '';
  };

  /**
   * Function to parse multiple errors into an error string with <br />'s
   * separating the error messages for display in the modal.
   *
   * @param   {object|array} errors Errors JSON object or array.
   *
   * @returns {string}
   */
  const handleMultipleErrors = (errors) => {
    let message = '';

    $.each(errors, (key, value) => {
      let error;

      if ($.isArray(value)) {
        $.each(value, (key2, value2) => {
          error = error ? `${error}<br />${value2}` : value2;
        });
      } else {
        error = value;
      }

      message = message ? `${message}<br />${error}` : error;
    });

    return message;
  };

  /**
   * Function to scroll to the top on a button click.
   */
  const scrollToTop = () => {
    $htmlBody.stop().animate({
      scrollTop: 0,
    }, 1000, 'easeInOutExpo');
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
    console.error('CSRF token not found.'); // eslint-disable-line no-console
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

  // Scroll to top on button click
  $scrollButton.on('click', scrollToTop);

  // Function to show the dark overlay whenever the navmenu is expanded
  $navbarToggle.on('click', toggleOverlay);

  // Send email on form submit
  $contactForm.on('submit', sendEmail);
})();
