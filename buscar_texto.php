<?php
	$lineas=0;
	$id=$_GET['id'];
	//variables para coneccion con base de datos
	$user="root";
	$pass="Caraota.07";
	$server="localhost";
	$db="db-servicell";
	
	//coneccion a base de datos
	$con=mysqli_connect($server, $user, $pass, $db);
	
	//consulta= mostrar datos almacenados en la bace de datos
	$consulta="SELECT * FROM articulosdelbolog WHERE id='$id'";
	
	//cargar resultados de busqueda en variable
	$resultados=mysqli_query($con,$consulta);
	
	if($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
		//ecabezado de articulos
		echo "<h2>".$fila["titulo"]."</h2>";
		echo "<h3>".$fila["subtitulo"]."</h3>";
		echo "<img src='".$fila['imagen_dir']."'>";
		
		$archivo=fopen($fila['direccion'],"r") or die("no se encontro el archivo solicitado");
			echo "<p id='texto'>";
			while(!feof($archivo)){
				echo utf8_encode(fgets($archivo)."<br>");
			}
			echo "</p>";
		fclose($archivo);
		
	}

?>