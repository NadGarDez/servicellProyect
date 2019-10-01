<?php
	//variables de coneccion
	
	$user="root";
	$pass="Caraota.07";
	$server="localhost";
	$db="db-servicell";

	
	//coneccion a base de datos
	
	$con=mysqli_connect($server,$user,$pass,$db);
	
	//consulta
	$consulta="SELECT * FROM inventario_tienda;";
	
	$resultados=mysqli_query($con,$consulta);
	
	echo "<select id='select_de_tienda' class='text' name='nombreproducto'>";
	
	while($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
		echo"<option>";
		echo $fila['nombre_producto'];
		echo "</option>";
	}
	
	
	echo "</select>";

	mysqli_close($con);
?>