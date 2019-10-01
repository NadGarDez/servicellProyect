<!DOOCTIPE html>
<html lang ="en">
	<head>
		<meta charset="utf-8">
		<link rel="STYLESHEET" type="text/css" href="../estilos/estilos_articulo.css">
		<link rel ="shorcut icon" href="../img/fabicon1.jpg">
		<title>ServiCell</title>
		<script src="../javascript/jquery-3.3.1.min.js"></script>
		<script>
			$(document).ready(function(){
				
				var alto=$("#texto").css("height");//Alto del texto 
				var altoDiv=$(".central").css("height");//alto del contenedor
				var propiedadT=0;
				var propiedadD=0;
				var cambio;
				for(var i=0;i<3; i++){//bucle para extraer los numeros del string
					propiedadT=propiedadT+alto[i];
				}
				for(var i=0;i<4; i++){//bucle para extraer los numeros del string
					propiedadD=propiedadD+altoDiv[i];
				}
				
				propiedadD=parseInt(propiedadD);//transformar los numeros de tipo string a tipo integer
				propiedadT=parseInt(propiedadT);//transformar los numeros de tipo string a tipo integer
				cambio=parseInt(propiedadD);//asignar los numeros de la propiedad a la variable que llevara el valor css
				
				if(propiedadD<propiedadT){//condicional de tamaño, si el texto es mas grande que el div, se tomara el valor del texto, se le sumara 30 se concatena "px" y luego se asigna una nueva propiedad css
					cambio=cambio+30;
					cambio=cambio+"px";
					$(".central").css("height",cambio);
				}
				
				//ei esto no sucede el tamaño del div es suficiente para contener el texto.
			});
		</script>
	</head>
	<body>
		<div class="encabezado">
			<a href="../index.php"><img src="../img/logo.jpg" class="logo"></a>
			<a href="ingresar.php">
				<div class="sobre-nosotros">
					<h3 class="text">Ingresa</h3>
				</div>
			</a>
		</div>
		<div class="roll-over">
			<img src="../img/carrusel1.jpg">
		</div>
		<div class="central">
				
				<article class="articulo">
					<?php
						include "buscar_texto.php";
					?>
					
					<footer>
						
						<a href="http://www.facebook.com/sharer.php?u=http://www.desarrolloweb.com/manuales"><img src="../img/logo de facebook.png"></a>
						
						<a href="http://twitter.com/home?status=http://www.midominio.com"><img src="../img/logo de twiter.png"></a>
					</footer>
				</article>
					
				<div class="publicidad">
					<a href="#"><img src="../img/publicidad1.jpg"></a>
					<a href="#"><img src="../img/publicidad2.jpg"></a>
					<a href="#"><img src="../img/publicidad3.jpg"></a>
					<a href="#"><img src="../img/publicidad4.jpg"></a>
				</div>
				
				<div class="indice">
					<a href="lista_articulos.php"><h3>Indice de articulos</h3></a>
				</div>
		</div>
		
		
		<div class="footer">
				<img src="../img/gardez.jpg"class="img">
		</div>
	</body>
<html>