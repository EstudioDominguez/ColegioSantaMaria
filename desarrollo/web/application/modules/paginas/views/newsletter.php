<html>
	<head>
		<meta http-equiv="Content-Language" content="es-ar">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Fecha</title>
		<link href="http://www.colegiosantamaria.com.ar/web/assets/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="http://colegiosantamaria.com.ar/web/estilos.css">
	</head>
	<body>
		<table border="0" cellpadding="0" width="700" id="table1" cellspacing="0">
			<tr>
				<td><a href="http://www.colegiosantamaria.com.ar/web"> <img src="http://www.colegiosantamaria.com.ar/web/assets/images/news_top.jpg" width="700" height="137" border="0"></a></td>
			</tr>
			<tr>
				<td bgcolor="#ECECEC"> &nbsp;
				<table border="0" cellpadding="0" width="700" id="table2" cellspacing="0">
					<tr>
						<td  style="padding-left: 15px" valign="top">
						<p class="textos">
						<div class="row">
							<div class="col-md-12" style="margin-top: -50px;"  > 
								<?php
									$datetime = strtotime($newsletter['fecha']);
									$mysqldate = date("d/m/Y", $datetime);
								?>
								<h1> <font size="3" face="Arial">Edición: <?php echo $mysqldate ?></font></h1>
							</div>							
						</div>
							
						<?php foreach($newsletter['noticias'] as $noticia): ?>
						<div class="row blog-post" style="width: 400px;">
							<div class="col-md-12">
								<h2>
									<a href="<?php echo base_url('paginas/noticia/na/' . $noticia['id'] .'/noticia') ?>">
										<font size="5" face="Arial"> <?php echo $noticia['titulo'] ?> </font>
									</a>
								</h2>
								<span class="blog-meta">
									<span><i class="fa fa-calendar"></i> <?php echo $noticia['fecha_alta'] ?></span>											
								</span>
								<p>
				                    <?php if(isset($noticia['imagen_1']) && $noticia['imagen_1'] != ''): ?>
				                    <p>
				                       <img border="0" src="<?php echo base_url('assets/uploads/'.$noticia['imagen_1']) ?>" width="280" >
				                    </p>
				                    <?php endif; ?>
									
									<font size="2" face="Arial"> <?php echo $noticia['cuerpo'] ?> </font>
								</p>
								<p>
									<a href="<?php echo base_url('paginas/noticia/na/' . $noticia['id'] .'/noticia') ?>">
										<img border="0" src="http://www.colegiosantamaria.com.ar/web/assets/images/boton_leermas.png" width="400" height="30">
									</a>
								</p>	
							</div>
						</div>
						<?php endforeach; ?>								
						</td>
						<td width="18">&nbsp; </td>
						<td width="250" bgcolor="#9D9F9E" valign="top" style="padding-left: 11px; padding-top: 20px"><img border="0" src="http://colegiosantamaria.com.ar/web/_editables/visita.jpg" width="183" height="56">
						<p>
							<a target="_blank" href="http://www.colegiosantamaria.com.ar/web"><img border="0" src="http://colegiosantamaria.com.ar/web/_editables/home-226pix.jpg" width="226" height="138"></a>
						<p>
							<map name="FPMap0">
								<area href="mailto:inicial@colegiosantamaria.com.ar" shape="rect" coords="0, 183, 183, 204">
								<area href="mailto:administracion@colegiosantamaria.com.ar" shape="rect" coords="0, 99, 225, 121">
								<area href="mailto:primaria@colegiosantamaria.com.ar" shape="rect" coords="0, 254, 200, 274">
								<area href="mailto:secundaria@colegiosantamaria.com.ar" shape="rect" coords="2, 322, 211, 342">
							</map>
						<p>
							&nbsp;
						<p><img border="0" src="http://colegiosantamaria.com.ar/web/_editables/info-util.jpg" usemap="#FPMap0">
						<p>
							&nbsp;
						<p>
							<font face="Arial" size="1"><a href="%Link:Unsubscribe%"><font color="#FFFFFF">Si desea desuscribirse de este newsletter
									<br>
									haga clic aqui.</font></a></font>
						</td>
						<td width="26">&nbsp; </td>
					</tr>
				</table></td>
			</tr>
			<tr>
				<td><a href="http://www.colegiosantamaria.com.ar/web"><img src="http://www.colegiosantamaria.com.ar/web/assets/images/news_bottom.jpg" width="700" height="115" border="0"></a></td>
			</tr>
		</table>

	</body>

</html>