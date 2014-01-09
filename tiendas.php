<?php 
include ("inc/validar.php");
$currentA='tiendas'; 
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta charset="utf-8">
<title>Directorio ANTAD 2014</title>
<meta name="description" content="">
<meta name="author" content="">
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
<title>Directorio ANTAD 2014</title>
<link rel="stylesheet" href="css/jquery-ui.css" />
<link rel="stylesheet" href="css/jquery/jquery-ui-1.10.1.custom.css">
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
	
	
    </script>
</head>
<body>
<?php include "header.php" ?>
<?php include "mainmenu.php" ?>

<!-- Primary Page Layout
	================================================== --> 

<!-- Delete everything in this .container and get started on your own site! -->
<div class="fullscreen">
  <div class="container contenidoA">
    <div>
      <div class="fullcontainer">
        <div class="content_block leftTitle">
		<p class="title">Los Formatos de Tiendas</p>
        </div>		
      </div>
 		<div class="sixteen columns">
				<div class="titulomovil">    
					<p><titulos>Los Formatos de Tiendas</titulos></p>	
				</div>		
			<p style="text-indent:20px;">Para analizar objetivamente la estructura de cada una de las Cadenas Asociadas, ANTAD presenta los formatos de tiendas que maneja el Comercio Detallista en México, además de los servicios que brinda este sector.</p>
		</div>	 
        <div class="clear"></div>
      <div id="tabs" style="margin:2%;">
        <ul>
          <li><a href="#tabs-1">Autoservicio</a></li>
          <li><a href="#tabs-2">Departamentales</a></li>
          <li><a href="#tabs-3">Especializadas</a></li>
        </ul>
        <div id="tabs-1">
          <h3>Tiendas de Autoservicio</h3>
          <div>
            <ul>
              <p>Sistema de ventas al consumidor que exhibe productos y artículos en forma abierta, clasificándolos por categorías y tipos, principalmente abarrotes, perecederos, ropa y mercancías generales.<br>
                Ofrecen la mayor atención con la menor intervención del personal y un área para el pago de los clientes, con sistemas Punto de Venta a la salida.</p>
            </ul>
          </div>
          <div id="accordion1">
            <h3>Megamercado</h3>
            <div>
              <div>
                <ul>
                  <?php /*?><div class="ima"><img src="images/asociado_megamercado.png" class="aligncenter" /> </div><?php */?>
                  <div class="con">
                  <p><strong>Superficie:</strong> superior a los 10 mil metros cuadrados de piso de venta aproximadamente.</p>
                  <p><strong>Productos que maneja:</strong> toda la línea de mercancías.</p>
                  <p><strong>Particularidad:</strong> Ofrece una gran variedad de servicios adicionales, como servicios bancarios, óptica y reparadora de calzado entre otros.</p>
                </ul>
              </div>
            </div>
            <h3>Hipermercado</h3>
            <div>
              <div>
                <ul>
                  <?php /*?><div class="ima"><img src="images/asociado_hipermercado.png" class="aligncenter" alt="" /></div><?php */?>
                  <div class="con">
                  <p><strong>Superficie:</strong> oscila entre 4,501 y 10 mil metros cuadrados de piso de venta aproximadamente.</p>
                  <p><strong>Productos que maneja:</strong> casi toda la línea de mercancía.</p>
                  <p><strong>Particularidad:</strong> Ofrece servicios adicionales al consumidor como puede ser farmacia, cajeros automáticos y servicios de comida rápida.</p>
                </ul>
              </div>
              </ul>
            </div>
            <h3>Supermercado</h3>
            <div>
              <ul>
                <div>
                  <ul>
                    <?php /*?><div class="ima"><img src="images/supermercadoretro.png" class="aligncenter" alt="" /></div><?php */?>
                    <div class="con">
                    <p><strong>Superficie:</strong> desde los 501 hasta 4,500 metros cuadrados de piso de venta aproximadamente.</p>
                    <p><strong>Productos que maneja:</strong> principalmente perecederos y abarrotes.</p>
                    <p><strong>Particularidad:</strong> Cuenta únicamente con algunos de los servicios que tiene el megamercado como por ejemplo las farmacias.</p>
                  </ul>
                </div>
              </ul>
            </div>
            <h3>Bodega</h3>
            <div>
              <div>
                <ul>
                  <?php /*?><div class="ima"><img src="images/bodega.jpg" class="aligncenter" alt="" /></div><?php */?>
                  <div class="con">
                  <p><strong>Superficie:</strong> mayor a los 2,500 metros cuadrados de piso de venta.</p>
                  <p><strong>Productos que maneja:</strong> la mayor parte de las líneas de productos con un sistema de descuento en medio mayoreo.</p>
                  <p><strong>Particularidad:</strong> Tiene poca decoración en las tiendas, y no ofrece a sus clientes ningún tipo de servicio que signifique atención directa.</p>
                </ul>
              </div>
              </ul>
            </div>
            <h3>Clubes de Membresía</h3>
            <div>
              <div>
                <ul>
                  <?php /*?><div class="ima"><img src="images/club.jpg" class="aligncenter" alt="" /></div><?php */?>
                  <div class="con">
                  <p>Están enfocados al mayoreo y medio mayoreo dirigidos a ciertos sectores a través de membresía.<br>
                    Manejan grandes volúmenes de compra y bajos márgenes de comercialización. Presentan los productos en envases grandes y/o múltiples. La tienda no cuenta con decoración.</p>
                  <p><strong>Superficie:</strong> mayor a los 4,500 metros cuadrados de piso de venta.</p>
                  <p><strong>Productos que maneja:</strong> abarrotes, perecederos, ropa y mercancías generales.</p>
                </ul>
              </div>
              </ul>
            </div>
            <h3>Tiendas de Descuento</h3>
            <ul>
              <div>
              <div>
                <ul>
                  <?php /*?><div class="ima"><img src="images/asociado_tiendadescuento.jpg" class="aligncenter" alt="" /></div><?php */?>
                  <div class="con">
                  <p><strong>Superficie:</strong> mayor a 150 y 500 metros cuadrados de piso de venta.</p>
                  <p><strong>Productos que maneja:</strong> Cuentan con una limitada selección de productos y un nivel de precios por debajo del resto de los otros formatos de Autoservicio.<br>
                    Ofrecen reducido servicio al consumidor y una gran presencia de las marcas propias.</p>
                  <p><strong>Particularidad:</strong> Se reducen los gastos generales controlando al máximo los costos relacionados con la decoración, el mobiliario, la energía eléctrica, publicidad dentro de la tienda, el almacenamiento y manipulación de mercancía.</p>
                </ul>
              </div>
            </ul>
          </div>
        </div>
        <div id="tabs-2">
          <h3>Tiendas Departamentales</h3>
          <div>
            <ul>
              <p>Sistema directo de venta al consumidor. Exhibe productos que clasifica por áreas o departamentos, principalmente ropa, varios, enseres mayores y menores. Ofrecen atención personalizada a clientes, cuenta por los menos con un Punto de Venta por departamento o área.</p>
            </ul>
          </div>
        </div>
        <div id="tabs-3">
          <h3>Tiendas Especializadas</h3>
          <div id="accordion2">
            <h3>Farmacias</h3>
            <div>
              <ul>
                <?php /*?><div class="ima"><img src="images/farmacia.jpg" class="aligncenter" alt="" /> </div><?php */?>
                <div class="con">
                <p>Cuenta con  mostrador de servicio personalizado para productos farmacéuticos que requieren prescripción médica, además de un área de exhibición de productos y artículos en forma abierta. Regularmente funciona en horarios amplios. Cuenta en promedio con 2 puntos de venta para pago.</p>
              </ul>
            </div>
            <h3>Tiendas de Conveniencia</h3>
            <div>
              <ul>
                <div>
                  <ul>
                    <?php /*?><div class="ima"><img src="images/homepage_image_2.png" class="aligncenter" alt="" /></div><?php */?>
                    <div class="con">
                    <p><strong>Superficie:</strong> menor a los 500 metros cuadrados de piso de venta.</p>
                    <p><strong>Productos que maneja:</strong> alimentos y bebidas, el surtido y diversidad de la mercancía es limitada.</p>
                    <p><strong>Particularidad:</strong> Unidades comerciales al detalle dedicadas a la venta de satisfactores inmediatos las 24 horas.</p>
				</ul>
                </div>
              </ul>
            </div>
            <h3>Formatos Especializados</h3>
            <div>
              <ul>
                <div>
                  <ul>
                    <?php /*?><div class="ima"><img src="images/formatos especiales.jpg" class="aligncenter"/></div><?php */?>
                    <div class="con">
                      <p>En este formato también se agrupa:
                      <ul>
                        <li>Electrónica</li>
                        <li>Ferretera</li>
                        <li>Jugueterías</li>
                        <li>Joyerías</li>
                        <li>Papelerías</li>
                        <li>Ropa, Zapatos y Accesorios</li>
                        <li>Otros</li>
                      </ul>
                      </p>
                      <p><strong>Definición Piso de Venta:</strong> Superficie en la que tiene lugar el acceso al público, la exhibición de la mercancía y las actividades de promoción, publicidad, ventas y cobro.<br>
                        No considera la superficie destinada a privados, oficinas y bodegas, área de corte de carne, locales comerciales que den al pasillo de cajas, área de recibo o cualquier otra área con la cual no tenga contacto con el consumidor.</p>
                    </div>
                  </ul>
                </div>
              </ul>
            </div>
          </div>
        </div>
      </div>     
      <!-- container --> 
    </div>
  </div>
</div>
<!-- fullscreen --> 
<!-- End Document
================================================== -->

<?php include "footer.php" ?>
</body>
</html>