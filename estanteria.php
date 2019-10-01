<?PHP
	//variables para coneccion con base de datos
	$user="root";
	$pass="Caraota.07";
	$server="localhost";
	$db="db-servicell";
	
	//coneccion a base de datos
	$con=mysqli_connect($server, $user, $pass, $db);
	
	//consulta= mostrar datos almacenados en la bace de datos
	$consulta="SELECT * FROM inventario_tienda";
	
	//cargar resultados de busqueda en variable
	$resultados=mysqli_query($con,$consulta);
	
	
	//bucle de de impresion de resultados
	while($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
		
		echo "<div class='unidad_de_inventario'>
				<div class='img'>
					<img src='".$fila['direccion_imagen']."'>
				</div>
				<div class='informacion'>
					<b><p>".$fila['nombre_producto']."</p></b>
					<p>".$fila['presio_producto']." bs c/u</p>
					<p>".$fila['fabricante_producto']." bs c/u</p>";?>
					<a style="cursor:hand" onclick="mostrar_detalles_ajax('<?php echo $fila['id']?>')">mas detalles</a>
				<?php 
				 echo "</div>
		
		
			</div>";
	}
	mysqli_close($con);


?>