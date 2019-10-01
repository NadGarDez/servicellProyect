<?php
	//nombre del producto a modificar
	$nombreproducto=$_POST['nombreproducto'];
	
	
	//variables para modificar articulo
	
	$nombreproductoM=$_POST['nombreproductoM'];
	$marcaM=$_POST['marca'];
	$cantidadM=$_POST['cantidad'];
	$descripcionM=$_POST['descripcion'];
	$presioM=$_POST['presio'];
	$nombreimagenM=$_FILES['imagenM']['name'];

	//direcciones y cambio de direcciones
	
	$direccionimagenM="../articulos/tienda/imagenes/".$nombreimagenM.".jpg";
	move_uploaded_file($_FILES['imagenM']['tmp_name'],$direccionimagenM);
	
	//variables para coneccion con base de datos
	$user="root";
	$pass="Caraota.07";
	$server="localhost";
	$db="db-servicell";
	
	//coneccion a base de datos
	$con=mysqli_connect($server, $user, $pass, $db);
	
	//consulta1
	$consulta1="SELECT * FROM inventario_tienda WHERE nombre_producto='$nombreproducto'";
	
	//resultados1
	$resultados1=mysqli_query($con,$consulta1);
	
	//direccion de imagen a eliminar
	$fila1=mysqli_fetch_array($resultados1, MYSQLI_ASSOC);
	$imageneliminar= $fila1['direccion_imagen'];
	
	//eliminar imagen
	if(file_exists($imageneliminar)){
		if(unlink($imageneliminar)){
		}
		else{
		}
	}

	//mover imagen a carpeta de imagenes
	
	$direccionimagen="../articulos/tienda/imagenes/".$nombreimagenM.".jpg";
	move_uploaded_file($_FILES['imagenM']['tmp_name'],$direccionimagen);

	//segunda consulta a la base de datos
	
	$consulta2="UPDATE inventario_tienda SET nombre_producto='$nombreproductoM', fabricante_producto='$marcaM',cantidad_producto=$cantidadM, presio_producto=$presioM,descripcion_producto='$descripcionM', direccion_imagen='$direccionimagenM' WHERE nombre_producto='$nombreproducto';";
	$resultados2=mysqli_query($con,$consulta2);
	
	if($resultados2==false){
		echo "Hubo un problema al editar los datos.Intentelo de nuevo o llame a su programador de confianza<br>";
		echo "<a href='panel.php'>volver</a>";
		
	}
	else{
		echo "los datos se han modificado correctamente<br>";
		echo "<a href='panel.php'>volver</a>";
	}
	
	mysqli_close($con);



?>