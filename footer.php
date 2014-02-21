<!-- START FOOTER -->

<footer class="clearfix">
  <div class="fullfooter">
    <div class="footer">

        

    </div>
  </div>
  <div class="fullfooter">
    <div class="footer"> <a href="index.php"><img alt="ANTAD" class="scale-with-grid" src="images/olas/ola<?php echo rand(1,9); ?>.png" /></a> </div>
  </div>
</footer>
<div class="fullscreen fullfooter">
  <?php
  if(isset($db))
  	mysql_close($db);
/*        
		<div class="container clearfix">

    		<div class="eleven columns">
    			<ul class="bxslider">
					<li><a href="http://www.ipsight.net"><img src="images/logos/aon.png"/></a></li>
					<li><a href="http://www.ipsight.net"><img src="images/logos/nielsen.png" /></a></li>
					<li><a href="http://www.ipsight.net"><img src="images/logos/corona.png" /></a></li>
				</ul>
         	</div>
		</div>
*/
?>
  <div class="container clearfix" style="font-size: 10px; line-height: 15px; margin-bottom: 0px; background-color:#40545B">
    <div class="eleven columns floatLeft paddingLeft" style="color:white" > Todos los derechos reservados ® 2012 Asociación Nacional de Tiendas de Autoservicio y Departamentales, A. C.<br />
      Horacio 1855, 6° piso, Col. Chapultepec Morales<br />
      C.P. 11570. México D.F.<br />
      Tel: (55) &nbsp; 5580 &nbsp; 9900<br />
      Fax: (55) &nbsp; 5395 &nbsp; 2611.<br />
      <div class="url">
      <a href="http://www.antad.net" style="color:#CCF !important;">www.antad.net</a><br />
      </div>
    </div>
    <div class="four columns floatRight paddingRight" style="text-align:right"> <img src="images/logo_antad_foot_30_anos.png"/> </div>
     <div class="sixteen columns clearfix" style="color:white" >  
 	  <p>
	  <div class="url" style="text-align:center;">Desarrollado por IPSight Solutions S.A. De C.V.
      <a href="http://www.ipsight.net" style="color:#CCF !important;">www.ipsight.net</a><br />
      </div>
	  </p> 
  </div>
  </div>
	  
</div>
<div class="loading"></div>
<?php
/* 
  <script type="text/javascript">
    $(document).ready(function(){
$('.bxslider').bxSlider({
  infiniteLoop: true,
  hideControlOnEnd: false,
  auto: true,	
  minSlides: 4,
  maxSlides: 4,
  slideMargin: 20
});
});
  </script> 
*/
?>
</div>
<!-- END FOOTER --> 
