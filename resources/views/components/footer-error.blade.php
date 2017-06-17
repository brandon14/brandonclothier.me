@inject('lastModified', 'lastModified')
<!-- Footer -->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6 footer-left">
        <div class="footer-icon">
          <img class="profile" src="{{ config('app.env') === 'production' ? asset('images/profile-small.png', true) : asset('images/profile-small.png') }}" alt="Profile Image" />&nbsp;brandonclothier.me
        </div>
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
          <!-- Email links -->
          <a class="btn btn-block btn-sm btn-social btn-github" href="mailto:brandon14125@gmail.com"><span class="fa fa-envelope"></span>brandon14125@gmail.com</a>
          <a class="btn btn-block btn-sm btn-social btn-github" href="mailto:brandon_clothier@mymail.eku.edu"><span class="fa fa-envelope"></span>brandon_clothier@mymail.eku.edu</a>
          <!-- End email links -->
        </div>
        <div id="copyright" class="copyright">
          Copyright &copy; 2017{{ intval(date('Y')) > 2017 ? '-'.date('Y') : '' }} Brandon Clothier
          <br/>Website last updated {{ app('lastModified')->format('F jS, Y \a\t h:i:s A T') }}
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- End footer -->

<!-- Dark overlay -->
<div class="dark-overlay" hidden></div>
