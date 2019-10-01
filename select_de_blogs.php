<?php
	//variables para coneccion con base de datos
	$user="root";
	$pass="Caraota.07";
	$server="localhost";
	$db="db-servicell";
	
	//coneccion a base de datos
	$con=mysqli_connect($server, $user, $pass, $db);
	
	//consulta= mostrar datos almacenados en la bace de datos
	$consulta="SELECT * FROM articulosdelbolog";
	
	//cargar resultados de busqueda en variable
	$resultados=mysqli_query($con,$consulta);
	echo "<select placeholder='seleccione un articulo' name='nombrearticulo'>";
	while($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
		echo"<option>";
		echo $fila['titulo'];
		echo "</option>";
	}
	echo "</select>";
	
	mysqli_close($con);
?>