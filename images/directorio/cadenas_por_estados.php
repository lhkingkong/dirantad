<?php
require("includes/connect.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico" />
		
		<title>Tiendas por Estados</title>
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
		<div id="container" style="width:96%">
			<div class="full_width big">Reporte de Cadenas por Estados    BTOULEAU</div>
			
			<h1>Asociados</h1>
			<p>Lista de tiendas y superficie de piso de ventas de las cadenas por zona</p>
			<div id="asociados">
  <table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
	<thead>
		<tr>
			<th>Razón Social</th>
			<th>Estado</th>							
			<th>Tiendas</th>
			<th>m2 de Piso de Venta</th>
		</tr>
	</thead>	
	<tbody>
<?php
$query = "SELECT asociado_id, tipo_id, nombre_comercial, razon_social FROM asociados ORDER BY razon_social";
$result = mysql_query($query);
while ( $lista =  mysql_fetch_row($result))
{
        $asociado_id = $lista[0];
        $cadena = $lista[2];
        $razon_social = $lista[3];	

	$first = 1;
	$numerodetiendas_total = 0;
	$m2pisodeventas_total = 0;

	$query2 = "SELECT estados.estado_id, estados.estado, tiendas_estados.tienda_estado_numero_tiendas, tiendas_estados.tienda_estado_piso_venta FROM tiendas_estados 
						LEFT OUTER JOIN asociados ON asociados.asociado_id = tiendas_estados.tienda_id
						LEFT OUTER JOIN estados ON estados.estado_id = tiendas_estados.estado_id						
						WHERE tiendas_estados.tienda_id = $asociado_id";
	$result2 = mysql_query($query2);
	while ( $lista2 =  mysql_fetch_row($result2))
	{	
					
		$estado = $lista2[1];
		$numerodetiendas = $lista2[2];
		$m2pisodeventas	 = $lista2[3];
		
		$numerodetiendas_total += $numerodetiendas;
		$m2pisodeventas_total += $m2pisodeventas;
?>
		<tr class="odd gradeC">
			<td align="center"><strong><?php if ($first == 1) echo $razon_social;  ?></strong></td>		
			<td><?php echo $estado; ?></td>		
			<td align="right"><?php echo number_format($numerodetiendas); ?></td>
			<td align="right"><?php echo number_format($m2pisodeventas, 2); ?></td>
		</tr>
<?php
	$first = 0;
}
?>	
		<tr class="odd gradeA">
			<td align="right"><strong><?php echo $razon_social;  ?><strong></td>
			<td></td>
			<td align="right"><strong><?php echo number_format($numerodetiendas_total); ?></strong></td>
			<td align="right"><strong><?php echo number_format($m2pisodeventas_total, 2); ?></strong><td>
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