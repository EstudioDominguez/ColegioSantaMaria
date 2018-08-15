<?php

//-----------detecto acentos o caracteres especiales
$contact_name = utf8_decode($_POST['name']); 
$contact_message = utf8_decode($_POST['message']); 

$contact_subject = $_POST['subject'];

$contact_email = $_POST['email'];
$contact_tel = $_POST['tel'];
$contact_nivel = $_POST['nivel'];

$pedido_1 = $_POST['prenda_A'];
$pedido_2 = $_POST['prenda_B'];
$pedido_3 = $_POST['prenda_C'];

//--------detecta saltos de linea-----------------------------------
$formatComments=str_replace( urldecode("%0D"),"\n",$contact_message);


if( $contact_name == true ){

	$sender = $contact_email;
	
	//-------- colocar este email: meportella@colegiosantamaria.com.ar  // figuraba "meportella@colegiosantamaria.com.ar\n";
	$receiver = "meportella@colegiosantamaria.com.ar";
	$client_ip = $_SERVER['REMOTE_ADDR'];

	$email_body = "Pedido de uniforme desde el sitio web\n____________________________________________\n\nNombre Alumno: $contact_name \nNivel: $contact_nivel \nE-mail: $sender \nTel: $contact_tel \n\nMensaje: $formatComments \n\n\n____________________________________________\n\nSolicitud de Prendas: \n\n$pedido_1  \n\n$pedido_2  \n\n$pedido_3  \n\n\n____________________________________________\n\nEnviado desde IP: $client_ip ";		
	
	$extra = "From: $sender\r\n" . "Reply-To: $sender \r\n" . "X-Mailer: PHP/" . phpversion();


//---comprueba si se envio el email-------------------------------

	if( mail( $receiver, "Pedido de uniforme desde el sitio web - $subject", $email_body, $extra ) ) 	{
		echo "success=yes";
	}else{
		echo "success=no";
	}
}
?>