@extends('main')
@section('title', 'Brandon Clothier')
@section('content')

<!-- Landing section -->
<!-- Intro Section -->
<section id="landing" class="section landing-section">
  <div class="quote-container">
    <div class="quote">
      "There is only one corner of the universe you can be certain of improving, and that's your own self."
    </div>
    <div class="author">
      - Aldous Huxley
    </div>
  </div>
  <div class="down-arrow-container">
    <a class="page-scroll" href="#about"><span class="glyphicon glyphicon glyphicon-chevron-down"></span></a>
  </div>
</section>
<!-- End landing section -->
<!-- About Section -->
<div class="container">
  <section id="about" class="section about-section">
    <div class="row">
      <!-- About column -->
      <div class="col-lg-12">
        <h1>About</h1>
        <hr>
        <p>
          I am a full stack PHP developer with a passion for pushing myself to learn new things. I always strive to
          stay up to date with modern practices in the web development industry. The industry moves at a break-neck
          speed and one must keep up with the pace. I enjoy working on projects in my spare time which is where the
          idea to design this website came from. At work, I mostly deal with PHP and JavaScript using a in-house PHP
          framework. I my spare time I enjoy learning new technologies and furthering my software development skill set.
        </p>
        <p>
          I started out creating this website to further my HTML, CSS and JavaScript skills because in school most of the
          focus was not on web development. After getting a job as a full stack PHP developer, I decided I needed to hone
          my web development skills. This website was originally designed with Twitter's Bootstrap CSS framework and used
          jQuery. I have since ported the website over to the Laravel PHP framework. Bootstrap and jQuery are still used,
          and I have switched to webpack (using Laravel's mix tooling) to compile ES6 JavaScript to ES5 with babel and
          bundle everything up.
        </p>
        <p>
          I also have a project that I am working on called Expnsr that will be a RESTful API designed in Laravel for
          budget planning, checkbook management and bill reminders. The idea is to write the API and then use a front-end
          single page web application to consume the API, with the ability to eventually connect more clients to the API.
          If you would like to see the progress on the Expnsr API feel free to visit the
          <a href="https://github.com/brandon14/expnsr-api" target="_blank">
            Expnsr API on github
          </a>. It will be free and open source, and released under the MIT license. The source code for this website is
          also available free and open source <a href="https://github.com/brandon14/my-website" target="_blank">here</a>.
        </p>
          Overview of software development skills:
          <ul>
            <li>PHP, JavaScript, Java, C# and Python languages</li>
            <li>PostgreSQL, MySQL, SQLite, and Oracle SQL DBMS</li>
            <li>PHP MVC frameworks such as Laravel and Symfony</li>
            <li>Front-end MVC frameworks such as AngularJS</li>
            <li>Agile development</li>
            <li>Modern software design patterns such as MVC and dependency injection</li>
            <li>SOLID principles</li>
          </ul>
        </p>
      </div>
    </div> <!-- End row -->
  </section>
  <!-- End about section -->
  <!-- Resume section -->
  <section id="resume" class="section resume-section">
    <div class="row">
      <!-- Resume column -->
      <div class="col-lg-12">
        <h1>Resume</h1>
        <hr>
        <!-- Thanks to Xiaoying Riley for the Orbit resume template -->
        <!-- Resume wrapper -->
        <div class="wrapper">
          <!-- Resume sidebar -->
          <div class="sidebar-wrapper">
            <!-- Profile container -->
            <div class="profile-container">
              <img class="profile" src="images/profile-small.png" alt="Profile Image" />
              <h1 class="name">Brandon Clothier</h1>
              <h3 class="tagline">Web Developer</h3>
            </div>
            <!-- End profile-container-->

            <!-- Contact container -->
            <div class="contact-container container-block">
              <ul class="list-unstyled contact-list">
                <li class="email">
                  <i class="fa fa-envelope"></i><a href="mailto:brandon14125@gmail.com" target="_blank">brandon14125@gmail.com</a>
                </li>
                <li class="website">
                  <i class="fa fa-globe"></i><a href="https://brandonclothier.me" target="_blank">brandonclothier.me</a>
                </li>
                <li class="github">
                  <i class="fa fa-github"></i><a href="https://github.com/brandon14" target="_blank">github.com/brandon14</a>
                </li>
                <li class="twitter">
                  <i class="fa fa-twitter"></i><a href="https://twitter.com/inhal3exh4le" target="_blank">@inhal3exh4le</a>
                </li>
                <li class="linkedin">
                  <i class="fa fa-linkedin"></i><a href="https://www.linkedin.com/in/brandon-clothier-16190b123" target="_blank">Brandon Clothier</a>
                </li>
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
            <section class="summary-section resume-section">
              <h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
              <div class="summary">
                <p>Highly motivated and hardworking individual seeking full-time software developer position. Experienced in
                   Computer Science and software development. Experienced with PHP, PostgreSQL, JavaScript, Java,
                   MySQL, HTML, C#, Linux operating systems, classroom software engineering experience, and Android
                   SDK experience. Also, experienced in customer service, and team work environments.</p>
              </div>
            </section>
            <!-- End summary section -->

            <!-- Experience section -->
            <section class="experiences-section resume-section">
              <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>

              <!-- Experience  item -->
              <div class="item">
                <div class="meta">
                  <div class="upper-row">
                    <h3 class="job-title">Web Developer</h3>
                    <div class="time">2016 - Present</div>
                  </div><!-- End upper-row-->
                  <div class="company">Troll And Toad, Corbin, KY</div>
                </div><!-- End meta -->
                <div class="details">
                  <p>I maintain and develop trollandtoad.com, an eCommerce web application. The front end consists of HTML5
                     and CSS, with JavaScript as the scripting language. The backend consists of a custom PHP framework
                     and a PostgreSQL database. I integrated Amazon Pay payment system into our
                     eCommerce system.</p>
                  <p>I also participate on a team to refactor legacy code using modern PHP standards such as class autoloading
                     and dependency injection. I am the lead on the team for autoloading.</p>
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
                  <p>Worked in a small team of three to design and implement an online store website with a functional MySQL database. Used ASP.NET and C# in order to implement
                     the website. Used UML to design the software system initially, complete with design and requirement specification documents.</p>
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
                  <p>Worked in a small team of three to design, schedule and implement a meeting planner application with a functional MySQL database. Used C# and Windows Forms
                     to implement a desktop meeting planner application for the Windows operating system. Used UML to design the software initially, complete with requirement
                     and design specification documents. Used Microsoft Project to implement a schedule and Gantt Chart to schedule the design and implementation of the software
                     system. Used Microsoft Team Foundation Server using the git version control system to coordinate the coding of the software with the team.</p>
                </div>
              </div>
              <!-- End experience item -->

            </section>
            <!-- End experience section-->

            <!-- Projects section -->
            <section class="projects-section resume-section">
              <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
              <div class="intro">
                <p>I enjoy working on software projects in my free time. Most of my work can be found at my Github:
                  <a class="link" href="https://github.com/brandon14" target="_blank">github.com/brandon14</a></p>
              </div>
              <!-- End intro-->

              <!-- Project item -->
              <div class="item">
                <span class="project-title">
                  <a class="link" href="https://github.com/brandon14/brandonclothier.me" target="_blank">brandonclothier.me</a>
                </span> -
                <span class="project-tagline">The source code for this website. It is developed with Laravel, a PHP MVC framework.</span>
              </div>
              <!-- End project item -->

              <!-- Project item -->
              <div class="item">
                <span class="project-title">
                  <a class="link" href="https://github.com/brandon14/expnsr-webapp" target="_blank">Expnsr Web Application</a>
                </span> -
                <span class="project-tagline">This project will eventually serve as the web application to consume the Expnsr API I am working
                    on. The Expnsr API will allow users to manage bills, keep track of account balances and manage budgets.</span>
              </div>
              <!-- End project item -->

              <!-- Project item -->
              <div class="item">
                <span class="project-title">
                  <a class="link" href="https://github.com/brandon14/expnsr-api" target="_blank">Expnsr API</a>
                </span> -
                <span class="project-tagline">This repository will house the API for Expnsr. It will be developed as a RESTful API using Laravel with
                    dingo-api. The front-end web application (and in the future an Android and iOS app) will be able to consume the API.</span>
              </div>
              <!-- End project item -->

              <!-- Project item -->
              <div class="item">
                <span class="project-title"><a class="link" href="https://github.com/brandon14/checkbook">Checkbook</a></span> -
                <span class="project-tagline">An Andorid checkbook register application built using the Material Design library from Google. It is a work
                    in progress and will be fully functional eventually.</span>
              </div>
              <!-- End project item -->

              <!-- Project item -->
              <div class="item">
                <span class="project-title">
                  <a class="link" href="https://github.com/brandon14/simple-calc" target="_blank">SimpleCalc</a>
                </span> -
                <span class="project-tagline">A Java Swing calculator application I wrote as a Sophomore at EKU. It uses the BigDecimal class for the number
                    crunching, and is designed to function like the Windows 7 Calculator program.</span>
              </div>
              <!-- End project item -->

              <!-- Project item -->
              <div class="item">
                <span class="project-title">
                  <a class="link" href="https://github.com/brandon14/meeting-coordinator-team" target="_blank">Meeting Coordinator</a>
                </span> -
                <span class="project-tagline">This was the team project for CSC 440 Software Engineering at EKU. It is a Windows Forms .NET desktop application
                    that allows users to schedule and plan meetings with other users.</span>
              </div>
              <!-- End project item -->

            </section>
            <!-- End projects section-->

            <!-- Skills section -->
            <section class="skills-section resume-section">
              <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
              <!-- Skillsets -->
              <div class="skillset">
                <!-- PHP skill item -->
                <div class="item">
                  <h3 class="level-title">PHP</h3>
                  <div class="level-bar">
                    <div class="level-bar-inner" data-level="95%">
                    </div>
                  </div><!-- End level-bar-->
                </div>
                <!-- End PHP skill item -->

                <!-- PostgreSQL skill item -->
                <div class="item">
                  <h3 class="level-title">PostgreSQL</h3>
                  <div class="level-bar">
                    <div class="level-bar-inner" data-level="85%">
                    </div>
                  </div><!-- End level-bar-->
                </div>
                <!-- End PostgreSQL skill item -->

                <!-- MVC skill item -->
                <div class="item">
                  <h3 class="level-title">MVC Web Frameworks</h3>
                  <div class="level-bar">
                    <div class="level-bar-inner" data-level="75%">
                    </div>
                  </div><!-- End level-bar-->
                </div>
                <!-- End MVC skill item -->

                <!-- Git skill item -->
                <div class="item">
                  <h3 class="level-title">Git</h3>
                  <div class="level-bar">
                    <div class="level-bar-inner" data-level="95%">
                    </div>
                  </div><!-- End level-bar-->
                </div>
                <!-- End Git skill item -->

                <!-- Front-end MVC skill item -->
                <div class="item">
                  <h3 class="level-title">Front-end MVC Frameworks</h3>
                  <div class="level-bar">
                    <div class="level-bar-inner" data-level="70%">
                    </div>
                  </div><!-- End level-bar-->
                </div>
                <!-- End Front-end MVC skill item -->

                <!-- JavaScript skill item -->
                <div class="item">
                  <h3 class="level-title">JavaScript &amp; jQuery</h3>
                  <div class="level-bar">
                    <div class="level-bar-inner" data-level="95%">
                    </div>
                  </div><!-- End level-bar-->
                </div>
                <!-- End JavaScript skill items -->

                <!-- HTML5 skill item -->
                <div class="item">
                  <h3 class="level-title">HTML5 &amp; CSS3</h3>
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
              <h2 class="section-title"><i class="fa fa-download"></i><a href="/files/resume.pdf">Download Resume</a></h2>
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
  </section>
  <!-- End resume section -->
  <!-- Contact section -->
  <section id="contact" class="section contact-section">
    <div class="row">
      <!-- Column for contact page -->
      <div class="col-sm-12">
        <h1>Contact</h1>
        <hr>
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
      </div>
      <!-- End column for contact page -->
    </div>
    <!-- End row -->
  </section>
  <!-- End contact section -->
</div>
@endsection
