<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
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

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="http://www.jeasyui.com/easyui/datagrid-detailview.js"></script>
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">

	<script type="text/javascript">

		$(function(){
			$('#dg').datagrid({
				view: detailview,
				detailFormatter:function(index,row){
					return '<div style="padding:2px"><table id="ddv-' + index + '"></table></div>';
				},
				onExpandRow: function(index,row){
					$('#ddv-'+index).datagrid({
						url:'reportes_estados_getdetail.php?estado_id='+row.estado_id,
						fitColumns:true,
						singleSelect:true,
						height:'auto',
						width:'auto',
						columns:[[
							{field:'asociado_nombrecomercial',title:'Cadena'},
							{field:'asociado_estado_numtiendas',title:'N Tiendas'},
							{field:'asociado_estado_m2pisoventas',title:'Piso de Venta'}
						]],
						onResize:function(){
							$('#dg').datagrid('fixDetailRowHeight',index);
						},
						onLoadSuccess:function(){
							setTimeout(function(){
								$('#dg').datagrid('fixDetailRowHeight',index);
							},0);
						}
					});
					$('#dg').datagrid('fixDetailRowHeight',index);
				}
			});
		});
	</script>
    <?php include "inc/jsAll.php"; ?>     
</head>
<body>
<?php include "header.php" ?>
<?php include "mainmenu.php" ?>

	<!-- Start Document
	================================================== -->
    
	<div class="fullscreen">
		<div class="container contenidoA">  		
	  		<div class="fullcontainer">     
				<div class="content_block" style="background-image: url(images/pleca03.png); height: 67px; width: 650px; border: 0px ">    
					<p class="title"><br>Reportes de asociados por estados</p>		
				</div>
				<div class="sixteen columns">
					<div class="titulomovil">    
					<titulos>Reportes de asociados por estados</titulos>		
					</div>
					<div class="sixteen columns">
						&nbsp;
					</div>				
				</div>					
			</div>        
            			
	  <div class="sixteen columns" style="height:510px">

	<table id="dg" style="height:500px"
			url="reportes_estados_getdata.php" 

			singleSelect="true" fitColumns="true">

		<thead>
			<tr>
				<th field="estado" width="40%">Estado</th>
			</tr>
		</thead>

	</table>

	  </div>
      
	
	</div><!-- container -->
	</div>
<!-- End Document
================================================== -->

<?php include "footer.php" ?>
</body>
</html>