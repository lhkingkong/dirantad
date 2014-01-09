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
        <p class="title"> Connexíon al directorio ANTAD 2014</p>
      </div>
    </div>
    <div class="sixteen columns">
      <div class="titulomovil">
        <titulos>Connexíon al directorio ANTAD 2014</titulos>
      </div>
      <p>
		<FORM ACTION="login.php" METHOD=POST>
<table align="center" width="400" border="0">
<tr>
<td colspan="2" align="center">
</td>
</tr>
<tr>
<td>Usuario:</td>
<td><label>
<input type="text" name="username" id="username" />
</label></td>
</tr>
<tr>
<td>Contraseña:</td>
<td><label>
<input type="password" name="password" id="password" />
</label></td>
</tr>
<tr>
<td align="center" width="150"><INPUT NAME="ingresar" TYPE="SUBMIT" VALUE="Ingresar"> 
		</td>
</tr>
</tr>
</table>
</form>  
	  
	  
</p>
<p><h3><a href="registro.php" accesskey="4" title="">Regístrate ahora </a></li></p></h3> 


      <hr />
    </div>
    <div class="clearfix"></div>

 
 

  </div>
</div>

<?php /*?><!-- End Content
================================================== --><?php */?>
<?php include "footer.php" ?>
</body>
</html>