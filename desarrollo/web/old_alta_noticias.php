<?php
if (!empty($_POST['submit'])) {

	if (trim($_POST['email']) === '' || trim($_POST['email2']) === '' || trim($_POST['nombre']) === '' || trim($_POST['hijos']) === '') {
		$emailError = 'Complete todos los campos';
		$hasError = true;
	} elseif (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'Cuenta de Email Invalida.';
		$hasError = true;
	} elseif (trim($_POST['email']) != trim($_POST['email2'])) {
		$emailError = 'Los Email deben ser iguales';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if (!isset($hasError)) {
		$mail = 'matias@estudiodominguez.com.ar';
		//$mail = 'alejandrod@upware.com.ar';

		$name = $_POST['nombre'];
		$child = $_POST['hijos'];
		$email = $_POST['email'];
		$status = $_POST['estado_de_suscripcion'];
		$mesg = $_POST['comentario'];
		$niveles = implode(' - ', $_POST['nivel']);

		$headers = "Content-type: text/html; charset=utf8\r\n";
		$headers .= "From: $email\r\n";

		$message = "Nombre y Apellido: " . $name . "<br />";
		$message .= "Nombre y Apellido de hijos: " . $child . "<br />";
		$message .= "Estado suscripcion: " . $status . "<br />";
		$message .= "Suscripto a niveles: " . $niveles . "<br />";
		$message .= "Email: " . $email . "<br />";
		$message .= "Mensaje: " . $mesg . "<br />";

		if (mail($mail, "Alta/Baja newsletter", $message, $headers)) {
			$emailSent = true;
		}
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<title>Colegio Sabta Mar&iacute;a - Noticias</title>

<script src="../AC_RunActiveContent.js" language="javascript"></script>
<link rel="stylesheet" type="text/css" href="../estilos.css" />
</head>


<div align="center">

<table border="0" cellpadding="0" width="980" id="table1" style="background-repeat: no-repeat; background-position: right bottom">
	<tr>
		<td style="background-position: right bottom; padding-left: 20px; background-image:url('../institucional/imagenes_noticias/fondo_noticias.jpg'); background-repeat:no-repeat; background-attachment:scroll; padding-right:20px" height="420" valign="top">
		<table border="0" cellpadding="0" width="100%" id="table2" cellspacing="10">
			<tr>
				<td valign="top" width="500" class="textos" style="padding-bottom: 40px">
				<p class="titulos"><span class="Titulos">Noticias, suscripci&oacute;n.</span><table border="0" cellpadding="0" id="table4">
					<tr>
						<td style="padding-left: 20px; padding-bottom: 20px" valign="top" align="left">
							
				    <?php if($hasError == true ): ?>
				            <div style="background: #f2dede;padding: 20px;">
				            	<center><?php echo $emailError ?></center>
				            </div>
				    <?php endif; ?>
				
				    <?php if($emailSent == true ): ?>				            
				            <h3> Gracias por suscribirse. Estar&aacute; recibiendo nuestras pr&oacute;ximas novedades en breve.</h3>
				    <?php endif; ?>							
							
							
						<p align="left"><font face="Arial" size="5">Suscribirme al newsletter del Colegio.</font><p align="left"><font face="Arial" size="2">Env&iacute;enos sus datos y comience a estar actualizado con todas las &Uacute;ltimas novedades del colegio.</font></td>
					</tr>
					<tr>
						<td style="padding-left: 20px; padding-bottom: 20px" valign="top" align="left">
							
						<form method="POST" action="">
							<!--webbot bot="SaveResults" U-File="../_private/form_results.csv" S-Format="TEXT/CSV" S-Label-Fields="TRUE" startspan --><input TYPE="hidden" NAME="VTI-GROUP" VALUE="0"><!--webbot bot="SaveResults" i-checksum="43374" endspan --><table border="0" cellpadding="0" width="653" id="table5">
								<tr>
									<td width="272" class="textos" valign="top">
									Deseo:</td>
									<td class="textos" valign="top">
									<input type="radio" value="suscribirme" name="estado_de_suscripcion" checked>Suscribirme al Newsletter<br>
									<input type="radio" value="desuscribirme" name="estado_de_suscripcion">Dejar de recibir el Newsletter</td>
								</tr>
								<tr>
									<td width="272" class="textos" valign="top">&nbsp;</td>
									<td class="textos" valign="top">&nbsp;</td>
								</tr>
								<tr>
									<td width="272" class="textos" valign="top">
									<font face="Arial" size="5">Sus Datos</font></td>
									<td class="textos" valign="top">&nbsp;</td>
								</tr>
								<tr>
									<td width="272" valign="top">
									<p class="textos">Nombre y apellido:</td>
									<td class="textos" valign="top">
									<p class="textos"><input type="text" name="nombre" size="51"></td>
								</tr>
								<tr>
									<td width="272" class="textos" valign="top">
									<p class="textos">Nombre de sus hijos:</td>
									<td class="textos" valign="top">
									<p class="textos"><input type="text" name="hijos" size="51"></td>
								</tr>
								<tr>
									<td width="272" class="textos" valign="top">
									<p class="textos">Email en el que desea recibir la informaci&oacute;n:</td>
									<td class="textos" valign="top">
									<p class="textos"><input type="text" name="email" size="51"></td>
								</tr>
								<tr>
									<td width="272" class="textos" valign="top">
									<p class="textos">Vuelva a escribir su email:</td>
									<td class="textos">
									<input type="text" name="email2" size="51"></td>
								</tr>
								<tr>
									<td class="textos" colspan="2" valign="middle">&nbsp;<table border="0" cellpadding="0" id="table7" style="padding: 10px" bgcolor="#C0C0C0" width="606">
										<tr>
											<td class="textos" width="256">
											<b>Deseo recibir informaci&oacute;n sobre:</b><p><i><font size="2" face="Arial">(Puede seleccionar uno o mas tipos <br>
											de informaci&oacute;n)</font></i></td>
											<td class="textos">
											<input type="checkbox" name="nivel[inicial]" value="Inicial"> Nivel inicial<br>
											<input type="checkbox" name="nivel[primario]" value="Primario"> Nivel primario<br>
											<input type="checkbox" name="nivel[secundario]" value="Secundario"> Nivel secundario<br>
											<input type="checkbox" name="nivel[egresado]" value="Egresados"> Egresados</td>
										</tr>
									</table>
									<p>&nbsp;</td>
								</tr>
								<tr>
									<td width="272" class="textos" valign="top">
									Comentario:<br>
									<i>(no es obligatorio)</i></td>
									<td class="textos" valign="top">
									<textarea rows="5" name="comentario" cols="39"></textarea></td>
								</tr>
								<tr>
									<td width="272" class="textos" valign="top">&nbsp;</td>
									<td class="textos" valign="top">&nbsp;</td>
								</tr>
							</table>
							<p align="left"><input type="submit" value="Enviar" name="submit"><input type="reset" value="Restablecer" name="B2"></form>
						</td>
					</tr>
					</table>
				</td>
				<td valign="top" width="20" class="texto">&nbsp;</td>
				<td valign="top" width="360" class="textos" style="padding:10px; ">&nbsp;<p>&nbsp;<p>&nbsp;<table border="0" cellpadding="0" id="table6" style="padding: 20px" bgcolor="#808080">
					<tr>
						<td>&nbsp;<p><font face="Arial" size="5" color="#FFFFFF">Como dar </font><p><font face="Arial" size="5" color="#FFFFFF">de baja mi</font><p><font face="Arial" size="5" color="#FFFFFF">suscripcion:</font></td>
					</tr>
					<tr>
						<td class="textos">
						<font color="#FFFFFF">Para dar de baja su suscripcion seleccione &quot;Dejar de recibir el Newsletter&quot;, complete sus datos y envie el formulario.<br>
						&nbsp;</font></td>
					</tr>
				</table>
				</td>
			</tr>
			</table>
			</td>
	</tr>

</table>

</div>

</body>
</html>