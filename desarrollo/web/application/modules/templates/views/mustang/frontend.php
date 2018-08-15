<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<title>Colegio Santa Mar&iacute;a - Noticias</title>

<script src="<?php echo base_url('assets/js/AC_RunActiveContent.js'); ?>" language="javascript"></script>
<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/estilos.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/jquery.bxslider/jquery.bxslider.css'); ?>" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.bxslider/jquery.bxslider.min.js"></script>  

<?php 
if(!isset($swf)):
	$swf = 'swf/top_colegio.swf';
	$swf_js = explode('.', $swf);
	$swf_js = $swf_js[0];
	
else:

	$swf_js = explode('.', $swf);
	$swf_js = $swf_js[0];		
	 
endif;


if($nivel):
switch ($nivel) {
	case 1:
		$swf = 'swf/top_inicial.swf';
		$swf_js = explode('.', $swf);
		$swf_js = $swf_js[0];				
	break;
	case 2:
		$swf = 'swf/top_primaria.swf';
		$swf_js = explode('.', $swf);
		$swf_js = $swf_js[0];
	break;
	case 3:
		$swf = 'swf/top_secundaria.swf';
		$swf_js = explode('.', $swf);
		$swf_js = $swf_js[0];				
	break;			
	case 4:		
		$swf = 'swf/top_egresados.swf';
		$swf_js = explode('.', $swf);
		$swf_js = $swf_js[0];		
	break;	
	
	
	default:
		
		break;
}
endif;


?>

<style>	
	.relacionados a{
		text-decoration:none;
		color: #fff;
	}
</style>

</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">

<div id="top" style="z-index:999;">
	<p align="center">

<script language="javascript">
	if (AC_FL_RunContent == 0) {
		alert("Esta página requiere el archivo AC_RunActiveContent.js. En Flash, seleccione \"Aplicar actualización de contenido activo\" en el menú Comandos para copiar el archivo AC_RunActiveContent.js en la carpeta de salida HTML.");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0',
			'width', '980',
			'height', '200',
			'src', 'top_colegio',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', 'transparent',
			'devicefont', 'false',
			'id', 'top_colegio',
			'bgcolor', '#ffffff',
			'name', 'top_colegio',
			'menu', 'false',
			'allowScriptAccess','sameDomain',
			//----------------insertar redireccion del top-----------------------
			'movie', '<?php echo base_url($swf_js . $ir); ?>',
			//-------------------------------------------------------------------
			'salign', 't'
			); //end AC code
	}
</script>
<noscript>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="980" height="194" id="top" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="movie" value="<?php echo base_url($swf); ?>" /><param name="menu" value="false" /><param name="quality" value="high" /><param name="salign" value="t" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#ffffff" />	<embed src="<?php echo base_url($swf); ?>" menu="false" quality="high" salign="t" wmode="transparent" bgcolor="#ffffff" width="980" height="194" name="top" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>
</noscript>
	<p>
	</div>


<?php echo $this->load->view($contenido);?>

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>
