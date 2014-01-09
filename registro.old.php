<?php
$currentA='inicio'; 
include ("inc/connect.php");
include('validar.php');
	$username=$_POST['username'];
	$password=$_POST['password'];

	
	echo '<center><table>';
	if(isset($_POST['ingresar']))
	{
		if($username!="" && $password!="")
		{
			$conexion=conectar();
			if(!$conexion)
				die();
		$result = mysql_query ( "SELECT username,password, isactive from usuarios where username='$username' && password='$password'" );
          if (! $result ) {
           echo 'Could not run query: ' . mysql_error ();
             exit;
             }
           $row = mysql_fetch_row ( $result );
       
		    $datos=mysql_query($comando,$conexion);
			$id=mysql_fetch_assoc($datos);	
			if( $row [2]==2)
		{
			$_SESSION['usuario']=$username;
		
			echo "<tr bgcolor='green'>
				          <td>
						     <b>
							    <font color='White'>
								    iIngresando!
								</font>
							  </b>
						   </td>
						</tr>";
				echo "<meta http-equiv='refresh' content='1;url=dos.php'>";
			}
			else
		{
				echo "<tr bgcolor='red'>
						<td>
							<b>
								<font color='White'>
									iUsuario no validado active su cuenta revisa tu correo electronico!
								</font>
							</b>
						</td>
					</tr>";
			}
		mysql_close($conexion);
		}
		else
		{
			echo "<tr bgcolor='blue'>
						<td>
							<b>
								<font color='White'>
									iFaltan Campos por LLenar!
								</font>
							</b>
						</td>
					</tr>";
		}
	}
	echo '</table></center>';
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

<!-- jQuery library (served from Google) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="js/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="css/jquery.bxslider.css" rel="stylesheet" />
<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

<!-- Favicons
	================================================== -->
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
<style type="text/css">
.fotoA {
	border:5px solid #FFFFFF;
	box-shadow:2px 2px 7px #646464;
	transition: box-shadow 2s;
}
.foto1:hover {
	box-shadow:2px 2px 7px #333333;
}
.foto1 {
	border:5px solid #FFFFFF;
	box-shadow:2px 2px 7px #646464;
	transform:scale(0.5, 0.5);
	-ms-transform:scale(0.5, 0.5);
	-moz-transform:scale(0.5, 0.5);
	-webkit-transform:scale(0.5, 0.5);
	-o-transform:scale(0.5, 0.5);
	transition: box-shadow 2s, transform 2s;
}
.foto1:hover {
	box-shadow:2px 2px 7px #333333;
	transform:scale(1, 1);
	-ms-transform:scale(1, 1);
	-moz-transform:scale(1, 1);
	-webkit-transform:scale(1, 1);
	-o-transform:scale(1, 1);
}
#foto2 {
	border:5px solid #FFFFFF;
	box-shadow:2px 2px 7px #646464;
	transform:rotate(7deg);
	-ms-transform:rotate(7deg); /* IE 9 */
	-moz-transform:rotate(7deg); /* Firefox */
	-webkit-transform:rotate(7deg); /* Safari and Chrome */
	-o-transform:rotate(7deg); /* Opera */
	transition: box-shadow 2s, transform 2s;
}
#foto2:hover {
	box-shadow:2px 2px 7px #333333;
	transform:scale(1, 1);
	-ms-transform:scale(1, 1);
	-moz-transform:scale(1, 1);
	-webkit-transform:scale(1, 1);
	-o-transform:scale(1, 1);
}
</style>
<link rel="stylesheet" href="js/nivo-slider/themes/default/default.css" type="text/css" media="screen" />
<?php /*?><link rel="stylesheet" href="js/nivo-slider/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="js/nivo-slider/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="js/nivo-slider/themes/bar/bar.css" type="text/css" media="screen" /><?php */?>
<link rel="stylesheet" href="js/nivo-slider/nivo-slider.css" type="text/css" media="screen" />
<?php /*?><link rel="stylesheet" href="js/nivo-slider/style.css" type="text/css" media="screen" /><?php */?>
<?php include "inc/jsAll.php"; ?>
<script type="text/javascript" language="javascript" src="js/jquery.carouFredSel-6.2.0-packed.js"></script>

		<!-- optionally include helper plugins -->
		<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.mousewheel.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.touchSwipe.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.transit.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>

		<!-- fire plugin onDocumentReady -->
		<script type="text/javascript" language="javascript">
			$(function() {
				$('#asociados1').carouFredSel({
					responsive: true,
					width: '100%',
					scroll: 2,
					prev: '#prev',
					next: '#next',
					items: {
						width: 60,
					//	height: '30%',	//	optionally resize item-height
						visible: {
							min: 2,
							max: 13
						}
					}
				});
				
				$('#aEstrategicos').carouFredSel({
					responsive: true,
					width: '100%',
					scroll: 2,
					prev: '#prevE',
					next: '#nextE',
					items: {
						width: 60,
					//	height: '30%',	//	optionally resize item-height
						visible: {
							min: 2,
							max: 13
						}
					}
				});
			});
		</script>
