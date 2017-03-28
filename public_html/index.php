<?php
require_once('../src/last-modified.php');
?>
<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

<head>
  <!-- General metadata -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"              content="width=device-width, initial-scale=1">
  <meta name="description"           content="A website I made as a project to learn Bootstrap.">
  <meta name="author"                content="Brandon Clothier">
  <link rel="copyright"              href="#copyright">
  <link rel="icon"                   href="favicon.ico" type="image/x-icon" />

  <!-- Theme meta for Google Chrome on Android -->
  <meta name="theme-color"           content="#ff5722">

  <!-- Facebook OpenGraph meta -->
  <meta property="og:url"            content="http://www.brandonclothier.net16.net" />
  <meta property="og:type"           content="website" />
  <meta property="og:title"          content="Brandon Clothier" />
  <meta property="og:description"    content="A website about me!" />
  <meta property="og:image"          content="http://www.brandonclothier.net16.net/images/logo-large.png" />

  <!-- Twitter meta -->
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@inhal3exh4le" />
  <meta name="twitter:creator" content="@inhal3exh4le" />

  <title>Brandon Clothier</title>

  <!-- Material Design fonts -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Bootstrap Material Design -->
  <link rel="stylesheet" href="/vendor/css/bootstrap-material-design.min.css">
  <link rel="stylesheet" href="/vendor/css/ripples.min.css">
  <link rel="stylesheet" href="/vendor/css/snackbar.min.css">
  <link rel="stylesheet" href="/vendor/css/snackbar-theme.min.css">

  <!-- Bootstrap Social Buttons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.0.0/bootstrap-social.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="/css/offcanvas.min.css">
  <link rel="stylesheet" href="/css/style.min.css">
  <link rel="stylesheet" href="/css/resume.min.css">

  <!-- HTML5 Shim and Respond.js and rem.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/rem/1.3.4/js/rem.min.js"></script>
  <![endif]-->
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-fixed-top navbar-default" role="navigation">
  <div class="container">
    <!-- Navbar header -->
    <div class="navbar-header">
      <a class="navbar-brand visible-xs" href="#">About</a>
      <!-- Navbar collapse button -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- End navbar collapse button -->
    </div>
    <!-- End navbar header -->
    <!-- Navbar items -->
    <div id="navbar" class="collapse navbar-collapse">
      <ul id="navbar-items" class="nav navbar-nav">
        <li class="active"><a href="#about" data-toggle="tab">About</a></li>
        <li><a href="/html5-pong">HTML5 Pong</a></li>
        <li><a href="#resume" data-toggle="tab">Resume</a></li>
        <li><a href="#contact" data-toggle="tab">Contact</a></li>
      </ul>
    </div>
    <!-- End navbar items -->
  </div>
</nav>
<!-- End navbar -->

