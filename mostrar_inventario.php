<?php
		//variables para coneccion con base de datos
	$user="root";
	$pass="Caraota.07";
	$server="localhost";
	$db="db-servicell";
	
	//coneccion a base de datos
	$con=mysqli_connect($server, $user, $pass, $db);
	
	//consulta
	$consulta="SELECT * FROM inventario_tienda";
	
	$resultado=mysqli_query($con,$consulta);
	echo "
		<table class='tabla1'>
			<tr>
				<td>
					<h3>Nombre</h3>
				</td>
				<td>
					<h3>Fabricante</h3>
				</td>
				<td>
					<h3>Cantidad</h3>
				</td>
				<td>
					<h3>Presio</h3>
				</td>
				<td>
					<h3>Descripcion</h3>
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
					
					if(strlen($fila['nombre_producto'])>20){//si el nombre supera los diez caracteres se corta
						$recorte=substr($fila['nombre_producto'],0,20)."...";
						echo $recorte;
					}
					else{
						echo $fila['nombre_producto'];
					}
						
					echo "</h3>
				</td>
				<td>
					<h3>";
					
					if(strlen($fila['fabricante_producto'])>20){//si correo supera los diez caracteres se corta
						$recorte=substr($fila['fabricante_producto'],0,20)."...";
						echo $recorte;
					}
					else{
						echo $fila['fabricante_producto'];
					}
						
					echo "</h3>
				</td>
				
				<td>
					<h3>".$fila['cantidad_producto']."</h3>
				</td>
				<td>
					<h3>".$fila['presio_producto']."</h3>
				</td>
				<td>
					<h3>";
					
					if(strlen($fila['descripcion_producto'])>20){//si el nombre supera los diez caracteres se corta
						$recorte=substr($fila['descripcion_producto'],0,20)."...";
						echo $recorte;
					}
					else{
						echo $fila['descripcion_producto'];
					}
				
					echo"</h3>
				</td>
				<td>
					";?><h3 class='boton_mostrar_mensaje' onclick="ver('<?php echo $fila['id']?>')">ver</h3><?php echo"
				</td>
			</tr>
		";
		
	}

	echo "</table>";



?>