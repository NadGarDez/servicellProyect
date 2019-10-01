<?php
	//variables para coneccion con base de datos
	$user="root";
	$pass="Caraota.07";
	$server="localhost";
	$db="db-servicell";
	
	
	//capturar variables
	
	$id=$_POST['id'];
	
	//coneccion a base de datos
	$con=mysqli_connect($server, $user, $pass, $db);
	
	//consulta= mostrar datos almacenados en la bace de datos
	$consulta="SELECT * FROM inventario_tienda WHERE id=$id";
	
	//cargar resultados de busqueda en variable
	$resultados=mysqli_query($con,$consulta);
	
	
	//bucle de de impresion de resultados
	$fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC);


	echo "<div class='img'>
						<img src=".$fila['direccion_imagen'].">
					</div>
					<div class='informacion'>
						<h3>".$fila['nombre_producto']."</h3>
						<p><b>Fabricante: </b>".$fila['fabricante_producto']."</p>
						<p><b>Exitencia: </b>".$fila['cantidad_producto']." unidades</p>
						<p><b>Presio: </b>".$fila['presio_producto']." c/u</p>
						<p><b>Descripcion: </b></p>
						<p class='descripcion'>".$fila['descripcion_producto']."</p>
						<form>
							<input type='hidden' id='id_producto' value='".$fila['id']."'></input>
							<b>Cantidad Requerida</b><input type='text' id='cant_producto'  placeholder='obligatorio'></input>
						</form>
						<h3 class='agg' style='cursor:hand' onclick=enviar()><a>Agregar a carrito</a><h3>
						<h3 class='agg' style='cursor:hand' onclick='ocultar_detalles()'><a>Volver</a><h3>
					</div>
	
	
	";
	
?>