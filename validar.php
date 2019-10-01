<?php
	//iniciando secion;
	session_start();
	$_SESSION['usuario']="no identificado";
	$_SESSION['rol']="no_autorizado";

	//reciviendo variables del formulario
	$nombre=$_GET['nombre'];
	$pase=$_GET['pass'];
	
	//variables para coneccion con base de datos
	$user="root";
	$pass="Caraota.07";
	$server="localhost";
	$db="db-servicell";
	
	//coneccion a base de datos
	$con=mysqli_connect($server, $user, $pass, $db);
	
	//consulta= mostrar datos almacenados en la bace de datos
	$consulta="SELECT * FROM usuarios WHERE rol='administrador'";
	
	//cargar resultados de busqueda en variable
	$resultados=mysqli_query($con,$consulta);
	
	
	while($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
		
			if($nombre==$fila['nombre']){
				if($pase==$fila['pass']){
					$_SESSION['usuario']=$fila['nombre'];
					$_SESSION['rol']=$fila['rol'];
				}
			}
		header('Location: panel.php');
	}
	mysqli_close($con)
	
?>