<?php
	//NOMBRE DEL ARTICULO A ELIMINAR
	$nombrearticulo= $_POST['nombrearticulo'];

	//variables para coneccion con base de datos
	$user="root";
	$pass="Caraota.07";
	$server="localhost";
	$db="db-servicell";
	
	//coneccion a base de datos
	$con=mysqli_connect($server, $user, $pass, $db);
	
	//consulta1
	$consulta1="SELECT * FROM articulosdelbolog WHERE titulo='$nombrearticulo'";
	
	//resultados1
	$resultados1=mysqli_query($con,$consulta1);
	
	$fila1=mysqli_fetch_array($resultados1, MYSQLI_ASSOC);
	$imageneliminar= $fila1['imagen_dir'];
	$direccioneliminar= $fila1['direccion'];
	
	if(file_exists($imageneliminar)){
		if(unlink($imageneliminar)){
		}
	}
	
	if(file_exists($imageneliminar)){
		if(unlink($direccioneliminar)){
		}
	}
	
	//segunda consulta a la base de datos
	
	$consulta2="DELETE  FROM articulosdelbolog WHERE titulo='$nombrearticulo'";
	$resultados2=mysqli_query($con,$consulta2);
	
	if($resultados2==false){
		echo "Hubo un problema al eliminar los datos.Intentelo de nuevo o llame a su programador de confianza<br>";
		echo "<a href='panel.php'>volver</a>";
		
	}
	else{
		echo "los datos se han eliminado correctamente<br>";
		echo "<a href='panel.php'>volver</a>";
	}
	
	mysqli_close($con);
	
?>