<?php


session_start();
//captcha session start



// Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["con_name"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["con_email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["con_message"]);

		if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
		{
			$captcha_code = 1;
		}
		else
		{
			$wrong_code = 1;
			$captcha_code = NULL;
		}

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($captcha_code) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            if($wrong_code) {
				echo "The wrong code was entered.";
				exit;
			} else {
				echo "Oops! There was a problem with your submission. Please check all form entries and try again.";
            	exit;
			}
        }

        // Set the recipient email address.
        $recipient = "juneb67@gmail.com";

        // Set the email subject.
        $subject = "New contact from $name";

        // Build the email content.
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Build the email headers.
        $email_headers = "From: $name <$email>";

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
        echo "You have reached this page in error.<br>Or, there was a problem with your submission, please try again.<br>";
		echo '<a href="http://www.cds.junebowman.com/form/">Contact Page</a><br>';
		echo '<a href="http://www.cds.junebowman.com">Home Page</a><br>';
		
    }


?>