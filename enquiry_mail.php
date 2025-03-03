<!------------------------------------------------>
<?php 
// if the url field is empty
if(isset($_POST['url']) && $_POST['url'] == ''){ 
	// put your email address here
	$awc_contact1 = "service";
	$awc_contact2 = "@";
	$awc_contact3 = "artisanwebcoders.com";
	$youremail =  $awc_contact1.$awc_contact2.$awc_contact3 ;
    $emailSubject = 'AWC Customer Enquiry';

	// prepare a "pretty" version of the message
	// Important: if you added any form fields to the HTML, you will need to add them here also
	$body = "Thank you for your enquiry $_POST[name]. We will be in touch with you within 2 business days.  Below are the details submitted via the form. :
	Name:  $_POST[name]
	Email: $_POST[email]
	Message: $_POST[message]";

	// Use the submitters email if they supplied one
	// (and it isn't trying to hack your form).
	// Otherwise send from your email address.
	if( $_POST['email'] && !preg_match( "/[\r\n]/", $_POST['email']) ) {
	  $headers = "From: $_POST[email]";
	} else {
	  $headers = "From: $youremail";
	}   
	// finally, send the message
	mail($youremail, $emailSubject, $body, $headers );   
}   
// otherwise, let the spammer think that they got their message through

// Re-direct the form to home page       
//Set Refresh header using PHP.    
header( "refresh:5;url=http://artisanwebcoders.com" ); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thanks for Your Enquiry</title>
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/font-awesome.min.4.7.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/icon.ico" />
</head>  
<body>
  <!-- customer enquiry form mailer -->
<div class="w3-container w3-content w3-center w3-padding-24" style="max-width:750px">
    <h2 class="w3-wide myheading">Thank You for your enquiry.</h2><br />
		<img src="images/enquiry_thanks.jpg" style="width:100%" alt="Thank You for your Enquiry!"><br />
	<p>We will be contacting you within one working day.</p><br />

	<a href='http://artisanwebcoders.com' class='w3-button w3-round-large w3-green w3-hover-blue w3-ripple w3-margin'> <i class='fa fa-home w3-margin-right'></i> Return to Home Page </a>
</div><!--/ customer enquiry form mailer -->

</body>
</html>

