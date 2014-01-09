

<CENTER>
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
</table>
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
	