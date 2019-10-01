<?php
	//variable contador
	$cont=0;
	
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
	
	//bucle de de impresion de resultados
	while($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
		$cont= $cont+1;
		echo "<article>";
		
		echo "<a href='articulo.php?id=".$fila['id']."'><h3>".$fila['titulo']."<h3>";
		echo "<img src='".$fila['imagen_dir']."'>";
		echo "<p>".$fila['descripcion']."<p>";
		echo "</article>";
	}
	if($cont%6==0){
		echo "<div class='indice'>
					<a href='lista_articulos.php?cont=".$cont."'><h3>Entradas mas antiguas>></h3></a>
				</div>";
	}
	
	mysqli_close($con);
?>