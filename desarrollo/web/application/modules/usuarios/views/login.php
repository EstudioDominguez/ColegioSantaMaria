<?php  $base_url = $this->config->item('base_url'); ?>

<div class="row">
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-6">
			<div class="container">			
			      <form class="form-signin" action="<?php echo base_url() ?>usuarios/login" method="post" >			        		        
			        <?php if(isset($error)): ?>
						<div class="alert alert-warning alert-dismissable">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						 <center>
						 	 <strong>Atenci&oacute;n!</strong> <?php echo $error ?>.
						 </center>
						</div>        	
			        <?php endif; ?>
			        
			        
			        <input type="text" class="form-control input-lg" name="email" placeholder="Ingrese su email" autofocus="" value="<?php echo set_value('email'); ?>">
			        <input type="password" name="password" class="form-control input-lg" placeholder="Ingrese su password">
			        <input type="hidden" name="q" class="form-control" value="q" >
			        <br />
			        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
			      </form>	
			      
			      
			      <p>
			      	<center>
			      		<a href=<?php echo base_url("usuarios/recuperar"); ?> style="color:#333">¿Te olvidaste tu contraseña?</a>
			      	</center>
			      </p>
			      		
			</div>
        	
        </div>
        <div class="col-md-3">&nbsp;</div>
</div>



