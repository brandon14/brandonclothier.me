/**
 * Module that handles the AJAX calls for this page. As of right now it only sends emails.
 *
 * @type    {object}
 *
 * @param   {jQuery} jQuery module.
 *
 * @return  {object} sendEmail: Function to send an email
 */
var AjaxModule = (function(jQuery) {
  "use strict";
  
  /**
   * The url for the send-email AJAX script.
   *
   * @type  {string}
   */
  var ajaxUrl = '/ajax/send-mail/';

  /**
   * Function to send an AJAX request to the send-email AJAX script to send a contact email
   * to me.
   *
   * @param  {string}   name     The name of the person sending a contact email.
   * @param  {string}   email    The email address of the person sending the contact email.
   * @param  {string}   message  The contact email content.
   * @param  {Function} callback Function to invoke upon AJAX request done.
   */
  function sendEmail(name, email, message, callback) {
    var request = jQuery.ajax({
      type: 'POST',
      url: ajaxUrl,
      data: {'name' : name,
             'email' : email,
             'message' : message},
      dataType: 'HTML'
    });

    request.done(function(response) {
      var tResponse;

      try {
        tResponse = jQuery.parseJSON(response);
      } catch(error) {
        callback({'responseType' : 'PARSE_ERROR',
                  'response'     : 'I couldn\'nt even parse this AJAX response yo!'});
      }

      callback(tResponse);
    });
  }

  /**
   * Return the public API
   */
  return {
    sendEmail : sendEmail
  };
})(window.jQuery);
