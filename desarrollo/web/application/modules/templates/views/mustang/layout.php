<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Colegio</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/grid.css" rel="stylesheet">
    <link href="http://getbootstrap.com/assets/css/docs.min.css" rel="stylesheet">
    
	<?php if(isset($css_files)):?>
	<?php foreach($css_files as $css):?>
	<link type="text/css" rel="stylesheet" href="<?php echo $css;?>" />
	<?php endforeach;?>

	<?php foreach($js_files as $js):?>
	<script src="<?php echo $js;?>"></script>
	<?php endforeach;?>

	<?php else:?>
	  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.js"></script> 
	<?php endif;?>	
  
    

    <script type="text/javascript" src='<?php echo base_url() ?>assets/js/lib/jquery-ui.custom.min.js'></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>	
	

	
    <script src="<?php echo base_url() ?>assets/js/hogan-2.0.0.js"></script>    
    <script src="<?php echo base_url() ?>assets/js//typeahead.js"></script>	
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
    
  </head>
 

  <body>
    <div class="container">
          
       	
		<nav class="navbar" role="navigation" style="background-color: #EAEBEB;border: 0">	  
			
			
			<div class="pull-left">
				<img style="width: 200px" src="<?php echo base_url('assets/images/logo.png')?>" />
			</div>
	
		   <?php if($this->session->userdata('login')): ?>      
			  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-top: 20px">		  	
			    
			    <ul class="nav navbar-nav navbar-right">
			      

				  <li><a href="<?php echo base_url('admin/paginas/galerias'); ?>" class="navbar-link">Galerías</a></li>	
				  <li><a href="<?php echo base_url('admin/paginas/noticias'); ?>" class="navbar-link">Noticias</a></li>
				  <li><a href="<?php echo base_url('admin/paginas/newsletters'); ?>" class="navbar-link">Newsletters</a></li>
				  <li><a href="<?php echo base_url('admin/paginas/niveles'); ?>" class="navbar-link">Niveles</a></li>
				  <li><a href="<?php echo base_url('admin/paginas/usuarios'); ?>" class="navbar-link">Usuarios</a></li>
				  
				  
			      <li><a href="#" class="navbar-link">Mi Cuenta</a></li>
			      <li><a href="<?php echo base_url('usuarios/logout') ?>">Salir</a></li>
			    </ul>
			  </div>
		  	<?php endif; ?>
		</nav>  	

		<div class="row">
		        <div class="col-md-6">
					<div class="page-header">
					  <h1><?php echo $h1; ?></h1>
					</div>		        	
		        	
	        	</div>
		        <div class="col-md-6">
					&nbsp;        		        	
		        </div>		        
		</div>      

	<?php echo $this->load->view($contenido);?>
		
    <?php if(!$this->session->userdata('login')): ?>        
      	

		<div class="row">
		        <div class="col-md-6">
		        	&nbsp;
	        	</div>
		        <div class="col-md-6">
					&nbsp;        		        	
		        </div>		        
		</div>      	
      <?php endif; ?>		
	

	<div class="row">
	  <div class="col-md-12">
	  	Todos los derechos reservados
	  </div>
  	</div>

    </div>
    

    
  </body>
</html>
