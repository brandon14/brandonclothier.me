$('#navbar-items > li > a').on('click', function() {
  $('.navbar-brand').text($(this).text());
});