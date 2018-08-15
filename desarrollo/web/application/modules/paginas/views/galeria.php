<style>
	a{
		text-decoration:none;
		color: #fff;
	}
</style>
<div align="center">
<table border="0" cellpadding="0" width="980" id="table1" style="padding-top: 180px; background-repeat: no-repeat; background-position: right bottom">
	
	
<tr>
		<td style="background-position: right bottom; padding-left: 20px; background-image:url('<?php echo base_url('assets/fondos/fondo_12.jpg'); ?>'); background-repeat:no-repeat; background-attachment:scroll; padding-right:20px" height="420" valign="top">
		<table border="0" cellpadding="0" width="100%" id="table2" cellspacing="10">
			<tbody><tr>
				<td valign="top" width="200" class="textos" style="padding-bottom: 40px; padding-right:0">
				<p class="titulos"><span class="Titulos">&Uacute;ltimas de galer&iacute;as</span></p><table border="0" cellpadding="0" id="table4">
					<tbody><tr>
						<td style="padding-left: 20px; padding-bottom: 20px; padding-right:20px" valign="top" align="left" bgcolor="#D6D6D6">
						<table border="0" cellpadding="0" id="table6" cellspacing="0" style="padding-bottom: 20px" width="200">
							<tbody>
								<?php if(isset($galerias)): ?>
								
		                              <?php foreach($galerias as $gal): ?>
		                              	
										<tr>
											<td style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; padding-top: 10px; padding-bottom: 10px; border-bottom-style:solid; border-bottom-width:1px" height="20" class="textos">
												<font size="2">
													<a href="<?php echo base_url("paginas/galeria/".$gal['id']) ?>" style="color: #000">
														<?php echo $gal['titulo'] ?>
													</a>		
												</font>
											</td>
										</tr>
										                              	

		                              <?php endforeach; ?>	
		                              							
								<?php endif; ?>


								</table>
						</td>
					</tr>
					</tbody></table>
				</td>
				<td valign="top" width="15" class="texto">&nbsp;</td>
				<td valign="top" width="615" class="textos" style="padding-top:29px">
						<table border="0" cellpadding="0" width="653" id="table8" cellspacing="0" height="30">
							<tbody>
								<tr>
									<td style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; padding-left: 6px; padding-right: 6px; padding-bottom: 7px"><b><font size="4"><?php echo $galeria['titulo']; ?></font></b>
									<hr>
									</td>
								</tr>
							</tbody>
						</table>
						<table border="0" cellpadding="0" width="615" id="table7" cellspacing="8">
							<tbody>
								<tr>
									<td >
										<?php if(isset($output)) echo $output; ?>
									</td>

								</tr>
								
							</tbody>
						</table></td>
			</tr>
			</tbody></table>
			</td>
	</tr>	
	
	

   <tr>
      <td style="padding-left: 20px" valign="top">
         <p class="textosBold"><a target="_blank" href="http://estudiodominguez.com.ar"><img border="0" src="<?php echo base_url('assets/images/estudio_dominguez.gif'); ?>" align="right"></a>
      </td>
   </tr>
</table>



</div>
