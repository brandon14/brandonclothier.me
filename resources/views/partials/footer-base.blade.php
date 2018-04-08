<!-- Footer -->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6 footer-left">
        <div class="footer-icon">
          <img class="profile" src="{{ manifest_asset('images/profile-small.png') }}" alt="Profile Image" />&nbsp;brandonclothier.me
        </div>
        @yield('share-buttons', '')
      </div>
      <div class="col-md-6 footer-right">
        <div class="social-buttons">
          <!-- Social Buttons -->
          <a class="btn btn-social-icon btn-sm btn-facebook" href="https://www.facebook.com/brandon14125" target="_blank">
            <span class="fa fa-facebook"></span>
          </a>
          <a class="btn btn-social-icon btn-sm btn-google" href="https://plus.google.com/+BrandonClothier" target="_blank">
            <span class="fa fa-google"></span>
          </a>
          <a class="btn btn-social-icon btn-sm btn-instagram" href="https://www.instagram.com/b_randon14" target="_blank">
            <span class="fa fa-instagram"></span>
          </a>
          <a class="btn btn-social-icon btn-sm btn-twitter" href="https://twitter.com/inhal3exh4le" target="_blank">
            <span class="fa fa-twitter"></span>
          </a>
          <a class="btn btn-social-icon btn-sm btn-tumblr" href="https://brandon14125.tumblr.com/" target="_blank">
            <span class="fa fa-tumblr"></span>
          </a>
          <a class="btn btn-social-icon btn-sm btn-github" href="https://www.github.com/brandon14" target="_blank">
            <span class="fa fa-github"></span>
          </a>
          <a class="btn btn-social-icon btn-sm btn-linkedin" href="https://www.linkedin.com/in/brandon-clothier-16190b123" target="_blank">
            <span class="fa fa-linkedin"></span>
          </a>
          <!-- End social buttons -->
          @yield('follow-buttons', '')
          <!-- Email links -->
          <a class="btn btn-block btn-sm btn-social btn-github" href="mailto:brandon14125@gmail.com"><span class="fa fa-envelope"></span>brandon14125@gmail.com</a>
          <a class="btn btn-block btn-sm btn-social btn-github" href="mailto:brandon_clothier@mymail.eku.edu"><span class="fa fa-envelope"></span>brandon_clothier@mymail.eku.edu</a>
          <!-- End email links -->
        </div>
        <div class="footer-details">
          <br />@includeIf('partials.lastmodified')
          <br />Website Version: {{ config('app.version') }}
          <br /><small id="copyright">Copyright &copy; 2017{{ intval(date('Y')) > 2017 ? '-'.date('Y') : '' }} Brandon Clothier</small>
        </div>
      </div>
    </div>
  </div>
  <!-- Google translate footer -->
  <div id="google_translate_element"></div>
</footer>

<!-- Google Translate Script -->
<script type="text/javascript">
window.googleTranslateElementInit = function() {
  new google.translate.TranslateElement({pageLanguage: 'en', gaTrack: true, gaId: 'UA-98105282-1'}, 'google_translate_element');
};
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- End footer -->

<!-- Dark overlay -->
<div class="dark-overlay"></div>
