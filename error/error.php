<!DOCTYPE html>
<html lang="en">

<head>
  <!-- General metadata -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"              content="width=device-width, initial-scale=1">
  <meta name="description"           content="Custom error page.">
  <meta name="author"                content="Brandon Clothier">
  <link rel="copyright"              href="#copyright">
  <!-- TODO: Create a page favicon for the website -->

  <!-- Theme meta for Google Chrome on Android -->
  <meta name="theme-color"           content="#ff5722">
<?php
$gStatus = $_SERVER['REDIRECT_STATUS'];
$gCodes = array(
        403 => array('403 Forbidden', 'Yo! I says you can\'t go here!.'),
        404 => array('404 Not Found', 'Sorry man I couldn\'t find your file.'),
        405 => array('405 Method Not Allowed', 'You POST\'ed when you should\'ve GET\'ed or something.'),
        408 => array('408 Request Timeout', 'Your browser wasn\'t fast enough to send a request in the time allowed by the server.'),
        500 => array('500 Internal Server Error', 'I think I may have broke something.'),
        502 => array('502 Bad Gateway', 'My server is all messed up man I\'m sorry.'),
        504 => array('504 Gateway Timeout', 'The upstream server is taking all day, my server is impatient.'));

$gTitle = $gCodes[$gStatus][0];
$gMessage = $gCodes[$gStatus][1];
$gApology = 'I apologize for the inconvience. I\'m working to hard unbreak stuffs';

if ($gTitle === false || strlen($gStatus) !== 3) {
  $gMessage = 'Erm... Me no understand that status code.';
}
?>

  <title>Error! - <?php echo $gTitle ?></title>

  <!-- Material Design fonts -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Bootstrap Material Design -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.material-design/0.5.10/css/bootstrap-material-design.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.material-design/0.5.10/css/ripples.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/brandon.css">
  <link rel="stylesheet" href="css/offcanvas.css">

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
      <a class="navbar-brand visible-xs" href="#">Brandon Clothier</a>
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
        <li><a href="../">Home</a></li>
      </ul>
    </div>
    <!-- End navbar items -->
  </div>
</nav>
<!-- End navbar -->

<div class="tab-content">
  <div class="tab-pane active">
<?php
echo '<div class="container">
        <div class="jumbotron">
          <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
              <p><h2>'.$gTitle.'</h2></p>
              <p>'.$gMessage.'</p>
              <p class="small">'.$gApology.'</p>
            </div>
            <div class="col-sm-3">
            </div>
          </div>
        </div>
      </div';
?>
  </div>
</div>

<!-- Footer -->
<footer class="footer">
  <div class="container">
    <div id="copyright">
      Copyright &copy; <?php echo date('Y') ?> - Brandon Clothier
    </div>
  </div>
</footer>
<!-- End footer -->

<!-- Dark overlay -->
<div class="dark-overlay" hidden>
</div>
<!-- Dark overlay -->

<!-- Scripts -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script type="text/javascript">
  window.jQuery
</script>
<!-- Bootstrap javascript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!-- JavaScript for page functions -->
<script src="js/brandon-page-functions.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="https://maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
