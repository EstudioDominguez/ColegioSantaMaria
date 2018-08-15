<?php

//-----------detecto acentos o caracteres especiales
$contact_name = utf8_decode($_POST['name']); 

$contact_tel = $_POST['tel'];
$contact_email = $_POST['email'];
//$contact_subject = $_POST['subject'];

//-----------detecto acentos o caracteres especiales
//$contact_message = utf8_decode($_POST['message']); 

//--------detecta saltos de linea-----------------------------------
//$formatComments=str_replace( urldecode("%0D"),"\n",$contact_message);


if( $contact_name == true ){

	$sender = $contact_email;

	$receiver = "matias@estudiodominguez.com.ar\n";

	$client_ip = $_SERVER['REMOTE_ADDR'];

	$email_body = "Datos enviados desde el sitio web\nEsta persona desea recibir promociones y participar en sorteos\n\n____________________________________________________\n\nNombre: $contact_name \nE-mail: $sender \nTel: $contact_tel \n____________________________________________________\n\nEnviado desde IP: $client_ip ";		

	$extra = "From: $sender\r\n" . "Reply-To: $sender \r\n" . "X-Mailer: PHP/" . phpversion();


	//---comprueba si se envio el email-------------------------------

	if( mail( $receiver, "Datos enviados desde el sitio web - $subject", $email_body, $extra ) ) 	{
		echo "success=yes";
	}else{
		echo "success=no";
	}
}
?>