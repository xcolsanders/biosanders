<?php
	/* The following code is based off code from template monster.
	   Source: http://www.templatemonster.com/help/how-create-contact-form-html.html */

	/* Email address and message from form*/
	$field_email = $_POST['email'];
	$field_message = $_POST['message'];

	/* Email address msg will be sent to */
	$mail_to = 'brady.forcier1@gmail.com';
		
	/* Generic subject for msg */
	$subject = 'Message from a site visitor!';

	/* Assigns sender's email address to $field_email and message to $field_message */
	$body_message .= 'Reply to: '. $field_email . "\n";
	$body_message .= 'Message: '. $field_message;

	/* Sends the email */
	$mail_status = mail($mail_to, $subject, $body_message, $headers);
?>