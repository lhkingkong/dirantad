<? 
	$arreglo=$_SESSION['categoria']; 
?>

<CENTER>
	<form id="formulario" name="formulario" method="POST" action="inc/insertarRegistro.php">
	          
	
<table align="center" width="400" border="0">
<tr>
<td colspan="2" align="center">
</td>
</tr>
<tr>
<td>Nombre Completo:</td>
<td><label><input type="nombre" name="nombre" id="Nombre" /></label></td>
</tr>
<tr>
<td>Apellido Completo:</td>
<td><label><input type="apellido" name="apellido" id="apellido" /></label></td>
</tr>

<td>Empresa:</td>
<td><label><input type="empresa" name="empresa" id="empresa" /></label></td>
</tr>

<td>Dirreción:</td>
<td><label><input type="dirrecion" name="dirrecion" id="dirrecion" /></label></td>
</tr>

<td>Colonia:</td>
<td><label><input type="colonia" name="colonia" id="colonia" /></label></td>
</tr>

<td>C.P:</td>
<td><label><input type="cp" name="cp" id="cp" /></label></td>
</tr>


 <td>Ciudad:</td>
<td><label><input type="cuidad" name="cuidad" id="cuidad" /></label></td>
</tr>


<td>Estado:</td>
<td>
<?include ('inc/connect.php');?>

<SELECT NAME="estado_id">
<?
$query="SELECT estado_id  FROM estados";
while ($row=mysql_fetch_array(mysql_query($query,$link))){
echo '<OPTION VALUE="'.$row['estado_id'].'">';
}

?>
</SELECT>


</td>
</tr>



<tr>
<td>Telefono:</td>
<td><label><input type="telefono" name="telefono" id="telefono" /></label></td>
</tr>

<tr>
<td>E-mail:</td>
<td><label><input type="email" name="email" id="email" /></label></td>


</tr>


<tr>

<td>Usuario:</td>
<td><label><input type="username" name="username" id="username" /></label></td>
</tr>
<tr>

<td>Contraseña:</td>
<td><label><input type="password" name="password1" id="password1" /></label></td>
</tr>
<tr>


<td>Cofirma Contraseña:</td>
<td><label><input type="password" name="password2" id="password2" /></label></td>
<?
if ($password1===$password2($password)) 
{
  echo $password2  . ' no es una dirección válida de correo.';
} 		
?>


<?php
         $password1=$_POST['password1']; 
         $password2=$_POST['password2'];	  

   //  if($nombre!="" && $appa!="" && $apma!="" && $edad!="" && $sexo!="")

{	
//echo "te falta batos ";
}

			
?>

</tr>
<tr>


    
<td><label>
<input type="submit" name="btnEntrar" id="btnEntrar" value="Entrar" />
</label></td>
</tr>
</tr>
</table>
</form>


	<a href="login.php">Ya tengo una cuenta</a><br/>
</CENTER>


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