

<!DOCTYPE html>
<html lang="en">
<head>
		<title>Message Delivery</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel ="shortcut icon" href="images/logo.ico" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet" />
		<script src="js/jquery-1.8.3.min.js"></script>
		<script src="css/5grid/init.js?use=mobile,desktop,1000px"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/5grid/core.css" />
			<link rel="stylesheet" href="css/5grid/core-desktop.css" />
			<link rel="stylesheet" href="css/5grid/core-1200px.css" />
			<link rel="stylesheet" href="css/5grid/core-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->
	</head>
<body>
<!-- Nav -->
			<nav id="nav">
				<ul>
					<li><a href="index.html">Home</a></li>
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<li><div id="nav2"><b><i>Phone: &nbsp;</i></b>0121-293-0687</div></li>
				</ul>
				
				
			</nav> <br><br><br>


	<!-- Delidery Status  -->		
			<div class="wrapper wrapper-style1 wrapper-first">
				<article class="5grid-layout" id="top">
					<div class="row">
						<div class="4u">
							<span class="me image image-full"><img src="images/logo.jpg" alt="" /></span>
						</div>
						<div class="8u">
							<header>
							
							<?php

$problem = FALSE; // no problems!
$theErrors = array();
$email = $_POST['email'];

if (empty ($_POST['name'])) {    // Remind the user to type his Name

$problem = TRUE;
$theError= ("<li><i>Please tell us your <b>Name</b>.</i></li>");
$theErrors[]= $theError;
}


if ( empty ($_POST['subject']))  {    // Remind the user to type the subject of his message

$problem = TRUE;
$theError= ("<li><i>Let us know the <b>Subject of your message</b>.</i></li>");
$theErrors[]= $theError;
}


if ( empty ($_POST['message'])) {    // Remind the user to type a message

$problem = TRUE;
$theError= ("<li><i>Please type in your <b>Message</b> so we can know how to assist you.</i></li>");
$theErrors[]= $theError;
}


if((!empty ($_POST['email'])) || (!empty ($_POST['work_phone']) ) || (!empty ($_POST['mobile_phone']) ) )
    
    
	{
        if (!empty ($_POST['email']))
            {
               if (!(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)))
                  {
                      $problem = TRUE;
                       $theError= ("<li><i>Please type in a correct <b>Email</b> </i></li>");
                       $theErrors[]= $theError;
                    }
             }
	      // we leave empty so it doesn't return any error message since there is  contact detail
	}
else
	{
	$problem = TRUE;
	$theError=("<li><i>Please fill in a <b>Contact detail</b> so we can get in touch.</i></li>");
	$theErrors[]= $theError;
	}		 




if ($problem) { // if there are problems:

echo "<section id='content'><b>Sorry " . $_POST['name'] ."!</b> we noticed some errors with your form: <br><br> <ul>";

foreach ($theErrors as $error)
{
echo $error;
}
 echo "<br><br><br>Use the back button on your browser to return and complete details. <br><br><br><br><br> </ul></section>";
}
else   {
$mailMessage =  "Name: ". $_POST['name'] ."
Email: ". $_POST['email'] ."
Work Phone: ". $_POST['work_phone'] ."
Mobile Phone: ". $_POST['mobile_phone'] ."
Subject: ". $_POST['subject'] . "
Message: ". $_POST['message'] . "




This is an automatically generated message, confirming that a new mail has been received via the 
contact form on your website www.cayana.co.uk

Contact this customer using the details above

Thanks
";
$mailSubject = $_POST['subject']; // subject of the email.
$mailSender =( "From: " .  $_POST['email']);
$adminEmail = ("contact@cayana.co.uk");
$theReceiver = ($_POST['email']);
$theSubject = ("Re: " . $mailSubject);
$adminSender = ("From: CAYANA<". $adminEmail . ">");
$returnPath = ("-f".$adminEmail);     // THe -f marks the Return-Path which should bethe same with the "From:"
$theMessage =
"Dear ". $_POST['name'] . ",

Thank you for contacting CAYANA Services.

This is to confirm that we have received your message.

Be rest assured that we will get in touch with you within 24 hours.
We pride in providing quality services to our clients.

You can always visit our website:  www.cayana.co.uk   for updated information.

Regards.


CAYANA Services
contact@cayana.co.uk
+44(0)121-293-0687


Happy customer tells a friend and an unhappy customer tells the world !!

";


mail ($adminEmail, $mailSubject , $mailMessage , $mailSender ); // Send the email to the administrator.
mail ($theReceiver, $theSubject , $theMessage , $adminSender, $returnPath ); // Send auto confirmation email to the sender.

// Note: Using phpmailer() with some servers, gmail will write in the header a "via  ****.net"

?>

								<h3 class="p1">Message Delivered !</h3><br>
								<h3>Thank you <b><?php echo $_POST['name']; ?></b> for Contacting <strong>Cayana Services</strong>.</h3>
							</header>
							<p>We will contact you shortly on the contact details you provided</p>
							
							<a href="index.html" class="button button-big">Go back to Home</a>
							<?php echo "<br><br><br><br>"; ?>
						</div>
						
					</div>
				</article>
			</div>






<?php 
}
?>

		<footer>
			<p id="copyright">
				&copy; 2014 Cayana Services &nbsp;&nbsp;&nbsp; |  &nbsp;&nbsp;&nbsp;&nbsp;Site Designed & Maintained by: Michael Ifeorah (<a href="http://www.webgroove.net">WebGroove Systems</a>)
			</p>
		</footer>
	
	</body>
</html>


