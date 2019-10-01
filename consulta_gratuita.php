<!DOOCTIPE html>
<html lang ="en">
	<head>
		<meta charset="UTF-8">
		<link rel="STYLESHEET" type="text/css" href="../estilos/estilos_consulta_gratuita.css">
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
			<div class="publicidad">
				<a href="#"><img src="../img/publicidad1.jpg"></a>
				<a href="#"><img src="../img/publicidad2.jpg"></a>
			</div>
				
			<div class="contenedorForm">
				<center><h3>Ingrese su consulta</h3></center>
				<form action="procesar_consulta.php" method='POST'>
					<input type="text" placeholder="escriba su nombre" name="nombre" class="form">
					<input type="text" placeholder="escriba su correo" name="correo" class="form">
					<textarea name="consulta" placeholder="escriba su consulta"></textarea>
					<input type="submit" class="boton">
				</form>
			</div>
		</div>
		
		
		<div class="footer">
				<img src="../img/gardez.jpg"class="img">
		</div>
	
	</body>
<html>