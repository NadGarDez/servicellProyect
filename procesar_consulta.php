<?php

	//datos de la consulta
	$nombre= $_POST['nombre'];
	$correo= $_POST['correo'];
	$contenido_consulta= $_POST['consulta'];
	$fecha=date("d/m/y");
	
	if(isset($_GET['paypal'])){
		$tipoconsulta="de pago";
	}
	else{
		$tipoconsulta="gratuita";
	}
	
	//variables de coneccion;
	$user="root";
	$pass="Caraota.07";
	$server="localhost";
	$db="db-servicell";

	$con= mysqli_connect($server,$user,$pass,$db);
	$consulta="INSERT INTO consultasp (nombre,correo,consulta,tipo,estatus,estatusPago,fecha) VALUE ('$nombre','$correo','$contenido_consulta','$tipoconsulta','por procesar','no aplica','$fecha')";
	$resultados=mysqli_query($con,$consulta);
	
	if($resultados=false){
		echo "Hubo problemas al introducir su mensaje"."<br>"."<a href='opcion_consulta.php'>Volver</a>";
	}
	else{
		echo "Su mensaje ha sido enviado exitosamente"."<br>"."<a href='opcion_consulta.php'>Volver</a>";
	}
?>