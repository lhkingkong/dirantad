<?php
	//session_start();
	include('validar.php');
	include ('connect.php');
?>
<center>
<h2>	Login	</h2>
				
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

 
 
 <?php
 
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

	<br>
	</br>
<p><h3><a href="registro.php" accesskey="4" title="">Regístrate ahora </a></li></p></h3> 

</center>