</head>
<body>
<?php include "header.php"; ?>
<?php include "mainmenu.php"; ?>
<?php /*?><!-- Start Content
	================================================== --><?php */?>
<div class="fullscreen">
  <div class="container contenidoA">
    <div class="fullcontainer">
      <div class="content_block leftTitle">
        <p class="title"> Inscripción al directorio ANTAD 2014</p>
      </div>
    </div>
    <div class="sixteen columns">
      <div class="titulomovil">
        <titulos>Inscripción al directorio ANTAD 2014</titulos>
      </div>
      <p>
<FORM NAME="formulario" METHOD="POST" ACTION="insertarRegistro.php" onSubmit="return valida(this);">
<table align="center" width="400" border="0">
<tr>
<td colspan="2" align="center">
</td>
</tr>
<tr>

<td>Nombre Completo:</td>
<td><label><input type="text" name="nombre" id="Nombre" size="20" /></label></td>
</tr>

<tr>
<td>Apellido Completo:</td>
<td><label><input type="text" name="apellido" id="apellido" size="20" /></label></td>
</tr>

<td>Empresa:</td>
<td><label><input type="text" name="empresa" id="empresa" size="20" /></label></td>
</tr>

<td>Dirreción:</td>
<td><label><input type="text" name="dirrecion" id="dirrecion"  size="20"/></label></td>
</tr>

<td>Colonia:</td>
<td><label><input type="text" name="colonia" id="colonia"size="20"  /></label></td>
</tr>

<td>C.P:</td>
<td><label><input type="text" name="cp" id="cp" size="20" /></label></td>
</tr>


 <td>Ciudad:</td>
<td><label><input type="text" name="ciudad" id="ciudad" size="20" /></label></td>
</tr>

<td>Estado:</td>
<td><label><input type="text" name="estado_id" id="estado_id" size="20" /></label></td>
</tr>

<tr>
<td>Telefono:</td>
<td><label><input type="text" name="telefono" id="telefono" size="20"/></label></td>
</tr>
<tr>
<td>E-mail:</td>
<td><label><input type="text" name="email" id="email" size="20"/></label></td>
</tr>

<tr>
<td>Usuario:</td>
<td><label><input type="text" name="username" id="username"size="20"/></label></td>
</tr>

<tr>
<td>Contraseña:</td>
<td><label><input type="password" name="password" id="c1" size="20"/></label></td>
</tr>
<td>Repite contraseña:</td>
<td><label><input type="password" name="password" id="c2" size="20"/></label></td>
</tr>
<tr> 
<td><label>

