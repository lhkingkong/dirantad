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
/* Time between each scrolling frame */
$.fn.dataTableExt.oPagination.iTweenTime = 100;
 
$.fn.dataTableExt.oPagination.scrolling = {
    "fnInit": function ( oSettings, nPaging, fnCallbackDraw )
    {
        /* Store the next and previous elements in the oSettings object as they can be very
         * usful for automation - particularly testing
         */
        var nPrevious = document.createElement( 'div' );
        var nNext = document.createElement( 'div' );
         
        if ( oSettings.sTableId !== '' )
        {
            nPaging.setAttribute( 'id', oSettings.sTableId+'_paginate' );
            nPrevious.setAttribute( 'id', oSettings.sTableId+'_previous' );
            nNext.setAttribute( 'id', oSettings.sTableId+'_next' );
        }
         
        nPrevious.className = "paginate_disabled_previous";
        nNext.className = "paginate_disabled_next";
         
        nPrevious.title = oSettings.oLanguage.oPaginate.sPrevious;
        nNext.title = oSettings.oLanguage.oPaginate.sNext;
         
        nPaging.appendChild( nPrevious );
        nPaging.appendChild( nNext );
         
        $(nPrevious).click( function() {
            /* Disallow paging event during a current paging event */
            if ( typeof oSettings.iPagingLoopStart != 'undefined' && oSettings.iPagingLoopStart != -1 )
            {
                return;
            }
             
            oSettings.iPagingLoopStart = oSettings._iDisplayStart;
            oSettings.iPagingEnd = oSettings._iDisplayStart - oSettings._iDisplayLength;
             
            /* Correct for underrun */
            if ( oSettings.iPagingEnd < 0 )
            {
              oSettings.iPagingEnd = 0;
            }
             
            var iTween = $.fn.dataTableExt.oPagination.iTweenTime;
            var innerLoop = function () {
                if ( oSettings.iPagingLoopStart > oSettings.iPagingEnd ) {
                    oSettings.iPagingLoopStart--;
                    oSettings._iDisplayStart = oSettings.iPagingLoopStart;
                    fnCallbackDraw( oSettings );
                    setTimeout( function() { innerLoop(); }, iTween );
                } else {
                    oSettings.iPagingLoopStart = -1;
                }
            };
            innerLoop();
        } );
         
        $(nNext).click( function() {
            /* Disallow paging event during a current paging event */
            if ( typeof oSettings.iPagingLoopStart != 'undefined' && oSettings.iPagingLoopStart != -1 )
            {
                return;
            }
             
            oSettings.iPagingLoopStart = oSettings._iDisplayStart;
             
            /* Make sure we are not over running the display array */
            if ( oSettings._iDisplayStart + oSettings._iDisplayLength < oSettings.fnRecordsDisplay() )
            {
                oSettings.iPagingEnd = oSettings._iDisplayStart + oSettings._iDisplayLength;
            }
             
            var iTween = $.fn.dataTableExt.oPagination.iTweenTime;
            var innerLoop = function () {
                if ( oSettings.iPagingLoopStart < oSettings.iPagingEnd ) {
                    oSettings.iPagingLoopStart++;
                    oSettings._iDisplayStart = oSettings.iPagingLoopStart;
                    fnCallbackDraw( oSettings );
                    setTimeout( function() { innerLoop(); }, iTween );
                } else {
                    oSettings.iPagingLoopStart = -1;
                }
            };
            innerLoop();
        } );
         
        /* Take the brutal approach to cancelling text selection */
        $(nPrevious).bind( 'selectstart', function () { return false; } );
        $(nNext).bind( 'selectstart', function () { return false; } );
    },
     
    "fnUpdate": function ( oSettings, fnCallbackDraw )
    {
        if ( !oSettings.aanFeatures.p )
        {
            return;
        }
         
        /* Loop over each instance of the pager */
        var an = oSettings.aanFeatures.p;
        for ( var i=0, iLen=an.length ; i<iLen ; i++ )
        {
            if ( an[i].childNodes.length !== 0 )
            {
                an[i].childNodes[0].className =
                    ( oSettings._iDisplayStart === 0 ) ?
                    oSettings.oClasses.sPagePrevDisabled : oSettings.oClasses.sPagePrevEnabled;
                 
                an[i].childNodes[1].className =
                    ( oSettings.fnDisplayEnd() == oSettings.fnRecordsDisplay() ) ?
                    oSettings.oClasses.sPageNextDisabled : oSettings.oClasses.sPageNextEnabled;
            }
        }
    }
}
 
$(document).ready(function() {
    $('#example').dataTable( {
        "sPaginationType": "scrolling"
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
			<th>Cadena</th>
			<th>Estado</th>
			<th>Tiendas</th>
			<th>Piso de Venta</th>
		</tr>
	</thead>	
	<tbody>
<?php
$query = "SELECT asociado_id, tipo_id, nombre_comercial, razon_social, numerodetiendas, m2pisodeventas FROM asociados ORDER BY razon_social";
$result = mysql_query($query);
while ( $lista =  mysql_fetch_row($result))
{
	$tienda_id = $lista[0];
	$razon_social = $lista[3];	
	$nombre_comercial = $lista[2];	
	$numerodetiendas_total = 0;
	$m2pisodeventas_total = 0;	
	$first = 1;
	
	$query2 = "SELECT estados.estado, tiendas_estados.tienda_estado_numero_tiendas, tiendas_estados.tienda_estado_piso_venta FROM tiendas_estados 
						LEFT OUTER JOIN estados ON tiendas_estados.estado_id = estados.estado_id
						WHERE tienda_id = $tienda_id";
	$result2 = mysql_query($query2);
	while ( $lista2 =  mysql_fetch_row($result2))
	{	
		$estado_id = $lista2[0];
		$numerodetiendas = $lista2[1];
		$m2pisodeventas	 = $lista2[2];
		
		$numerodetiendas_total += $numerodetiendas;
		$m2pisodeventas_total += $m2pisodeventas;
?>
		<tr class="odd gradeC">
			<td><?php if ($first == 1) echo $razon_social;  ?></td>		
			<td><?php if ($first == 1) echo $nombre_comercial; ?></td>		
			<td><?php echo $estado_id; ?></td>
			<td><?php echo number_format($numerodetiendas); ?></td>
			<td><?php echo number_format($m2pisodeventas, 2); ?></td>
		</tr>
<?php
	$first = 0;
}
?>
		<tr class="odd gradeA">
			<td><?php echo $razon_social; ?></td>		
			<td><?php echo $nombre_comercial; ?></td>		

			<td></td>
			<td><?php echo number_format($numerodetiendas_total); ?></td>
			<td><?php echo number_format($m2pisodeventas_total, 2); ?></td>
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