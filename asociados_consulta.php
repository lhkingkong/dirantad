<?php
include ("inc/connect.php");

if(!isset($_GET['condition']))
$condition = 0;
else
$condition = $_GET['condition'];

$where = "";

switch(intval($condition)){
	case 1:
				$where = "AND asociados.asociado_tipo_id = 1 ";
				$txtreport ="Listado de las cadenas de Tiendas de Autoservicio asociadas a ANTAD";
				break;
	case 2:
				$where = "AND asociados.asociado_tipo_id = 2 ";
				$txtreport ="Listado general de las cadenas de Tiendas Departamentales asociadas a ANTAD";
				break;
	case 3:
				$where = "AND asociados.asociado_tipo_id = 3 ";
				$txtreport ="Listado general de las cadenas de Tiendas Especializadas asociadas a ANTAD";
				break;
	default:
				$txtreport ="Listado general de las cadenas asociadas a ANTAD";
				break;
}

$query = " SELECT asociados.*, CASE asociados.asociado_tipo_id
       WHEN 1 THEN 'Autoservicio'
       WHEN 2 THEN 'Departamental'
	   WHEN 3 THEN 'Especializada'
       ELSE 'No tiene' 
    END AS case_tipo_tienda, SUM(asociados_estados.asociado_estado_numtiendas) NUMTIENDAS, SUM(asociados_estados.asociado_estado_m2pisoventas) M2PISO, asociados_estados.asociado_id 
			FROM asociados_estados, asociados
			WHERE asociados.asociado_id = asociados_estados.asociado_id 
			$where
			GROUP BY asociados_estados.asociado_id
			ORDER BY asociados.asociado_razonsocial ";
$result = mysql_query($query);

$query_count = "SELECT COUNT(*) NUMERO, SUM(S.NUMTIENDAS) NUMTIENDASF, SUM(S.M2PISO) M2PISOF 
				FROM  (
						SELECT SUM(asociados_estados.asociado_estado_numtiendas) NUMTIENDAS, SUM(asociados_estados.asociado_estado_m2pisoventas) M2PISO, asociados_estados.asociado_id 
							FROM asociados_estados, asociados 
							WHERE asociados.asociado_id = asociados_estados.asociado_id 
							$where 
							GROUP BY asociados_estados.asociado_id ) as S";
//echo $query_count;
$result_count = mysql_query ($query_count);
$count = mysql_fetch_assoc($result_count);
$total_cadenas = number_format($count['NUMERO'],0);
$total_numtiendas = number_format($count['NUMTIENDASF'], 0);
$total_superficie = number_format($count['M2PISOF']);
?>
<script type="text/javascript">

    $(function() {
      $('#tabla').footable().fixedHeaderTable({ 
			footer: false,
			cloneHeadToFoot: false,
			altClass: 'odd',
			autoShow: true
		});
    });
	</script>
    <!-- START CONTENT -->
<section class="contenidoA container clearfix">

  <div class="col_1_1 ">
    <div class="caja1">
      <header> <?php echo $txtreport; ?> </header>
      <section>
        <table>
          <tbody>
            <tr>
              <td>Número total de cadenas</td>
              <td><?php echo $total_cadenas; ?></td>
            </tr>
            <tr>
              <td>Número total de tiendas</td>
              <td><?php echo $total_numtiendas; ?></td>
            </tr>
            <tr>
              <td>Superficie total de Piso de Ventas</td>
              <td><?php echo $total_superficie; ?> m&sup2;</td>
            </tr>
          </tbody>
        </table>
      </section>
    </div>
  </div>
  <div class="col_1_1">
    <div style="margin:auto; width:97%; position:relative; height: 400px;">
        <table id="tabla" class="footable" width="100%">
          <thead>
            <tr class="siempre">
              <th data-class="expand" data-sort-initial="true"> <span title="table sorted by this column on load">Nombre Comercial</span> </th>
              <th data-hide="all"> Nombre Comercial </th>
              <th data-hide="phone,tablet"> Raz&oacute;n Social </th>
              <th data-hide="all"> Tipo de Tienda </th>
              <th data-hide="all"> N&uacute;mero de Tiendas </th>
              <th data-hide="all"> Superficie de Ventas </th>
              <th data-hide="all"> Direcci&oacute;n </th>
              <th data-hide="all"> Tel&eacute;fono </th>
              <th data-hide="all"> Fax </th>
              <th data-hide="all"> Sitio Web </th>
              <th data-hide="all"> Correo Electr&oacute;nico </th>
              <th data-sort-ignore="true"> Logotipo </th>
            </tr>
          </thead>
          <tbody>
            <?php
