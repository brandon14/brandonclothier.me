$(document).click(function(e) {
  if (!$(e.target).is('a')) {
    $('#navbar').collapse('hide');        
  }
});