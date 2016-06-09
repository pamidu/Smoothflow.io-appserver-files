
<?php
if(isset($_POST['nl-submit'])) {	 
	function died($error) {
		echo $error."<br /><br />";
		echo "Please go back and try again.<br /><br />";
		die();
	}
	
	// validation expected data exists
	if(!isset($_POST['nl-submit'])) {
		died('We are sorry, but there appears to be a problem with the form you submitted.');       
	}
	
	$email_to 			= "info@smoothflow.com";
	//$email_to 			= "nalakalakmal19@.com";
	$email_subject 	= "Newsletter subscription";
	$email_from 		= $_POST['nl-email'];

	$error_message = "";
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	if(!preg_match($email_exp,$email_from)) {
		$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
	}

	$email_message = "A user with below email address has signed up for the Newsletter .<br><br>\n\n";
	$email_message .= "Email: ". $email_from."\n";

	// create email headers
	$headers  = "From: Smooth Flow <no-reply@smoothflow.com>"."\r\n";
	//$headers  = "From: Smooth Flow <nalakalakmal19@gmail.com>"."\r\n";
	$headers .= 'Reply-To: '.$email_from."\r\n";
	$headers .= "Bcc: nalaka@benworldwide.com"."\r\n";
	$headers .= 'X-Mailer: PHP/' . phpversion();
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	mail($email_to, $email_subject, $email_message, $headers);  

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Smooth Flow</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/landing.css" type="text/css" />
</head>

<body>
	<section class="content clearfix">
		<div class="col-6 right">
			<div class="block logo-area">
				<div id="logo-wrapper">
					<img src="images/smooth-flow-final-logo.png" alt="logo" width="" height="" id="logo" />
				</div>
				<h1>Explore the myriad of features available and get connected to start building smoother workflows</h1>
				<ul class="app-details">
					<li>Drag-and-drop Simplicity</li>
					<li>A Clear and Intuitive UI</li>
					<li>Collaborate using Import and Export</li>
					<li>Store Data for faster Retrieval</li>
				</ul>
			</div>
		</div>
		<div class="col-6 right">
			<div class="block">
				<img src="images/mac-image.png" alt="Smooth Flow" width="" height="" id="mac-image" />
			</div>
		</div>
	</section>

	<footer>
		<div class="row-top">
			<div class="col-12 clearfix">
				<div class="nl-wrapper">
					<h3>Be the first to know</h3>
					<form method="post" action="" name="newsletter">
						<input type="email" name="nl-email" class="nl-fld-email" placeholder="Your email address" />
						<input onclick="window.location='/app/auth/#/signup';" type="button" name="nl-submit" value="Sign up" class="btn nl-fld-submit" />
						<input onclick="window.location='/app/auth/#/login';" type="button" name="nl-submit" value="Login" class="btn nl-fld-submit" />
					</form>
				</div>
				<div class="contact-info">
					<h3>Contact information</h3>
					170 S Green Valley Parkway, Suite 300,<br>
					Henderson, Nevada 89012<br>
					Phone: +1 870-505-6540<br>
					Email: <a href="mailto:info@smoothflow.com">info@smoothflow.com</a>
				</div>
				<div class="social-icons">
					<a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
					<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
					<a href="#" target="_blank"><i class="fa fa-instagram"></i></i></a>
				</div>
			</div>
		</div>
		<div class="row-bottom">
			&copy; 2015 Smooth Flow. All Rights Reserved. | 
			<a href="//benworldwide.com" target="_blank">Benworldwide</a> | 
			<a href="//benworldwide.com/contact/site-survey/" target="_blank">Feedback</a>
		</div>
	</footer>
</body>
</html>


