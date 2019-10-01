<?php
	//variables para coneccion con base de datos
	$user="root";
	$pass="Caraota.07";
	$server="localhost";
	$db="db-servicell";
	
	//coneccion a base de datos
	$con=mysqli_connect($server, $user, $pass, $db);
	
	//consulta
	$consulta="SELECT * FROM consultasp";
	
	$resultado=mysqli_query($con,$consulta);
	echo "
		<table class='tabla1'>
			<tr>
				<td>
					<h3>Nombre</h3>
				</td>
				<td>
					<h3>Correo</h3>
				</td>
				<td>
					<h3>Consulta</h3>
				</td>
				<td>
					<h3>Tipo</h3>
				</td>
				<td>
					<h3>Estatus</h3>
				</td>
				<td>
					<h3>Fecha</h3>
				</td>
				<td>
					<h3>Accion</h3>
				</td>
			</tr>
		</table>
		<table class='tabla2'>
	";
	
	while($fila=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
		echo "
			<tr>
				<td>
					<h3>";
					
					if(strlen($fila['nombre'])>10){//si el nombre supera los diez caracteres se corta
						$recorte=substr($fila['nombre'],0,10)."...";
						echo $recorte;
					}
					else{
						echo $fila['nombre'];
					}
						
					echo "</h3>
				</td>
				<td>
					<h3>";
					
					if(strlen($fila['correo'])>10){//si correo supera los diez caracteres se corta
						$recorte=substr($fila['correo'],0,10)."...";
						echo $recorte;
					}
					else{
						echo $fila['correo'];
					}
						
					echo "</h3>
				</td>
				<td>
					<h3>";
					
					//si los caracteres de la consulta superan los 10 caracteres, se cortan
					if(strlen($fila['consulta'])>10){
						$recorte=substr($fila['consulta'],0,10)."...";
						echo $recorte;
					}
					else{
						echo $fila['consulta'];
					}
					
					
					echo "</h3>
				</td>
				<td>
					<h3>".$fila['tipo']."</h3>
				</td>
				<td>
					<h3>".$fila['estatus']."</h3>
				</td>
				<td>
					<h3>".$fila['fecha']."</h3>
				</td>
				<td>
					";?><h3 class='boton_mostrar_mensaje' onclick="mostrar('<?php echo $fila['correo']?>')">responder</h3><?php echo"
				</td>
			</tr>
		";
		
	}
	
	echo "</table>";
	
	mysqli_close($con);

?>