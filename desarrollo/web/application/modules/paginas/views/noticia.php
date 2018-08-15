<div align="center">

<table border="0" cellpadding="0" width="980" id="table1" style="padding-top: 180px; background-repeat: no-repeat; background-position: right bottom">
	<tr>
		<td style="background-position: right bottom; padding-left: 20px; background-image:url('<?php echo base_url('assets/images/fondo_noticias.jpg'); ?>'); background-repeat:no-repeat; background-attachment:scroll; padding-right:20px" height="420" valign="top">
		<table border="0" cellpadding="0" width="100%" id="table2" cellspacing="10">
			<tr>
				<td valign="top" width="500" class="textos" style="padding-bottom: 40px;">
				<p class="titulos"><span class="Titulos">Noticias nivel </span><table border="0" cellpadding="0" id="table4">
					<tr>
						<td style="padding-left: 20px; padding-bottom: 20px" valign="top" align="left">
						<p align="left"><span style="font-weight: 400">
						<font size="5" face="Arial">
							<?php echo $noticia['titulo']; ?>
						</font>
						</span><p>&nbsp;
							<table border="0" cellpadding="0" id="table7" cellspacing="0">
							<?php if(isset($noticia['imagenes']) && count($noticia['imagenes']) > 0):?>
							<tr>
								<td>
									<ul class="bxslider">
									  <?php foreach ($noticia['imagenes'] as $key => $value): ?>
									  <li><img width="480" src="<?php echo base_url("assets/uploads/".$value) ?>" /></li>
									  <?php endforeach; ?>
									</ul>	
								</td>
							</tr>
							<tr>
								<td style="padding-top: 10px">
								<div align="left">										
									<div id="bx-pager">
									<?php foreach ($noticia['imagenes'] as $key => $value): ?>
									  <a data-slide-index="<?php echo $key ?>" href=""><img width="80px" src="<?php echo base_url("assets/uploads/".$value) ?>" /></a>
									<?php endforeach; ?>
									</div>	
								</div>

								</td>
							</tr>
							<?php  endif; ?>							
						</table>
						
						<div class="contenido">
							
						<?php if(isset($noticia['galerias']) && count($noticia['galerias']) > 0):?>		
							<h3> Galer&iacute;as de im&aacute;genes </h3>					
							<ul>
								<?php foreach ($noticia['galerias'] as $key => $value): ?>
								  <li> <a href="<?php echo base_url("paginas/galeria/".$value['id']) ?>" /> <?php echo $value['titulo'] ?> </a></li>
								<?php endforeach; ?>
							</ul>						
														
						<?php  endif; ?>	
						</div>
						<p align="left">
						<font size="2" face="Arial">
							<?php echo $noticia['cuerpo']; ?>
						</font>
						</p>
						<p align="left"><a target="_self" href="javascript:history.back(1)"><img border="0" src="<?php echo base_url('assets/images/boton_volver.png'); ?>" width="480" height="33"></a>
							
						</td>
					</tr>
					</table>
				</td>
				<td valign="top" width="20" class="texto">&nbsp;</td>
				<td valign="top" width="360" class="textos" style="padding:10px; "><table border="0" cellpadding="0" id="table5" bgcolor="#666666">
					<tr>
						<td style="padding-left: 30px; padding-right: 30px; padding-top: 20px">
						<font color="#FFFFFF"><span class="Titulos"><font size="5"><span style="font-weight: 400">M&aacute;s Noticias</span></font></span></font></td>
					</tr>
					<tr>
						<td style="padding-left: 30px; padding-right: 30px; padding-bottom: 20px">
						<table border="0" class="relacionados" cellpadding="0" id="table6" cellspacing="0" bgcolor="#666666" style="padding-bottom: 20px">
                              <?php foreach($noticias as $noti): ?>
                                 <tr>
                                    <td style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #FFFFFF; padding-top: 10px; padding-bottom: 10px" height="30">
                                       <font color="#FFFFFF" size="3">
											<a href="<?php echo base_url('paginas/noticia/' . $nivel .  '/'  . $noti['id'] .'/' . url_title($noti['titulo'])) ?>">
												<?php echo $noti['titulo'] ?>
											</a>
				      					</font>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
							</table>
						</td>
						</tr>
						<tr>
							<td style="padding-left: 30px; padding-right: 30px; padding-bottom: 20px;visibility: hidden">
							<font color="#FFFFFF"><i><a target="_self" href="colegio_santa_maria_noticiasindice.htm"><font color="#FFFFFF">Ver todas las noticias.</font></a></i></font></td>
						</tr>
					</table>
					<p>&nbsp;</td>
			</tr>
			</table>
			</td>
	</tr>
	<tr>
		<td style="padding-left: 20px" valign="top">
		<p class="textosBold"><a target="_blank" href="http://estudiodominguez.com.ar"><img border="0" src="<?php echo base_url('assets/images/estudio_dominguez.gif'); ?>" align="right"></a></td>
	</tr>
</table>

</div>


<script type="text/javascript">
$('.bxslider').bxSlider({
  pagerCustom: '#bx-pager',
  slideWidth: 480,
});
</script>