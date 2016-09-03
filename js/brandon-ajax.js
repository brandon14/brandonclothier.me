var AjaxFunctions = (function() {
  var ajaxUrl = '/ajax/send_email.php';

  function _sendEmail(name, email, message, callback) {
    var request = $.ajax({
      type: 'POST',
      url: ajaxUrl,
      data: {'name' : name,
             'email' : email,
             'message' : message},
      dataType: 'HTML'
    });

    request.done(function(response) {
      var response;

      try {
        response = $.parseJSON(response);
      } catch(error) {
        callback({'responseType' : 'PARSE_ERROR',
                  'response'     : 'I couldn\'nt even parse this AJAX response yo!'});
      }

      callback(response);
    });
  }

  function sendEmail(name, email, message) {
    var returnResponse;

    _sendEmail(name, email, message, function(response) {
      returnResponse = response;
    });

    return returnResponse;
  }

  return {
    sendEmail : sendEmail
  }
})();
