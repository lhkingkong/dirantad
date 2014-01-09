<?php
session_start();
$currentA='login'; 
include ("inc/connect.php");
include ("inc/interfaz.php");

if(!empty($_SESSION['e4m'])){
	header("location:inicio.php");
}
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

<!-- optionally include helper plugins -->
<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.mousewheel.min.js"></script>
<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.transit.min.js"></script>
<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>
<script type="text/javascript">
$intentosMax=20;
function login(){
	if(!validar())
		return false;
	$intentos = $intentosMax;
	loginAJAX();
}
function validar(){
	if ($.trim($('#email').val()) == "") {
                    alerta("Atención","Favor de agregar un Usuario o Correo Electrónico.");
                    $('#email').focus();
                    return false;
                }
				/*if(!validarEmail($('#email').val())){
					alerta("Atención","Favor de agregar un Correo Electrónico válido.");
                    $('#email').focus();
                    return false;
				}*/
				if($.trim($('#password').val()) == ""){
					alerta("Atención","Favor de agregar la Contraseña.");
                    $('#password').focus();
                    return false;
				}
				return true;
}

function loginAJAX() {
                jQuery.ajax({
                    type: "POST",
                    url: "php/validarLogin.php",
                    /*dataType:"html",*/
                    data: "email=" + Base64.encode($("#email").val().toString()) + "&" +
                            "pass1=" + Base64.encode($("#password").val().toString()),
                    success: function(data) {
						$registrandose = false;
                        if (data.indexOf('Sin registro') != -1) {
                            alerta("Atención","No existe el Usuario / Correo Electrónico o su Contraseña es incorrecta.");
							return false;
                        }
						if (data.indexOf('Inactivo') != -1) {
                            alerta("Atención","Su cuenta aun no ha sido activada.");
							return false;
                        }
						if (data.indexOf('Vencida') != -1) {
                            alerta("Atención","Su cuenta se encuentra vencida o no ha sido activada con el periodo de vencimiento correspondiente.");
							return false;
                        }
                        if (data == 'Bien') {
                            location.href="inicio.php";
                        } else {
                            alerta("Atención","Lo sentimos ha ocurrido un error.");
                        }
                    }, //fin success
                    error: function(xhr, ajaxOptions, thrownError) {
                        if ($intentos < 1) {
                            alerta("Atención","Lo sentimos, su conexi&oacute;n con el servidor se ha perdido, favor de contactarse con nosotros. ");
                        } else {
                            $intentos--;
                            loginAJAX();
                        }
                    }
                });
            }
</script>
</head>
<body class="loginForm">
<?php include "inc/phpAll.php"; ?>
<?php /*?><!-- Start Content
	================================================== --><?php */?>
<div class="fullscreen">
  <div class="container contenidoA grayBox" style="margin-top:10%;">
  <?php include "header.php"; ?>
    <?php /*?><div class="fullcontainer">
      <div class="content_block leftTitle">
        <p class="title"> Connexíon al directorio ANTAD 2014</p>
      </div>
    </div><?php */?>
    <div class="sixteen columns">
      <?php /*?><div class="titulomovil">
        <titulos>Connexíon al directorio ANTAD 2014</titulos>
      </div><?php */?>
      
      <div id="divForm">
      <form action="login.php" method="post">
        <div class="clear"></div>
        <div>Usuario o Correo Electr&oacute;nico *
          <input type="text" name="email" id="email" size="20" onKeyPress="return nextTab(event, this);"/>
        </div>
        <div class="clear"></div>
        <div>Contraseña *
          <input type="password" name="password" id="password" size="20" onKeyPress="if(isEnter(event)) { login(); return false; }"/>
        </div>
        <div class="clear"></div>
        <?php crearBoton('Entrar','login()','','');?>
        <?php crearBoton('¡Regístrate ahora!','','registro.php','');?>
        <div class="clear"></div>
        <div style="margin:5px;"><a href="olvidarPassword.php" class="link">¿Olvidaste la Contraseña?</a></div>
      </form>
      
      
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
</body>
</html>