while ($asociados = mysql_fetch_assoc($result)) {
	$nombrecomercial = utf8_encode($asociados['asociado_nombrecomercial']);
	$razonsocial = utf8_encode($asociados['asociado_razonsocial']);
	$tipotienda = utf8_encode($asociados['case_tipo_tienda']);
	$numtiendas =  utf8_encode($asociados['NUMTIENDAS']);//0;//utf8_encode($asociados[14]);
	
	$direccion = "<br>".utf8_encode($asociados['asociado_calle'])."<br>".utf8_encode($asociados['asociado_colonia'])."<br>".utf8_encode($asociados['asociado_cp'])." ".utf8_encode($asociados['asociado_ciudad'])."<br>".utf8_encode($asociados['asociado_estado']) ;
	$ciudad = utf8_encode($asociados['asociado_ciudad']);
	$estado = utf8_encode($asociados['asociado_estado']);
	
	$query_logo = "SELECT ASOCIADO_PATH_IMG FROM asociados_logo WHERE asociado_id = ".utf8_encode($asociados['asociado_id']);
	$result_logo = mysql_query($query_logo);
	if ($values = mysql_fetch_assoc($result_logo))
		$logo = trim(utf8_encode($values['ASOCIADO_PATH_IMG']));
	else
		$logo = "SinLogo";
?>
            <tr>
              <td><?php echo $nombrecomercial; ?></td>
              <?php /*?><td><div class="tablaFoo"><?php echo $razonsocial; ?></div></td><?php */?>
              <td><div class="tablaFoo"><?php echo $nombrecomercial; ?></div></td>
              <td><div class="tablaFoo"><?php echo $razonsocial; ?></div></td>
              <td><div class="tablaFoo"><?php echo $tipotienda; ?></div></td>
              <td><div class="tablaFoo"><?php echo $numtiendas; ?></div></td>
              <td><div class="tablaFoo"><?php echo number_format($asociados['M2PISO'], 2)." m&sup2;"; ?></div></td>
              <td><div class="tablaFoo"><?php echo $direccion; ?></div></td>
              <td><div class="tablaFoo"><?php echo $asociados['asociado_telefono']; ?></div></td>
              <td><div class="tablaFoo"><?php echo $asociados['asociado_fax']; ?></div></td>
              <td><div class="tablaFoo url"><a href="<?php echo $asociados['asociado_website']; ?>" target="_blank"><?php echo $asociados['asociado_website']; ?></a></div></td>
              <td><div class="tablaFoo"><?php echo "A especificar"; ?></div></td>
              <td><img title="active" width="50" height="50" src="images/logos/50x50/<?php echo $logo; ?>.jpg" /></td>
            </tr>
            <?php
}	//fin while($asociados = mysql_fetch_row($result))
?>
          </tbody>
        </table>
      </div>
       <div class="clear"></div>
    </div>
  </div>
</section>
<!-- END CONTENT -->
<?php
function obtenerNombreEstado($estado){
	$query = " SELECT estado 
				FROM estados
				WHERE estado_id = $estado ";
	$result = mysql_query($query);
	if($result){
		$values = mysql_fetch_assoc($result);
		return $values['estado'];
	}
}

function obtenerNombreZona($zona){
	$query = " SELECT zona_nombre 
				FROM zonas
				WHERE zona_id = $zona ";
	$result = mysql_query($query);
	if($result){
		$values = mysql_fetch_assoc($result);
		return $values['zona_nombre'];
	}
}

function obtenerNombreAsociado($asociado){
	$query = " SELECT asociado_nombrecomercial 
				FROM asociados
				WHERE asociado_id = $asociado ";
	$result = mysql_query($query);
	if($result){
		$values = mysql_fetch_assoc($result);
		return $values['asociado_nombrecomercial'];
	}
}


