<section id="contact" class="section contact-section">
  <div class="row">
    <!-- Column for contact page -->
    <div class="col-sm-12">
      <h1>Contact</h1>
      <hr>
      <!-- Contact form -->
      <form id="contact-form">
        <!-- Name form group -->
        <div class="form-group label-floating is-empty">
          <label for="name" class="control-label">Name</label>
          <input id="name" type="text" class="form-control" name="name" required>
          <span class="help-block">First &amp; last name.</span>
        </div>
        <!-- End name form group -->
        <!-- Email form group -->
        <div class="form-group label-floating is-empty">
          <label for="name" class="control-label">Email</label>
          <input id="email" type="email" class="form-control" name="email" required>
          <span class="help-block">Please enter a valid email address.</span>
        </div>
        <!-- End email form group -->
        <!-- Message form group -->
        <div class="form-group label-floating is-empty">
          <label for="name" class="control-label">Message</label>
          <textarea id="email-message" class="form-control" rows="5" name="message" required></textarea>
          <span class="help-block">Please enter your message.</span>
        </div>
        <!-- End message form group -->
        <!-- Google reCAPTCHA -->
        {!! NoCaptcha::display(config('captcha.attributes')) !!}
        <!-- Send form group -->
        <div class="form-group">
          <button id="send-email" type="submit" class="btn btn-raised btn-primary" aria-label="send">Send</button>
        </div>
        <!-- End send form group -->
      </form>
      <!-- End contact form -->
      <!-- Google reCAPTCHA script -->
      {!! NoCaptcha::renderJs() !!}
    </div>
    <!-- End column for contact page -->
  </div>
  <!-- End row -->
  <!-- Modal -->
  <div id="contact-modal" class="modal fade" role="dialog" aria-labelledby="model-label">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 id="model-label" class="modal-title">Response</h4>
        </div>
        <div id="modal-content" class="modal-body"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</section>
