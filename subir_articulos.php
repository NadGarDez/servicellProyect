<?php
	
	//moviento los archivos a las carpetas
	$nombrearticulo=$_POST['nombrearticulo'];
	$informacion=$_POST['informacion'];
	$descripcion=$_POST['descripcion'];
	$nombreimagen=$_FILES['imagen']['name'];
	
	//direcciones
	$direccionarticulo="../articulos/blog/".$nombrearticulo.".txt";
	$direccionimagen="../articulos/blog/imagenes/".$nombreimagen.".jpg";
	move_uploaded_file($_FILES['texto']['tmp_name'],$direccionarticulo);
	move_uploaded_file($_FILES['imagen']['tmp_name'],$direccionimagen);
	
	//variables para coneccion con base de datos
	$user="root";
	$pass="Caraota.07";
	$server="localhost";
	$db="db-servicell";
	
	//coneccion a base de datos
	$con=mysqli_connect($server, $user, $pass, $db);	
	
	//sentencia sql
	$consulta="INSERT INTO articulosdelbolog (titulo,subtitulo,imagen_dir,descripcion,direccion) VALUES('$nombrearticulo','$informacion','$direccionimagen','$descripcion','$direccionarticulo')";
	
	$resultados=mysqli_query($con,$consulta);
	
	if($resultados==false){
		echo"error al añadir las direcciones a la base de datos";
	}
	
	else{
		echo"datos ingresados correctaente";
		echo"<a href='panel.php'>Volver</a>";
	}
	
	mysqli_close($con);
	
	
?>