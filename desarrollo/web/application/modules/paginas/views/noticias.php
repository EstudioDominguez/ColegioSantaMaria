<style>
	a{
		text-decoration:none;
		color: #fff;
	}
	.paginador a{
		text-decoration:none;
		color: #000;
	}
</style>
<div align="center">
<table border="0" cellpadding="0" width="980" id="table1" style="padding-top: 180px; background-repeat: no-repeat; background-position: right bottom">
   <tr>
      <td style="background-position: right bottom; padding-left: 20px; background-image:url('<?php echo base_url('assets/images/fondo_noticias.jpg'); ?>'); background-repeat:no-repeat; background-attachment:scroll; padding-right:20px" height="420" valign="top">
         <table border="0" cellpadding="0" width="100%" id="table2" cellspacing="10">
            <tr>
               <td valign="top" width="500" class="textos" style="padding-bottom: 40px">
                  <p class="titulos"><span class="Titulos">Noticias</span>
                  <table border="0" cellpadding="0" id="table4">

                    <?php if(count($noticias) > 0 ): ?>
                    <?php foreach($noticias as $noticia): ?>
                        <tr>
                           <td style="padding-left: 20px; padding-bottom: 20px" valign="top" align="left">
                              <p align="left">
                              <span style="font-weight: 400">
                                 <font size="5" face="Arial">
                                    <?php echo $noticia['titulo'] ?>   
                                 </font>
                              </span>
                              <?php if(isset($noticia['imagenes']) && count($noticia['imagenes']) > 0): ?>
                              <p>
                                 <img border="0" src="<?php echo base_url('assets/uploads/'.$noticia['imagenes'][0]) ?>" width="280" >
                              </p>
                              <?php endif; ?>

                              <p align="left"><font size="2" face="Arial"><?php echo word_limiter($noticia['cuerpo'], 80); ?>  </font>
                              <p align="left">
								<a target="_self" href="<?php echo base_url('paginas/noticia/' . $nivel .  '/'  . $noticia['id'] .'/' . url_title($noticia['titulo'])) ?>">
									<img border="0" src="<?php echo base_url('assets/images/boton_leermas.png'); ?>" width="480" height="33">
								</a>
                           </td>
                        </tr>
                    <?php endforeach; ?>

   					<tr>
                        <td style="color: #000"> 
                        	<center>
                        		<div class="paginador">
                        		<?php echo $paginador ?>
                        		</div>
                        	</center> 
                        </td>
                    </tr>
                    
                    <?php else: ?>
                    	
   					<tr>
                        <td> No se encontraron resultados</td>
                    </tr>                    	
                    
                    <?php endif;?>

                  </table>
               </td>
               <td valign="top" width="20" class="texto">&nbsp;</td>
               <td valign="top" width="360" class="textos" style="padding:10px; ">
                  <table border="0" cellpadding="0" id="table5" bgcolor="#666666">
                     <tr>
                        <td style="padding-left: 30px; padding-right: 30px; padding-top: 20px">
                           <font color="#FFFFFF"><span class="Titulos"><font size="5"><span style="font-weight: 400">&Uacute;ltimas Noticias</span></font></span></font>
                        </td>
                     </tr>
                     <tr>
                        <td style="padding-left: 30px; padding-right: 30px; padding-bottom: 20px">
                           <table border="0" class="relacionados" cellpadding="0" id="table6" cellspacing="0" bgcolor="#666666" style="padding-bottom: 20px">
                              <?php foreach($noticiasUltimas as $noticia): ?>
                                 <tr>
                                    <td style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom: 1px solid #FFFFFF; padding-top: 10px; padding-bottom: 10px" height="30">
                                       <font color="#FFFFFF" size="3">
											<a href="<?php echo base_url('paginas/noticia/' . $nivel .  '/'  . $noticia['id'] .'/' . url_title($noticia['titulo'])) ?>">
												<?php echo $noticia['titulo'] ?>
											</a>
				      					</font>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>

                           </table>
                        </td>
                     </tr>
                     <tr>
                        <td style="padding-left: 30px; padding-right: 30px; padding-bottom: 20px; visibility: hidden">
                           <font color="#FFFFFF"><i><a target="_self" href="colegio_santa_maria_noticiasindice.htm"><font color="#FFFFFF">Ver todas las noticias.</font></a></i></font>
                        </td>
                     </tr>
                  </table>
                  <p>&nbsp;
               </td>
            </tr>
         </table>
      </td>
   </tr>
   <tr>
      <td style="padding-left: 20px" valign="top">
         <p class="textosBold"><a target="_blank" href="http://estudiodominguez.com.ar"><img border="0" src="<?php echo base_url('assets/images/estudio_dominguez.gif'); ?>" align="right"></a>
      </td>
   </tr>
</table>

</div>