<input type="submit" name="validar" id="validar" value='Enviar' onclick='return(verif(this.form)); MM_validateForm()'>


			
	   <script language="javascript" type="text/javascript">  
    //busca caracteres que no sean espacio en blanco en una cadena  
    function vacio(q) {  
            for ( i = 0; i < q.length; i++ ) {  
                    if ( q.charAt(i) != " " ) {  
                            return true  
                    }  
            }  
            return false  
    }    
    //valida que el campo no este vacio y no tenga solo espacios en blanco  
    function valida(F) 
	{    
            if( vacio(F.nombre.value) == false )  
			{  
                    alert("llene todos los campos .")  
					return false  
            }
			else if( vacio(F.apellido.value) == false )  
			{  
                    alert("llene todos los campos .")  
					return false  
            }
			else if( vacio(F.dirrecion.value) == false )  
			{  
                    alert("llene todos los campos .")  
					return false  
            }
			else if( vacio(F.cp.value) == false )  
			{  
                    alert("llene todos los campos .")  
					return false  
            }
			else if( vacio(F.ciudad.value) == false )  
			{  
                    alert("llene todos los campos .")  
					return false  
            }
			else if( vacio(F.estado_id.value) == false )  
			{  
                    alert("llene todos los campos .")  
					return false  
            }
			else if( vacio(F.telefono.value) == false )  
			{  
                    alert("llene todos los campos .")  
					return false  
            }
			else if( vacio(F.email.value) == false )  
			{  
                    alert("llene todos los campos .")  
					return false  
            }
			else if( vacio(F.username.value) == false )  
			{  
                    alert("llene todos los campos .")  
					return false  
            }
			else if( vacio(F.password.value) == false )  
			{  
                    alert("llene todos los campos .")  
					return false  
            }		
			else {   
					alert("campos llenos")  
                    //cambiar la linea siguiente por return true para que ejecute la accion del formulario  
                    return false  
            }       
    }    

	

function verif(formu)
{	if (formu.c1.value==formu.c2.value) 
{ alert('Las contraseñas si son iguales'); return true }
	else 
{ alert('Las dos contraseñas no son iguales'); return false }
}
</script
></table>
</form>
	
	

<script type="text/javascript">
$(document).ready(function(){
	var myForm = $('#register');
 
	myForm.validate({
			errorClass: "errormessage",
			onkeyup: false,
			errorClass: 'error',
			validClass: 'valid',
			rules: {
				email: { required: true, email: true, minlength: 3, maxlength: 100 },
				username: { required: true, minlength: 3, maxlength: 30 },
				password: { required: true, minlength: 3, maxlength: 100 }
			},
			errorPlacement: function(error, element)
			{
				var elem = $(element),
					corners = ['right center', 'left center'],
					flipIt = elem.parents('span.right').length > 0;
 
				if(!error.is(':empty')) {
					elem.filter(':not(.valid)').qtip({
						overwrite: false,
						content: error,
						position: {
							my: corners[ flipIt ? 0 : 1 ],
							at: corners[ flipIt ? 1 : 0 ],
							viewport: $(window)
						},
						show: {
							event: false,
							ready: true
						},
						hide: false,
						style: {
							classes: 'ui-tooltip-red'
						}
					})
					.qtip('option', 'content.text', error);
				}
				else { elem.qtip('destroy'); }
			},
			success: $.noop,
	})
});

$("#register").submit(function(event) {
	if($("#register").valid()) {
		event.preventDefault(); 

		var $form = $( this ),
			mail = $form.find('input[name="email"]').val(),
			user = $form.find('input[name="username"]').val(),
			pass = $().crypt({method:"sha1",source:$().crypt({method:"sha1",source:$form.find('input[name="password"]').val()})});

		$.post("inc/action.php?a=register", {email: mail, username: user, password: pass},
			function(data) {
				if(data['error'] == 1)
				{
					$("#message").remove();
					
					$(".form").prepend('<div id="message"></div>');
					
					$("#message").message({type: "error", dismiss: false, message: data['message']});
					
					$("#message").effect("shake", {times: 2, distance: 10}, 200);
				}
				else if(data['error'] == 0)
				{			
					$("#message").remove();
					
					$(".form").prepend('<div id="message"></div>');
					
					$("#message").message({type: "info", dismiss: false, message: data['message']});
					
					$("#message").effect("pulsate", {times: 2}, 200);
				}
			}, "json"
		);
	}
	else
	{
		$("[id^=ui-tooltip-]").effect("pulsate", {times: 3}, 300);
		return false;
	}
});

</script>		  
</p>
    </div>
    <div class="clearfix"></div>

 
 

  </div>
</div>

<?php /*?><!-- End Content
================================================== --><?php */?>
<?php include "footer.php" ?>
</body>
</html>