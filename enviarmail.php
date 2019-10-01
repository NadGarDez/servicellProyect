<?php 

	$titulo=$_POST['titulo_respuesta'];
	$contenido= $_POST['respuesta'];
	$direccion_correo= $_POST['direccionenvio'];
	$asunto="respuesta a su pregunta hecha en el sitio web: servicel.com.ve";
	if((mail($direccion_correo, $asunto ,$contenido))==true){
		echo "correo enviado"."<br>"."<a href='panel.php'";
	}
	else{
		echo "correo no enviado"."<br>"."<a href='panel.php'";
	}

?>