<!-- Tab content -->
<div class="tab-content">
  <!-- About page -->
  <div class="tab-pane active" id="about">
    <div class="container">
      <!-- About jumbotron -->
      <div class="jumbotron">
        <div class="row">
          <!-- Empty row for padding -->
          <div class="col-sm-1">
          </div>
          <!-- End empty column for padding -->
          <!-- End padding -->
          <!-- About column -->
          <div class="col-sm-10">
            <h2>My name is Brandon Clothier,</h2>
            <p>and I am currently employed by Webbed Sphere, Inc. where I help maintain and
            develop the TrollAndToad.com website. I love working on software projects in
            my spare time. I created this webpage to learn using the Bootstrap CSS framework
            to make a responsive website. At my job, I mainly deal with PHP and JavaScript
            but I have experience with many languages. I am also currently learning using
            more modern web development frameworks such as Node.js, Angular.js as well as some
            PHP frameworks such as CakePHP and Laravel. I also intend on learning the Django
            Python framework as well.</p>
            <p>Some of the languages I have experience with are:
              <ul>
                <li>Java</li>
                <li>C#</li>
                <li>PHP</li>
                <li>HTML5</li>
                <li>JavaScript</li>
                <li>C/C++</li>
                <li>Python</li>
                <li>x86 Assembly</li>
              </ul>
            </p>
            <p>And I have experience with the following database systems:
              <ul>
                <li>PostgreSQL</li>
                <li>MySQL</li>
                <li>Oracle SQL</li>
                <li>SQLite</li>
                <li>MongoDB</li>
              </ul>
            </p>
            <p>Some of the frameworks and tools I have experience with are:
              <ul>
                <li>Android SDK</li>
                <li>Windows Forms using C#</li>
                <li>Windows .NET Framework</li>
                <li>jQuery</li>
                <li>ASP.NET</li>
                <li>Bootstrap v3</li>
                <li>AJAX Techniques</li>
                <li>Node.js</li>
                <li>Java Swing</li>
                <li>Git</li>
              </ul>
            </p>
          </div>
          <!-- End about column -->
          <!-- Empty column for padding -->
          <div class="col-sm-1">
          </div>
          <!-- End empty row for padding -->
        </div> <!-- End row -->
      </div>
      <!-- End about jumbotron -->
    </div> <!-- end container -->
  </div>
  <!-- End about page -->

  <!-- Resume page -->
  <div class="tab-pane" id="resume">
    <div class="container">
      <!-- Resume jumbotron -->
      <div class="jumbotron resume-jumbotron">
        <div class="row">
          <!-- Resume column -->
          <div class="col-sm-12">
            <!-- Thanks to Xiaoying Riley for the Orbit resume template -->
            <!-- Resume wrapper -->
            <div class="wrapper">
              <!-- Resume sidebar -->
              <div class="sidebar-wrapper">
                <!-- Profile container -->
                <div class="profile-container">
                  <img class="profile" src="images/profile.png" alt="Profile Image" />
                  <h1 class="name">Brandon Clothier</h1>
                  <h3 class="tagline">Web Developer</h3>
                </div>
                <!-- End profile-container-->

                <!-- Contact container -->
                <div class="contact-container container-block">
                  <ul class="list-unstyled contact-list">
                    <li class="email"><i class="fa fa-envelope"></i><a href="mailto:brandon14125@gmail.com">brandon14125@gmail.com</a></li>
                    <li class="website"><i class="fa fa-globe"></i><a href="http://brandonclothier.net16.net">brandonclothier.net16.net</a></li>
                    <li class="github"><i class="fa fa-github"></i><a href="https://www.github.com/brandon14">github.com/brandon14</a></li>
                    <li class="twitter"><i class="fa fa-twitter"></i><a href="https://twitter.com/inhal3exh4le">@inhal3exh4le</a></li>
                    <li class="linkedin"><i class="fa fa-linkedin"></i><a href="https://www.linkedin.com/in/brandon-clothier-16190b123">Brandon Clothier</a></li>
                  </ul>
                </div>
                <!-- End contact container-->

                <!-- Education container -->
                <div class="education-container container-block">
                  <h2 class="container-block-title">Education</h2>
                  <div class="item">
                    <h4 class="degree">BSc in Computer Science</h4>
                    <h5 class="meta">Eastern Kentucky University</h5>
                    <div class="time">2013 - 2016</div>
                  </div>
                  <div class="item">
                    <h4 class="degree">ASc in General Transfer</h4>
                    <h5 class="meta">Somerset Community College</h5>
                    <div class="time">2010 - 2012</div>
                  </div>
                  <div class="item">
                    <h4 class="degree">AASc in Diesel Technology</h4>
                    <h5 class="meta">Somerset Community College</h5>
                    <div class="time">2007 - 2010</div>
                  </div>
                </div>
                <!-- End education container-->

                <!-- Language container -->
                <div class="languages-container container-block">
                  <h2 class="container-block-title">Languages</h2>
                  <ul class="list-unstyled interests-list">
                    <li>English <span class="lang-desc">(Native)</span></li>
                  </ul>
                </div>
                <!-- End language container-->

                <!-- Interest container -->
                <div class="interests-container container-block">
                  <h2 class="container-block-title">Interests</h2>
                  <ul class="list-unstyled interests-list">
                    <li>Web Development</li>
                    <li>Software Projects</li>
                    <li>Skateboarding</li>
                    <li>Video Games</li>
                  </ul>
                </div>
                <!-- End interest container-->
              </div>
              <!-- End resume sidebar -->
              <!-- Main content wrapper -->
              <div class="main-wrapper">
                <!-- Summary section -->
                <section class="section summary-section">
                  <h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
                  <div class="summary">
                    <p>Highly motivated and hardworking individual. Experienced in Computer Science and software development. Workplace experience with
                    PHP, Javascript, HTML5 and CSS. Experienced in using AJAX techniques to create dynamic webpages. Experienced with Java, PostgreSQL,
                    MySQL, HTML, C#, Linux operating systems, classroom software engineering experience, and Android SDK experience. Also experienced in
                    customer service, and work environments involving working together as a team.</p>
                  </div>
                </section>
                <!-- End summary section -->

                <!-- Experience section -->
                <section class="section experiences-section">
                  <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>

                  <!-- Experience  item -->
                  <div class="item">
                    <div class="meta">
                      <div class="upper-row">
                        <h3 class="job-title">Web Developer</h3>
                        <div class="time">2016 - Present</div>
                      </div><!-- End upper-row-->
                      <div class="company">Webbed Sphere, Inc., Corbin, KY</div>
                    </div><!-- End meta -->
                    <div class="details">
                      <p>Maintain and develop an online store for the Troll and Toad company. The website serves hundreds of users daily. Maintain webpages
                      written in PHP and JavaScript. Work with a PostgreSQL database with over 700 tables to manage customer information and order information.
                      Use AJAX techniques to create dynamic webpages. Create pages to perform admin functions for the online store system.</p>
                    </div>
                  </div>
                  <!-- End experience item -->

                  <!-- Experience  item -->
                  <div class="item">
                    <div class="meta">
                      <div class="upper-row">
                        <h3 class="job-title">Ethics &amp; Software Engineering Course</h3>
                        <div class="time">Fall 2015</div>
                      </div><!-- End upper-row-->
                      <div class="company">Eastern Kentucky University, Richmond, KY</div>
                    </div><!-- End meta -->
                    <div class="details">
                      <p>Worked in a small team of three to design and implement an online store website with a functional MySQL database. Used ASP.net and C# along with
                      a MySQL database in order to implement the website. Used UML to design the software system initially, complete with design and requirement specification
                      documents.</p>
                    </div>
                  </div>
                  <!-- End experience item -->

                  <!-- Experience  item -->
                  <div class="item">
                    <div class="meta">
                      <div class="upper-row">
                        <h3 class="job-title">Applied Software Engineering Course </h3>
                        <div class="time">Spring 2016</div>
                      </div><!-- End upper-row-->
                      <div class="company">Eastern Kentucky University, Richmond, KY</div>
                    </div><!-- End meta -->
                    <div class="details">
                      <p>Worked in a small team of three to design, schedule and implement a meeting planner application with a functional MySQL database. Used C#, Windows Forms
                      and a MySQL database to implement a desktop meeting planner application for the Windows operating system. Used UML to design the software initially, complete
                      with requirement and design specification documents. Used Microsoft Project to implement a schedule and Gantt Chart to schedule the design and implementation
                      of the software system. Used Microsoft Team Foundation Server using the git version control system to coordinate the coding of the software with the team.</p>
                    </div>
                  </div>
                  <!-- End experience item -->

                </section>
                <!-- End experience section-->

                <!-- Projects section -->
                <section class="section projects-section">
                  <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
                  <div class="intro">
                    <p>I enjoy working on software projects in my free time. Most of my work can be found at my Github:
                    <a class="link" href="https://www.github.com/brandon14">github.com/brandon14</a></p>
                  </div><!-- End intro-->

                  <!-- Project item -->
                  <div class="item">
                    <span class="project-title"><a class="link" href="https://www.github.com/brandon14/checkbook">Checkbook</a></span> -
                    <span class="project-tagline">An Andorid checkbook register application built using the Material Design library from Google. It is a work
                    in progress and will be fully functional eventually.</span>
                  </div>
                  <!-- End project item -->

                  <!-- Project item -->
                  <div class="item">
                    <span class="project-title"><a class="link" href="https://github.com/brandon14/simple-calc">SimpleCalc</a></span> -
                    <span class="project-tagline">A Java Swing calculator application I worte as a Sophmore at EKU. It uses the BigDecimal class for the number
                    crunching, and is designed to funcion like the WIndows 7 Calculator program.</span>
                  </div>
                  <!-- End project item -->

                  <!-- Project item -->
                  <div class="item">
                    <span class="project-title"><a class="link" href="https://github.com/brandon14/meeting-coordinator-team">Meeting Coordinator</a></span> -
                    <span class="project-tagline">This was the team project for CSC 440 Software Engineering at EKU. It is a Windows Forms .NET desktop application
                    that allows users to schedule and plan meetings with other users.</span>
                  </div>
                  <!-- End project item -->

                </section>
                <!-- End projects section-->

                <!-- Skills section -->
                <section class="skills-section section">
                  <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
                  <!-- Skillsets -->
                  <div class="skillset">
                    <!-- PHP skill item -->
                    <div class="item">
                      <h3 class="level-title">PHP</h3>
                      <div class="level-bar">
                        <div class="level-bar-inner" data-level="90%">
                        </div>
                      </div><!-- End level-bar-->
                    </div>
                    <!-- End PHP skill item -->

                    <!-- JavaScript skill item -->
                    <div class="item">
                      <h3 class="level-title">JavaScript &amp; jQuery</h3>
                      <div class="level-bar">
                          <div class="level-bar-inner" data-level="90%">
                          </div>
                      </div><!-- End level-bar-->
                    </div>
                    <!-- End JavaScript skill items -->

                    <!-- HTML5 skill item -->
                    <div class="item">
                      <h3 class="level-title">HTML5 &amp; CSS</h3>
                      <div class="level-bar">
                        <div class="level-bar-inner" data-level="95%">
                        </div>
                      </div><!-- End level-bar-->
                    </div>
                    <!-- End HTML5 skill item -->

                    <!-- Java skill item -->
                    <div class="item">
                      <h3 class="level-title">Java</h3>
                      <div class="level-bar">
                        <div class="level-bar-inner" data-level="95%">
                        </div>
                      </div><!-- End level-bar-->
                    </div>
                    <!-- End Java skill item -->

                    <!-- Android SDK skill item -->
                    <div class="item">
                      <h3 class="level-title">Android SDK</h3>
                      <div class="level-bar">
                        <div class="level-bar-inner" data-level="95%">
                        </div>
                      </div><!-- End level-bar-->
                    </div>
                    <!-- End Android SDK skill item -->

                    <!-- C# skill item -->
                    <div class="item">
                      <h3 class="level-title">C# and .NET Framework</h3>
                      <div class="level-bar">
                        <div class="level-bar-inner" data-level="85%">
                        </div>
                      </div><!-- End level-bar-->
                    </div>
                    <!-- End C# skill item -->

                    <!-- Photoshop skill item -->
                    <div class="item">
                      <h3 class="level-title">Photoshop</h3>
                      <div class="level-bar">
                        <div class="level-bar-inner" data-level="90%">
                        </div>
                      </div><!-- End level-bar-->
                    </div>
                    <!-- End Photoshop skill item -->
                  </div>
                  <!-- End skillset -->
                </section>
                <!-- End skills section-->

                <!-- Downloads section -->
                <section class="download-section section">
                  <h2 class="section-title"><i class="fa fa-download"></i><a href="/files/resume.docx">Download Resume</a></h2>
                  <div class="item">
                  </div>
                </section>
                <!-- End downloads sections -->
              </div>
              <!-- End main content wrapper-->
            </div>
            <!-- End resume wrapper -->
          </div>
          <!-- End resume column -->
        </div> <!-- End row -->
      </div>
      <!-- End resume jumbotron -->
    </div><!-- End container -->
  </div>
  <!-- End resume page -->

  <!-- Contact page -->
  <div class="tab-pane" id="contact">
    <div class="container">
      <!-- Contact jumbotron -->
      <div class="jumbotron contact-jumbotron">
        <div class="row">
          <!-- Column for contact page -->
          <div class="col-sm-12">
            <!-- Contact wrapper div -->
            <div class="contact-wrapper">
              <!-- Contact sidebar -->
              <div class="contact-sidebar-wrapper">
                <!-- Email blovk -->
                <div class="container-block">
                  <h2 class="container-block-title">Email</h2>
                  <!-- Social Buttons group -->
                  <div class="button-group">
                    <a class="btn btn-block btn-social btn-github" href="mailto:brandon_clothier@mymail.eku.edu"><span class="fa fa-envelope"></span>brandon_clothier@mymail.eku.edu</a>
                    <a class="btn btn-block btn-social btn-github" href="mailto:brandon14125@gmail.com"><span class="fa fa-envelope"></span>brandon14125@gmail.com</a>
                  </div>
                  <!-- End Social Buttons group -->
                </div>
                <!-- End email block -->
                <!-- Social media block -->
                <div class="container-block">
                  <h2 class="container-block-title">Social Media:</h2>
                  <!-- Social Buttons groups -->
                  <div class="button-group">
                    <a class="btn btn-block btn-social btn-facebook" href="https://www.facebook.com/brandon14125"><span class="fa fa-facebook"></span>Brandon Clothier on Facebook</a>
                    <a class="btn btn-block btn-social btn-google" href="https://plus.google.com/+BrandonClothier"><span class="fa fa-google"></span>Brandon Clothier on Google+</a>
                    <a class="btn btn-block btn-social btn-instagram" href="https://www.instagram.com/b_randon14"><span class="fa fa-instagram"></span>@b_randon14 on Instagram</a>
                    <a class="btn btn-block btn-social btn-twitter" href="https://twitter.com/inhal3exh4le"><span class="fa fa-twitter"></span>@inhal3exh4le on Twitter</a>
                    <a class="btn btn-block btn-social btn-tumblr" href="https://brandon14125.tumblr.com/"><span class="fa fa-tumblr"></span>@brandon14125 on Tumblr</a>
                    <a class="btn btn-block btn-social btn-github" href="https://www.github.com/brandon14"><span class="fa fa-github"></span>brandon14 on Github</a>
                    <a class="btn btn-block btn-social btn-linkedin" href="https://www.linkedin.com/in/brandon-clothier-16190b123"><span class="fa fa-linkedin"></span>Brandon Clothier on LinkedIn</a>
                  </div>
                  <!-- End social buttons group -->
                </div>
                <!-- End social media block -->
              </div>
              <!-- End contact sidebar -->
              <!-- Contact main div -->
              <div class="contact-main-wrapper">
                <!-- Contact me section -->
                <section class="section">
                  <h2 class="section-title"><i class="fa fa-envelope"></i>Contact Me</h2>
                  <!-- Contact form -->
                  <form id="contact-form" role="form">
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
                    <!-- Send form group -->
                    <div class="form-group">
                      <button id="send-email" type="submit" class="btn btn-raised btn-primary" aria-label="send">Send</button>
                      <!-- End placeholder for form validation alert -->
                    </div>
                    <!-- End send form group -->
                  </form>
                  <!-- End contact form -->
                </section>
                <!-- End contact med section -->
              </div>
              <!-- End contact main div -->
            </div>
            <!-- End contact wrapper div -->
          </div>
          <!-- End column for contact pafe -->
        </div> <!-- End row -->
      </div>
      <!-- End contact jumbotron -->
    </div> <!-- End container -->
  </div>
  <!-- End contact page -->
</div>
<!-- End tab content -->

<!-- Footer -->
<footer class="footer">
  <div class="container">
    <div id="copyright">
      Copyright &copy; <?php echo date('Y') ?> - Brandon Clothier
      <br/>Website last updated <?php echo getLastModifiedTime(); ?>.
    </div>
  </div>
</footer>
<!-- End footer -->

<!-- Dark overlay -->
<div class="dark-overlay" hidden>
</div>
<!-- End dark overlay -->

<!-- Scripts -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script type="text/javascript">
  window.jQuery
</script>
<!-- Bootstrap javascript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!-- Material design theme for Bootstrap javascript -->
<script src="/vendor/js/material.min.js"></script>
<script src="/vendor/js/ripples.min.js"></script>
<script src="/vendor/js/snackbar.min.js"></script>
<!-- Ajax JavaScript functions -->
<script src="/js/ajax.min.js"></script>
<!-- JavaSCript functions for the page operation -->
<script src="/js/page-functions.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="https://maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js"></script>
<!-- Init material design bootstrap -->
<script type="text/javascript">
  $.material.init();
</script>
<!-- End scripts -->
</body>

</html>