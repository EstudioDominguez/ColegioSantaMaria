<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Newsletter</title>

    <!-- Bootstrap core CSS -->
    <link href="http://www.colegiosantamaria.com.ar/web/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
 <style>
	/* Space out content a bit */
	body {
	  padding-top: 20px;
	  padding-bottom: 20px;
	}
	
	/* Everything but the jumbotron gets side spacing for mobile first views */
	.header,
	.marketing,
	.footer {
	  padding-right: 15px;
	  padding-left: 15px;
	}
	
	/* Custom page header */
	.header {
	  border-bottom: 1px solid #e5e5e5;
	}
	/* Make the masthead heading the same height as the navigation */
	.header h3 {
	  padding-bottom: 19px;
	  margin-top: 0;
	  margin-bottom: 0;
	  line-height: 40px;
	}
	
	/* Custom page footer */
	.footer {
	  padding-top: 19px;
	  color: #777;
	  border-top: 1px solid #e5e5e5;
	}
	
	/* Customize container */
	@media (min-width: 768px) {
	  .container {
	    max-width: 730px;
	    background-image: url('http://www.colegiosantamaria.com.ar/web/assets/images/news_fdo.jpg'); background-repeat: repeat-y; background-position: center top';
	  }
	}
	.container-narrow > hr {
	  margin: 30px 0;
	}
	
	/* Main marketing message and sign up button */
	.jumbotron {
	  text-align: center;
	  border-bottom: 1px solid #e5e5e5;
	}
	.jumbotron .btn {
	  padding: 14px 24px;
	  font-size: 21px;
	}
	
	/* Supporting marketing content */
	.marketing {
	  /*margin: 40px 0;*/
	  width: 400px;
	}
	.marketing p + h4 {
	  margin-top: 28px;
	}
	
	/* Responsive: Portrait tablets and up */
	@media screen and (min-width: 768px) {
	  /* Remove the padding we set earlier */
	  .header,
	  .marketing,
	  .footer {
	    padding-right: 0;
	    padding-left: 0;
	  }
	  /* Space out the masthead */
	  .header {
	    margin-bottom: 30px;
	  }
	  /* Remove the bottom border on the jumbotron for visual effect */
	  .jumbotron {
	    border-bottom: 0;
	  }
	} 	
</style>


  </head>

  <body>

    <div class="container">
      <div class="header" style="background-color: #EAEBEB;">
      	
      	<div class="row marketing">
      		
			<div class="col-md-4">
		        <h3 class="text-muted">
		        	<img src="http://www.colegiosantamaria.com.ar/web/assets/images/news_top.jpg" width="700" height="137">		        	
		        </h3>				
			</div>

			<div class="col-md-8" style="margin-top: -50px; margin-left: 426px;"  > 
				<?php
					$datetime = strtotime($newsletter['fecha']);
					$mysqldate = date("d/m/Y", $datetime);
				?>
				<h1> <font size="3" face="Arial">Edici&oacuten:&nbsp; <?php echo $mysqldate ?></font></h1>
			</div>
		</div>

      </div>

      <div class="row marketing">
		<div class="col-md-12">

			<?php foreach($newsletter['noticias'] as $noticia): ?>
			<div class="row blog-post">
				<div class="col-md-12">
					<h2>
						<a href="<?php echo base_url('paginas/noticia/na/' . $noticia['id'] .'/noticia') ?>">
							<?php echo $noticia['titulo'] ?>
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
						
						<?php echo $noticia['cuerpo'] ?>
					</p>
					<p>
						<a href="<?php echo base_url('paginas/noticia/na/' . $noticia['id'] .'/noticia') ?>">
							<img border="0" src="http://www.colegiosantamaria.com.ar/web/assets/images/boton_leermas.png" width="400" height="30">
						</a>
					</p>
					
					
				</div>
			</div>
			<?php endforeach; ?>
			
		</div>				
      </div>

      <div class="footer">
        <p><font face="Arial" size="1">Colegio Santa Mar&iacute;a 2014</font></p>
        <img src="http://www.colegiosantamaria.com.ar/web/assets/images/news_bottom.jpg" width="700" height="115">
      </div>

    </div> <!-- /container -->
    



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>