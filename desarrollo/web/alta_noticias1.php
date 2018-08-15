<?php
if (!empty($_POST['submit'])) {
         
          if(trim($_POST['email']) === '' || trim($_POST['email2']) === '' ||  trim($_POST['nombre']) === '' || trim($_POST['hijos']) === '' || trim($_POST['comentario']) === '')  
          {
                 $emailError = 'Complete todos los campos';
                 $hasError = true;
          }
		  elseif (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) 
          {
                  $emailError = 'Cuenta de Email Invalida.';
                  $hasError = true;
          }
		  elseif(trim($_POST['email']) == trim($_POST['email2']))
		  {
                 $emailError = 'Los Email deben ser iguales';
                 $hasError = true;		  	
		  }
          else 
          {
                  $email = trim($_POST['email']);
          }		  
		  
          
          if(!isset($hasError)) 
          {
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
				
				
				$message =  "Nombre y Apellido: " . $name . "<br />";
				$message .= "Nombre y Apellido de hijos: " . $child . "<br />";
				$message .= "Estado suscripcion: " . $status . "<br />";
				$message .= "Suscripto a niveles: " . $niveles . "<br />";
				$message .= "Email: " . $email . "<br />";
				$message .= "Mensaje: " . $mesg . "<br />";
				
				
				echo $message;
				exit;			
				
				if (mail($mail, "Alta/Baja newsletter", $message, $headers)) 
				{
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
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">

<div id="top">
	<p align="center">

	<script language="javascript">
	if (AC_FL_RunContent == 0) {
		alert("Esta pagina requiere el archivo AC_RunActiveContent.js. En Flash, seleccione \"Aplicar actualizaci�n de contenido activo\" en el menu Comandos para copiar el archivo AC_RunActiveContent.js en la carpeta de salida HTML.");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0',
			'width', '980',
			'height', '194',
			'src', 'top_inicial',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', 'transparent',
			'devicefont', 'false',
			'id', 'top_inicial',
			'bgcolor', '#ffffff',
			'name', 'top_inicial',
			'menu', 'false',
			'allowScriptAccess','sameDomain',
			//----------------insertar redireccion del top-----------------------
			'movie', '../swf/top_inicial?ir=noticias&ir2=suscribirse',
			//-------------------------------------------------------------------
			'salign', 't'
			); //end AC code
	}
</script>
<noscript>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="980" height="194" id="top" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="movie" value="../institucional/top_inicial.swf" /><param name="menu" value="false" /><param name="quality" value="high" /><param name="salign" value="t" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#ffffff" />	<embed src="../institucional/top_inicial.swf" menu="false" quality="high" salign="t" wmode="transparent" bgcolor="#ffffff" width="980" height="194" name="top" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>
</noscript>
	<p>
	</div>

<div align="center">

<table border="0" cellpadding="0" width="980" id="table1" style="padding-top: 180px; background-repeat: no-repeat; background-position: right bottom">
	<tr>
		<td style="background-position: right bottom; padding-left: 20px; background-image:url('../institucional/imagenes_noticias/fondo_noticias.jpg'); background-repeat:no-repeat; background-attachment:scroll; padding-right:20px" height="420" valign="top">
		<table border="0" cellpadding="0" width="100%" id="table2" cellspacing="10">
			<tr>
				<td valign="top" width="500" class="textos" style="padding-bottom: 40px">
				<p class="titulos"><span class="Titulos">Noticias, suscripci&oacute;n.</span><table border="0" cellpadding="0" id="table4">
					<tr>
						<td style="padding-left: 20px; padding-bottom: 20px" valign="top" align="left">
							
				    <?php if($hasError == true ): ?>
				            <div class="box error"><?php echo $emailError ?></div>
				    <?php endif;?>
				
				    <?php if($emailSent == true ): ?>
				            <h3> <?php echo $emailError ?></h3>
				            <h3> Gracias por suscribirse. Estar&aacute; recibiendo nuestras pr&oacute;ximas novedades en breve.</h3>
				    <?php endif;?>							
							
							
						<p align="left"><font face="Arial" size="5">Suscribirme al newsletter del Colegio.</font><p align="left"><font face="Arial" size="2">Env�enos sus datos y comience a estar actualizado con todas las &Uacute;ltimas novedades del colegio.</font></td>
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
									<td width="272" class="textos" valign="top">
&nbsp;</td>
									<td class="textos" valign="top">
&nbsp;</td>
								</tr>
								<tr>
									<td width="272" class="textos" valign="top">
									<font face="Arial" size="5">Sus Datos</font></td>
									<td class="textos" valign="top">
&nbsp;</td>
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
									<td class="textos" colspan="2" valign="middle">
&nbsp;<table border="0" cellpadding="0" id="table7" style="padding: 10px" bgcolor="#C0C0C0" width="606">
										<tr>
											<td class="textos" width="256">
											<b>Deseo recibir informaci�n sobre:</b><p><i><font size="2" face="Arial">(Puede seleccionar uno o mas tipos <br>
											de informaci&oacute;n)</font></i></td>
											<td class="textos">
											<input type="checkbox" name="nivel[inicial]" value="ON"> Nivel inicial<br>
											<input type="checkbox" name="nivel[primario]" value="ON"> Nivel primario<br>
											<input type="checkbox" name="nivel[secundario]" value="ON"> Nivel secundario<br>
											<input type="checkbox" name="nivel[egresado]" value="ON"> Egresados</td>
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
									<td width="272" class="textos" valign="top">
&nbsp;</td>
									<td class="textos" valign="top">
&nbsp;</td>
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
						<td>
&nbsp;<p><font face="Arial" size="5" color="#FFFFFF">Como dar </font><p><font face="Arial" size="5" color="#FFFFFF">de baja mi</font><p><font face="Arial" size="5" color="#FFFFFF">suscripcion:</font></td>
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
	<tr>
		<td style="padding-left: 20px" valign="top">
		<p class="textosBold"><a target="_blank" href="http://estudiodominguez.com.ar"><img border="0" src="../images/estudio_dominguez.gif" align="right"></a></td>
	</tr>
</table>

</div>

</body>
</html>