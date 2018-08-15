<?php if($error != ''): ?>
	<div id="login-header">		
		<h3><?php echo $error; ?></h3>		
	</div> 			
<?php endif; ?>

<?php if($mensaje != ''): ?>
	<div id="login-header">		
		<h3><?php echo $mensaje; ?></h3>		
	</div> 			
<?php endif; ?>

<?php
$frm_captcha = array (
    'name' => 'captcha_check',
    'id' => 'captcha_check',
    'captcha' => 'required'
);
?>
	
	<script type="text/javascript">
		$(".alert").alert()
	</script>
	<div id="login-content" class="clearfix">
	
		<?php 		
		$attributes = array('class' => '', 'id' => '');
		echo form_open('users/register/', $attributes); ?>
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="username">Nombre de usuario</label>
						<div class="controls">
							<input id="username" type="text" name="username" maxlength="150" value="<?php echo set_value('username'); ?>"  />
							<?php echo form_error('username'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="email">Email</label>
						<div class="controls">
							<input id="username" type="text" name="email" maxlength="150" value="<?php echo set_value('email'); ?>"  />
							<?php echo form_error('email'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="name">Nombre</label>
						<div class="controls">
							<input id="name" type="text" name="name" maxlength="150" value="<?php echo set_value('name'); ?>"  />
							<?php echo form_error('name'); ?>
						</div>
					</div>										
					<div class="control-group">
						<label class="control-label" for="lastname">Apellido</label>
						<div class="controls">
							<input id="lastname" type="text" name="lastname" maxlength="20" value="<?php echo set_value('lastname'); ?>"  />
							 <?php echo form_error('lastname'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="password">Password</label>
						<div class="controls">
							<input id="password" type="password" name="password" maxlength="150"  value=""  />
							<?php echo form_error('password'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="verify_password">Repetir Password</label>
						<div class="controls">
							<input id="verify_password" type="password" name="verify_password" maxlength="150" id="verify_password" value=""  />
							<?php echo form_error('verify_password'); ?>
						</div>
					</div>	
					
														
				</fieldset>
				

				<div class="pull-right">
					<button type="submit" class="btn btn-warning btn-large">
						Crear Cuenta
					</button>
				</div>
			<?php echo form_close(); ?>
			
		</div> <!-- /login-content -->
		
		
		<div id="login-extra">
			<p>Remind Password? <a href="forgot_password.html">Retrieve.</a></p>			
		</div> <!-- /login-extra -->