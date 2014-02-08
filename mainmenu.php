<?php if(!isset($currentA)) $currentA='inicio'; ?>
<div class="fullscreen menuGloss">   
	<div class="nav-container">
	<nav id="main-nav">
		
		<ul>
			<li class="<?php if($currentA=='inicio') echo 'current'; ?>">
				<a href="index.php">Inicio</a>
			</li>
			<li <?php if($currentA=='asociados') echo 'class="current"'; ?>>
				<a href="asociados.php">Asociados</a>
				<?php /*?><ul>
					<div class="arrowUp"></div>
					<div class="arrowUpBack"></div>
							<li><a href="asociados.php?condition=0">Listado General</a></li>
                            <li><a href="asociados.php?condition=1">Tiendas Autoservicios</a></li>
                            <li><a href="asociados.php?condition=2">Tiendas Departamentales</a></li>
                            <li><a href="asociados.php?condition=3">Tiendas Especializadas</a></li>
						</ul><?php */?>
			</li>
			<li <?php if($currentA=='reportes') echo 'class="current"'; ?>>
				<a href="javascript: void(0)" class="hover">Reportes</a>
				<ul>
					<div class="arrowUp"></div>
					<div class="arrowUpBack"></div>
					<li><a href="reportes_zonas.php">Reportes por Zonas</a></li>
					<li><a href="reportes_estados.php">Reportes por Estados</a></li>
					<li><a href="reportes_tipos.php">Reportes por Tipos</a></li>
					<li><a href="descargas.php">Descargas</a></li>
					<?php /*?><li><a href="reportes_asociados.php">Reportes por Asociados</a></li><?php */?>					
				</ul>
			</li>
			<li <?php if($currentA=='mercancias') echo 'class="current"'; ?>>
				<a href="mercancias.php">Mercancias</a>
			</li>			
			<li <?php if($currentA=='tiendas') echo 'class="current"'; ?>>
				<a href="tiendas.php">Tiendas</a>
			</li>	
			<li <?php if($currentA=='antad') echo 'class="current"'; ?>>
				<a href="javascript: void(0)" class="hover">ANTAD</a>
				<ul>
					<div class="arrowUp"></div>
					<div class="arrowUpBack"></div>
					<li><a href="antad.php">La Asociación</a></li>
					<li><a href="consejo.php">Consejo Directivo</a></li>
					<li><a href="organigrama.php">Organigrama</a></li>
					<li><a href="comites.php">Comités</a></li>
					<li><a href="relaciones.php">Relaciones con Organizaciones</a></li>
				</ul>
			</li>
			<li <?php if($currentA=='noticias') echo 'class="current"'; ?>>
				<a href="javascript: void(0)" class="hover">Noticias</a>
				<ul>
					<div class="arrowUp"></div>
					<div class="arrowUpBack"></div>
					<li><a href="aperturas.php">Aperturas 2014</a></li>
					<li><a href="proyecciones.php">Proyecciones 2014</a></li>
					<li><a href="eventos.php">Eventos 2014</a></li>
					<li><a href="libros.php">Publicaciones</a></li>
				</ul>
			</li>			
			<li <?php if($currentA=='contacto') echo 'class="current"'; ?>>
				<a href="contacto.php" <?php /*style="padding:12px 43px;"*/?>>Contacto</a>
			</li>			
		</ul>

	</nav><?php /*?><!-- end #main-nav --><?php */?>
</div>
</div>
<script type="text/javascript">
$(function() {
	$('.hover').bind('tap', function(e) {
        e.preventDefault();
		$(this).toggleClass('hover_effect');
		//alert('touchstart'+this);
		return false;
    });
    /*$('.hover').bind('touchend', function(e) {
		
        //alert('touchend s');
		e.preventDefault();
		
    });*/
});
</script>