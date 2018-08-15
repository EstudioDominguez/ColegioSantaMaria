
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
	
	*/-------------------------------------------------------fondo del header */
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
      <div class="header" style="height:160px; width:700px; background-image: url(http://www.colegiosantamaria.com.ar/web/assets/images/news_top.jpg); background-repeat: no-repeat; background-color: #EAEBEB;">
      	
      	<div class="row marketing">
      		
			<div class="col-md-4">
		        <h3 class="text-muted">
		        	<!-- <img src="http://www.colegiosantamaria.com.ar/web/assets/images/news_top.jpg" width="700" height="137"> -->
		        </h3>				
			</div>

			<div class="col-md-8" style="margin-top: 100px; margin-left: 426px;"  > 
				<?php
					$datetime = strtotime($newsletter['fecha']);
					$mysqldate = date("d/m/Y", $datetime);
				?>
				<h1> <font size="3" face="Arial">Edici&oacuten:&nbsp; <?php echo $mysqldate ?></font></h1>
			</div>
		</div>

      </div>

      <div class="row marketing">
      
	      <div class="col-derecha" style="position:relative;  top:0px;   left:442px;    height:100px;    width:247px; background-color: #FF0000">
	      
	      
	      <div style="position: absolute; width: 398px; height: 100px; z-index: 1; left: -291px; top: -3px" id="capa1">
	      <?php foreach($newsletter['noticias'] as $noticia): ?>
			<div class="row blog-post">
			
				<div class="col-md-12" >
					<h2>
						<a href="single2.html"><?php echo $noticia['titulo'] ?></a>
					</h2>
					<span class="blog-meta">
						<span><i class="fa fa-calendar"></i> <?php echo $noticia['fecha_alta'] ?></span>											
					</span>
					<p>
						<?php echo $noticia['cuerpo'] ?>
					</p>
					<p>
						<a href="<?php echo base_url('paginas/noticia/na/' . $noticia['id'] .'/noticia') ?>" class="btn btn-default">Ver más »</a>
					</p>
					<p>
						<img border="0" src="http://www.colegiosantamaria.com.ar/web/assets/images/boton_leermas.png" width="400" height="30">
					</p>
				</div>
			</div>
			<?php endforeach; ?>	
			
	      </div>

			<div style="position: absolute; width: 272px; height: 100px; z-index: 1; left: 142px; top: 1px" id="capa2">
			<!-- --------------insertp html ---------------- -->		  	
		  	<object type="text/html" data="http://colegiosantamaria.com.ar/web/_editables/_aviso.htm"
	            style="width:100%; height:100%; margin:0%;">
		    </object>
			<!-- --------------insertp html ---------------- -->
			</div>


		<div class="col-md-12">
			<?php foreach($newsletter['noticias'] as $noticia): ?>
			<div class="row blog-post"><div class="col-md-12" >
			<h2><a href="single2.html"><?php echo $noticia['titulo'] ?></a> </h2><span class="blog-meta"><span><i class="fa fa-calendar"></i> <?php echo $noticia['fecha_alta'] ?></span> </span><p>
						<?php echo $noticia['cuerpo'] ?>
					</p><p><a href="<?php echo base_url('paginas/noticia/na/' . $noticia['id'] .'/noticia') ?>" class="btn btn-default">Ver más »</a> </p><p><img border="0" src="http://www.colegiosantamaria.com.ar/web/assets/images/boton_leermas.png" width="400" height="30"> </p></div></div>
			<?php endforeach; ?>	
		</div>			
			
      </div>

      <div class="footer">
        <img src="http://www.colegiosantamaria.com.ar/web/assets/images/news_bottom.jpg" width="700" height="115">
      </div>

    </div> <!-- /container -->
    



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>