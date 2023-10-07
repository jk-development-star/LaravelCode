<?php
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
function email_function($mail,$to,$mailurl,$subject,$msg){
	
	$mail->IsSMTP();                           
	$mail->SMTPDebug = 1;
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'ssl';
	$mail->Host = 'mail.exclusivescript.com';  
	$mail->Port = 465;  
	$mail->IsHTML(true);     
	$mail->Username = 'support@exclusivescript.com';         
	$mail->Password = 'inetsol@321';                         
	$mail->setFrom($mailurl, 'Mailer');      
	$mail->Subject = $subject;
	$mail->Body    = $msg;
	$mail->addAddress($to, 'Joe User');   
	
	if(!$mail->send()) {
	    $ret = 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    $ret = "scs";
	}
    return $ret;
}
$msg="";
email_function($mail,'rajasekar.inet@gmail.com','support@exclusivescript.com','test mail',$msg);
?>