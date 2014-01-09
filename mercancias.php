<?php include ("inc/validar.php");
$currentA='mercancias'; ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<!-- Basic Page Needs
  ================================================== -->
	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/layout.css">
    <?php include "inc/jsAll.php"; ?>
    <!-- bxSlider Javascript file -->
    <script src="js/jquery.bxslider.min.js"></script>
    <!-- bxSlider CSS file -->
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/faviconAntad.ico">
<link rel="apple-touch-icon" href="images/faviconAntad57.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/faviconAntad72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/faviconAntad114.png">
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>mercancias</title>
	<link rel="stylesheet" href="css/jquery/jquery-ui-1.10.1.custom.css"> <!-- colores de jquery-->
	<script src="js/ui/jquery.ui.core.js"></script>
	<script src="js/ui/jquery.ui.widget.js"></script>
	<script src="js/ui/jquery.ui.tabs.js"></script>
	<script src="js/ui/jquery.ui.accordion.js"></script>
	<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	
	$(function() {
		$( "#accordion1" ).accordion({
			heightStyle: "content",
			collapsible: true,
			active: false 
		});
	});
	
	$(function() {
		$( "#accordion2" ).accordion({
			heightStyle: "content",
			collapsible: true,
			active: false  
		});
	});
	
	$(function() {
		$( "#accordion3" ).accordion({
			heightStyle: "content",
			collapsible: true,
			active: false 
		});
	});
	
	</script>
</head>
<body>
<?php include "header.php" ?>
<?php include "mainmenu.php" ?>     
	 <div class="fullscreen">
	<div class="container contenidoA">
    <div class="fullcontainer">
    <div class="content_block leftTitle">
		<p class="title">Mercanc&iacute;as</p>
        </div>
        </div>
    <div class="sixteen columns">

		<div class="titulomovil">
        <p><titulos>Mercanc&iacute;as</titulos></p>
      </div>
	  </div>	
    <div class="clear"></div>

	  
<div id="tabs" style="margin:2%;">
	<ul>
		<li><a href="#tabs-1">1. Supermercado</a></li>
		<li><a href="#tabs-2">2. Ropa y Calzado</a></li>
		<li><a href="#tabs-3">3. Mercancías generales</a></li>
	</ul>
	
	<div id="tabs-1">
	 <div id="accordion1">
	<h4>1.1 Abarrotes </h4>
<div>
	<?php include "mercancias/1.1.php" ?>			
		</div> 
		
		
		<h4>1.2 Perecederos </h4>
		<div>
	<?php include "mercancias/1.2.php" ?>			
		</div>
	</div> 
</div> 
	
<div id="tabs-2"> 
	 <div id="accordion2">
	<h4>2.1 Ropa </h4>
<div>
	<?php include "mercancias/2.1.php" ?>			
		</div> 
		
		
		<h4>2.2 Calzado </h4>
		<div>
	<?php include "mercancias/2.2.php" ?>			
	</div>
	</div> 
</div> 

	
	<div id="tabs-3">
	 <div id="accordion3">
		
<h4>3.1 Enseres Mayores  </h4>
		<div>
	<?php include "mercancias/3.1.php" ?>			
	</div>
	
	
	<h4>3.2 Línea Blanca </h4>
		<div>
	<?php include "mercancias/3.2.php" ?>			
	</div>
	
	
	<h4>3.3 Enseres Menores </h4>
		<div>
	<?php include "mercancias/3.3.php" ?>			
	</div>
	
	
	
	<h4>3.4 Electrónica y Video, Celulares y Computadoras </h4>
		<div>
	<?php include "mercancias/3.4.php" ?>			
	</div>
	
	
	
	<h4>3.5 Líneas Generales </h4>
		<div>
	<?php include "mercancias/3.5.php" ?>			
	</div>
	
	
	<h4>3.6 Ferreteria </h4>
		<div>
	<?php include "mercancias/3.6.php" ?>			
	</div>
	
	
	
	<h4>3.7 Cuidado e Higiena Personal </h4>
		<div>
	<?php include "mercancias/3.7.php" ?>			
	</div>
	
	
	
	<h4>3.8 Farmacia</h4>
		<div>
	<?php include "mercancias/3.8.php" ?>			
	</div>
	
	
	<h4>3.9 Juguetes </h4>
		<div>
	</div>
	
	<h4>3.10 Papelería </h4>
		<div>
	<?php include "mercancias/3.10.php" ?>			
	</div>
	
	
	<h4>3.11 Varíos </h4>
		<div>
	<?php include "mercancias/3.11.php" ?>			
	</div>
	</div> 
</div> 
	</div> 
			</div> 

</div></div>
	<!-- container 

</div>
</div>
</div>
</div>
		
<!-- End Document
================================================== -->
<?php include "footer.php" ?>
</body>
</html>
