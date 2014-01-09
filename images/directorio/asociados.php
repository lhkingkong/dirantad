<?php
require("includes/connect.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico" />
		
		<title>Asociados ANTAD</title>
		<style type="text/css" title="currentStyle">
			@import "media/css/page.css";
			@import "media/css/table.css";
		</style>
		<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">


$(document).ready(function() {
    $.extend( $.fn.dataTable.defaults, {
        "bFilter": false,
        "bSort": false
    } );
    $('#example').dataTable( {
        "sScrollY": "500px",
        "bPaginate": false,
        "bScrollCollapse": true
    } );
} );


		</script>
	</head>
	<body id="dt">
		<div id="container" style="width:98%">
			<div class="full_width big">
				Asociados
			</div>
			
			<h1>Asociados</h1>
			<p>Lista de las cadenas asociadas a ANTAD.</p>
			
			<h1>Lista de los asociados</h1>
			<div id="asociados">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
	<thead>
		<tr>
			<th>Razón Social</th>
			<th align="center">Cadena</th>			
			<th align="right">Tiendas</th>
			<th align="right">Piso de Venta</th>
		</tr>
	</thead>	
	<tbody>
<?php
$query = "SELECT asociado_id, tipo_id, nombre_comercial, razon_social, numerodetiendas, m2pisodeventas FROM asociados ORDER BY razon_social";
$result = mysql_query($query);
while ( $lista =  mysql_fetch_row($result))
{
        $tienda_id = $lista[0];
        $cadena = $lista[2];
        $razon_social = $lista[3];
        $numerodetiendas = $lista[4];
        $m2pisodeventas = $lista[5];
?>
		<tr class="odd gradeC">
			<td><?php echo $razon_social; ?></td>		
			<td><?php echo $cadena; ?></td>
			<td align="right"><?php echo number_format($numerodetiendas); ?></td>
			<td align="right"><?php echo number_format($m2pisodeventas, 2); ?></td>
		</tr>
<?php
}
?>
	</tbody>
</table>
			</div>
			<div class="spacer"></div>
			
			<div id="footer" class="clear" style="text-align:center;">
				<p>
					Desarrollado por <a href="http://www.ipsight.net/">IPSIGHT Solutions S.A. De C.V. </a><br>
				</p>
			</div>
		</div>
	</body>
</html>