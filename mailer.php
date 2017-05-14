<?php

    // Only process POST reqeusts..
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $fname = strip_tags(trim($_POST["firstName"]));
				$fname = str_replace(array("\r","\n"),array(" "," "),$fname);
        $lname = strip_tags(trim($_POST["lastName"]));
				$lname = str_replace(array("\r","\n"),array(" "," "),$lname);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);

        // Check that data was sent to the mailer.
        if ( empty($fname) OR empty($lname) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "celso@dsignerds.com";

        // Set the email subject.
        $subject = "New contact from $fname $lname";

        // Build the email content.
        // $email_content = "Name: $fname $lname\n";
        // $email_content .= "Email: $email\n\n";
        // $email_content .= "Message:\n$message\n";
        // $email_content .= "<ul><li>$fname</li></ul>";
        $email_content = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'/><title>Greetings!</title>";
        $email_content .= "<style type='text/css'><!-- .callToAction {	color: #FFF;} --></style></head>";
        $email_content .="<body><table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' background='img/background.png' bgcolor='#f7f7f7' style='background-size: auto; background-position:top; background-repeat: repeat-x; color: #ea0071;'><tr><td align='center'><table class='table600' width='600' border='0' align='center' cellpadding='0' cellspacing='0'><tr><td height='30'></td></tr></table><table class='table600' bgcolor='#FFFFFF' align='center' width='600' border='0' cellspacing='0' cellpadding='0'><tr><td height='25'></td></tr><tr><td align='center'><table class='table-inner' width='550' border='0' align='center' cellpadding='0' cellspacing='0'><tr><td align='center' bgcolor='#ffffff' style='line-height:40px; font-size:16px; color: #2e2956; text-align: center;'><span style='line-height:1px; text-align: center;'><a href='http://dev.hookup.auction:3069'><img src='http://dsignerds.com/party_planning/HTML%20EMAIL/images/logosFinal.png' alt='Hookup.auction logo' width='258' height='45'/></a></span></td></tr><tr><td align='center' bgcolor='#ffffff' style='border-bottom:1px dotted #9aa4a5;'>&nbsp;</td></tr><tr><td align='center' bgcolor='#ffffff' style='line-height:50px; font-size:16px; color: #2e2956; text-align: left;'><h2>Action Required: Email validation</h2></td></tr><tr><td height='10'></td></tr><tr><td height='35' style='font-size:14px; color:#212121; line-height:24px; font-family: Arial, Helvetica, sans-serif;'><p>Hi, This is a message from $fname - $_POST["email"] :</p><br />$message<br /><br /><br /> Click <a href='http://dev.hookup.auction:3069/action-validate-email?linkEmail=jerry.barnett@gmail.com&linkArg=XFWi7Rd78h' style='font-weight: bold; color: #ea0071;' target='_blank'>here</a> to validate your email address and get started searching for hookups in your area.<br /> <br /> If that doesn't work, copy and paste this URL into your browser: <br /> http://dev.hookup.auction:3069/action-validate-email?linkEmail=jerry.barnett@gmail.com&amp;linkArg=XFWi7Rd78h<br /></p></td></tr><tr><td height='30' style='border-bottom:1px dotted #9aa4a5;'></td></tr></table></td></tr></table><table bgcolor='#ffffff'align='center' class='table600' width='600' border='0' cellspacing='0' cellpadding='0'><tr><td height='10'></td></tr></table><table bgcolor='#FFFFFF' align='center' class='table600' width='600' border='0' cellspacing='0' cellpadding='0'><tr><td align='center'><table class='table-inner' width='550' border='0' cellspacing='0' cellpadding='0'><tr><td height='10' style='border-bottom:1px dotted #9aa4a5;'></td></tr><tr><td height='30' align='center' bgcolor='#2e2956' style='padding: 20px; color: #ffffff; font-size: 20px; line-height:44px;'><strong> <span class='callToAction'>Any Questions?</span></strong><table class='textbutton' bgcolor='#ea0071' style='border-radius:30px;' width='110' border='0' cellspacing='0' cellpadding='0'><tr><td width='10'></td><td height='30' align='center' style='font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#ea0071; line-height:24px; text-decoration: none;'><a href='http://dev.hookup.auction:3069' target='_blank' style='text-decoration: none; color:#FFF;'>Visit website</a></td><td width='10'></td></tr></table></td></tr><tr><td height='10'></td></tr></table></td></tr></table><table bgcolor='#ffffff'align='center' class='table600' width='600' border='0' cellspacing='0' cellpadding='0'><tr><td height='10'></td></tr><tr><td align='center' ><table align='center' class='table-inner' width='550' border='0' cellspacing='0' cellpadding='0'><tr><td height='20' style='border-top: 1px dotted #9aa4a5;'></td></tr><tr><td><table align='center'><tr><td style='line-height:0px;' align='center'><a href='https://www.facebook.com/hookupauction'> <img style='display:block; line-height:0px; font-size:0px; border:0px;' src='http://dsignerds.com/party_planning/HTML%20EMAIL/images/facebook_social_circle.png' alt='twitter' width='35' height='35' /></a></td><td width='13'></td><td style='line-height:0px;' align='center'><a href='https://twitter.com/hookupauction'> <img style='display:block; line-height:0px; font-size:0px; border:0px;' src='http://dsignerds.com/party_planning/HTML%20EMAIL/images/twitter_social_circle.png' alt='twitter' width='35' height='35' /></a></td><td width='13'></td><td style='line-height:0px;' align='center'><a href='http://dev.hookup.auction:3069'> <img style='display:block; line-height:0px; font-size:0px; border:0px;' src='http://dsignerds.com/party_planning/HTML%20EMAIL/images/logo_website.png' alt='twitter' width='35' height='35' /></a></td><td width='13'></td><td style='line-height:0px;' align='center'><a href='http://dev.hookup.auction:3069'> <img style='display:block; line-height:0px; font-size:0px; border:0px;' src='http://dsignerds.com/party_planning/HTML%20EMAIL/images/mail_email_envelope.png' alt='twitter' width='35' height='35' /></a></td></tr><tr></tr></table></td></tr><tr><td height='10'></td></tr></table></td></tr></table><table bgcolor='#ffffff'align='center' class='table600' width='600' border='0' cellspacing='0' cellpadding='0'><tr><td height='25' bgcolor='#f7f7f7' style=' font-size:10px; line-height:0px; text-align:center;'>© Copyright of hookup.auction:3069 Limited 2017</td></tr></table></td></tr></table>";
	
        // $email_content .= "<h1 style='color:#f40;'>Hi! a message from: $fname!</h1>";
        // $email_content .= "<p style='color:#080;font-size:18px;'>$message</p>";
        $email_content .= "</body></html>";

        // Build the email headers.
        $email_headers .= "From: $fname <$email>";
        $email_headers .= "Reply-To: $email\r\n";
        $email_headers  = "MIME-Version: 1.0\r\n";
        $email_headers .= "Content-Type: text/html; charset=UTF-8\r\n";
       

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
