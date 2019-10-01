<!DOOCTIPE html>
<html lang ="en">
	<head>
		<meta charset="UTF-8">
		<link rel="STYLESHEET" type="text/css" href="../estilos/estilos_lista_articulos.css">
		<link rel ="shorcut icon" href="../img/fabicon1.jpg">
		<title>ServiCell</title>
	</head>
	<body>
		<div class="encabezado">
			<a href="../index.php"><img src="../img/logo.jpg" class="logo"></a>
			<a href="ingresar.php">
				<div class="sobre-nosotros">
					<h3 class="text">Ingresar</h3>
				</div>
			</a>
		</div>
		<div class="roll-over">
			<img src="../img/carrusel1.jpg">
		</div>
		<div class="central">
				<div class="Ec">
					<h2>¿Como lo resuelvo?</h2>
				</div>
				<div class="publicidad">
					<a href="#"><img src="../img/publicidad1.jpg"></a>
					<a href="#"><img src="../img/publicidad2.jpg"></a>
				</div>
			
				<?php
					include "buscar_articulos_db.php";
				?>
		</div>
		
		
		<div class="footer">
				<img src="../img/gardez.jpg"class="img">
		</div>
	</body>
<html>