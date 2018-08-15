<div class="container_12">
<p>&nbsp;</p>
<h1 style="text-align:center; color:#FFF">Resetear Clave</h1>
<?php if($error != ''): ?>
	<h1 style="text-align:center; color:#FFF"><?php echo $error; ?></h1>			
<?php endif; ?>	

<?php if($success != ''): ?>
	<h1 style="text-align:center; color:#FFF">?php echo $success; ?></h1>	
<?php endif; ?>	
<p>&nbsp;</p>
<div style="margin-left: auto;margin-right: auto;">
<div class="grid_12">
<div style="background-image:url(../assets/images/metalbg-r.png);width:520px;z-index: 9999;background-repeat: no-repeat;color: #000000;font-family: 'PT Sans',sans-serif;font-size:25px;height:146px;padding-top:20px;z-index: 9999; margin:0 auto;"><center>
<form action="<?php echo base_url('users/login/')?>" method="POST">
        <div style="opacity:1; filter: alpha(opacity=1);">
	        <p style="font-size:16px; font-weight:bold;font-family: 'PT Sans',sans-serif;">Nombre de Usuario o Email</p>
	         <input style="font-size:16px;" type="text" name='username' id='Email' placeholder='Usuario' maxlength="50" value="<?php echo set_value('username'); ?>"/><br/>
	         <?php echo form_error('username'); ?>


			<input type="submit"  class="button highlight action" value="Reenviar"></p>
			
        </div>
</form>                        
</center>
</div>
</div>
        <!-- End Slide -->  
</div>
</div>

