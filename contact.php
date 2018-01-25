<?php

	if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $human = intval($_POST['human']);
    $from = 'Contact Form';
    $to = 'anruntti@gmail.com';
    $subject = 'Message from Contact form ';

    $body = "From: $name\n E-Mail: $email\n Message:\n $message";

    // Check if name has been entered
    if (!$_POST['name']) {
    	$errName = 'Please enter your name';
    }

    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    	$errEmail = 'Please enter a valid email address';
    }

    //Check if message has been entered
    if (!$_POST['message']) {
    	$errMessage = 'Please enter your message';
    }
    //Check if simple anti-bot test is correct
    if ($human !== 5) {
    	$errHuman = 'Your anti-spam is incorrect';
    }

    // If there are no errors, send the email
    if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
    	if (mail ($to, $subject, $body, $from)) {
    		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
    	} else {
    		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
    	}
    }
  }
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>This is my portfolio</title>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand pt-18" href="https://anna.suomenlapinkoira.net/">PORTFOLIO</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav pt-4">
            <li><a href="https://anna.suomenlapinkoira.net/cv.html">CV</a></li>
            <li><a class="active" href="https://anna.suomenlapinkoira.net/contact.php">CONTACT</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MY PROJECTS <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="https://anna.suomenlapinkoira.net/graphics.html">Graphics</a></li>
                  <li><a href="https://anna.suomenlapinkoira.net/website-projects.html">Web-site projects</a></li>
                  <li><a href="https://anna.suomenlapinkoira.net/photography.html">Photography</a></li>
                  <li><a href="https://anna.suomenlapinkoira.net/other.html">Other projects</a></li>
                </ul>
              </li>
          </ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a class="some-icon" href="https://www.facebook.com/sharer/sharer.php?u=https%3A//anna.suomenlapinkoira.net/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
						<li><a class="some-icon" href="https://twitter.com/home?status=https%3A//anna.suomenlapinkoira.net/"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
						<li><a class="some-icon" href="https://www.linkedin.com/shareArticle?mini=true&url=https%3A//anna.suomenlapinkoira.net/&title=&summary=&source="><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
					</ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
		<div class="header-area">
        <div class="container">
          <div class="header-text">
            <div class="header-box">
              <h1 class="hero-text">Anna Runtti Portfolio</h1>
            </div>
          </div>
        </div>
    </div>
		<div class="container">
      <div class="row contact">
        <div class="col-md-4">
          <h1>Contact me</h1>
          <h3>Contact details</h3>
          <p>
            Locality: Oulu<br>
            GSM: 0452346943<br>
            Email: anruntti@gmail.com
          </p>
        </div>
        <div class="col-md-8">
          <h2>You can also contact me with this form.</h2>
          <?php if ($result) { echo "<p class='text-danger'>$result</p>"; } ?>
          <form method="post" action="contact.php">
            <div class="form-group">
              <label for="formGroupExampleInput">Name*</label>
              <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Name" value="<?php if ($name) {echo htmlspecialchars($name); } ?>">
              <?php if ($errName) { echo "<p class='text-danger'>$errName</p>"; } ?>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Email*</label>
              <input type="text" class="form-control" name="email" id="formGroupExampleInput2" placeholder="Email" value="<?php if ($email) {echo htmlspecialchars($email); } ?>">
              <?php if ($errName) { echo "<p class='text-danger'>$errName</p>"; } ?>
            </div>
            <div class="form-group">
              <label for="exampleTextarea">Your message*</label>
              <textarea class="form-control" id="exampleTextarea" name="message" rows="5" placeholder="Your message"><?php if ($message) {echo htmlspecialchars($message); } ?></textarea>
              <?php if ($errName) { echo "<p class='text-danger'>$errName</p>"; } ?>
            </div>
            <div class="form-group">
          		<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
          		<div class="col-sm-10">
          			<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
          		</div>
              <?php if ($errName) { echo "<p class='text-danger'>$errName</p>"; } ?>
          	</div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <div class="form-group">

          	</div>
          </form>
        </div>
      </div>
    </div>

		<div class="projects">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-3 project-box text-center">
						<a href="https://anna.suomenlapinkoira.net/graphics.html"><div class="graphics-project">
							<div class="layer">
								<h2 class="text-uppercase text-white mt-75 pl-20 pr-20"><b>Graphics projects</b><h2>
							</div>
						</div></a>
					</div>
					<div class="col-12 col-md-6 col-lg-3 project-box text-center">
						<a href="https://anna.suomenlapinkoira.net/website-projects.html"><div class="website-project">
							<div class="layer">
								<h2 class="text-uppercase text-white mt-75 pl-20 pr-20"><b>Web-site projects</b><h2>
							</div>
						</div></a>
					</div>
					<div class="col-12 col-md-6 col-lg-3 project-box text-center">
						<a href="https://anna.suomenlapinkoira.net/photography.html"><div class="photography-project">
							<div class="layer">
								<h2 class="text-uppercase text-white mt-75 pl-20 pr-20"><b>Photography projects</b><h2>
							</div>
						</div></a>
					</div>
					<div class="col-12 col-md-6 col-lg-3 project-box text-center">
						<a href="https://anna.suomenlapinkoira.net/other.html"><div class="other-project">
							<div class="layer">
								<h2 class="text-uppercase text-white mt-75 pl-20 pr-20"><b>Other projects</b><h2>
							</div>
						</div></a>
					</div>
				</div>
			</div>
		</div>
			</div>
			<footer class="footer">
	      <div class="container">
	        <p class="text-muted">
	          Anna Runtti<br>
						<a href="tel:+358452346943">+358 45 234 6943</a><br>
	          <a href="maito:anruntti@gmail.com">Email: anruntti@gmail.com</a>
	        </p>
	      </div>
	    </footer>
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		 <!-- Include all compiled plugins (below), or include individual files as needed -->
		 <script src="js/bootstrap.min.js"></script>
		 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
      </body>
  </html>
