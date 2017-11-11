<?php
require 'phpmailer/PHPMailerAutoload.php';

function xmail($to,$message='',$subject=''){
	global $cfg;

	$mail = new PHPMailer;
	$mail->setFrom($cfg->email_from_email, $cfg->email_from_name);
	$mail->addAddress($to, $to);
	$mail->Subject = $subject;
	$mail->msgHTML($message);

	if (!$mail->send()) {
	    return 0;
	} else {
	    return 1;
	}
}

?>