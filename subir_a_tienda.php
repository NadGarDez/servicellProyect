<?php
	
	//variables extraidas del formulario
	$nombre_producto=$_POST['nombreproducto'];
	$marca=$_POST['marca'];
	$cantidad=$_POST['cantidad'];
	$descripcion=$_POST['descripcion'];
	$presio=$_POST['presio'];
	$nombreimagen=$_FILES['imagen1']['name'];
	
	//direcciones y cambio de direcciones
	
	$direccionimagen="../articulos/tienda/imagenes/".$nombreimagen.".jpg";
	move_uploaded_file($_FILES['imagen1']['tmp_name'],$direccionimagen);

	//coneccion a base de datos
	
	$user="root";
	$pass="Caraota.07";
	$server="localhost";
	$db="db-servicell";
	
	//coneccion
	
	$con=mysqli_connect($server,$user,$pass,$db);
	
	$consulta="INSERT INTO inventario_tienda (nombre_producto,fabricante_producto,cantidad_producto,presio_producto,descripcion_producto,direccion_imagen) VALUES ('$nombre_producto','$marca',$cantidad,$presio,'$descripcion','$direccionimagen');";
	
	$resultados=mysqli_query($con,$consulta);
	
	if($resultados==false){
		echo"error al añadir las direcciones a la base de datos"."<br>"."<a href='panel.php'></a>";
	}
	
	else{
		echo"datos ingresados correctaente"."<br>";
		echo"<a href='panel.php'>Volver</a>";
	}
	
	mysqli_close($con);

?>