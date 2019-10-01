<!DOOCTIPE html>
<html lang ="en">
	<head>
		<meta charset="UTF-8">
		<link rel="STYLESHEET" type="text/css" href="../estilos/estilos_prueba.css">
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
				<div class="contenedor">
					<div class="factura">
						<div class="lista_productos" id="lista_de_productos">
							<h3>Lista de productos</h3>
						</div>
						<div class="rectangulo">
							<b>Subtotal</b>
							<b class="valor" id="subtotal"></b>
						</div>
						<div class="rectangulo">
							<b>inpuestos</b>
							<b class="valor" id="impuestos"></b>
						</div>
						<div class="recepcion">
							<div class="rectangulo">
								<b>Modo de recepcion</b>
								<select id="recepcion">
									<option onclick="metodo_recepcion()">A domicilio</option>
									<option onclick="metodo_recepcion()">En la tienda fisica</option>
								</select>
								<b class="valor" id="envio"></b>
							</div>
							
							<div class="rectangulo">
								<b>Total por Cobrar</b>
								<b class="valor" id="total"></b>
							</div>
						</div>
					</div>
					<div class="datos_pago">
						<div class="contenedor_pago">
							<h3>Punto de venta virtual</h3>
							<form>
							
								<input type="hidden" id="monto"></input>
								<input type="hidden" id="descripcion"></input>
								<div class="seccion_hor">
									<b>Nombre en la targeta</b><input type="text" placeholder="Nombre"></input>
								</div>
								<div class="seccion_hor">
									<b>Cedula</b><input type="text" placeholder="cedula"></input>
								</div>
								<div class="seccion_hor">
									<b>Numero de Targeta</b><input type="text" placeholder="numero de targeta"></input>
								</div>
								<div class="seccion_hor">
									<b>Clave</b><input type="password" placeholder="clave"></input>
								</div>	
								<div class="seccion_hor">
									<b>Expiracion</b>
									<select>
										<option>mes</option>
										<option>Enero</option>
										<option>Febrero</option>
										<option>Marzo</option>
										<option>Abril</option>
										<option>Mayo</option>
										<option>Junio</option>
										<option>Julio</option>
										<option>Agosto</option>
										<option>Septiembre</option>
										<option>Octubre</option>
										<option>Noviembre</option>
										<option>diciembre</option>
									</select>
									<select>
										<option>año</option>
										<option>2019</option>
										<option>2020</option>
										<option>2021</option>
										<option>2022</option>
										<option>2023</option>
										<option>2024</option>
										<option>2025</option>
										<option>2026</option>
										<option>2027</option>
										<option>2028</option>
										<option>2029</option>
										<option>2030</option>
										<option>2031</option>
									</select>
								</div>
								<div class="seccion_hor">
									<b>CBG</b><input type="text" placeholder="cvg"></input>
								</div>
								<input type="hidden" id="ip"></input>
								
							</form>
							<div class="seccion_hor2">
									<h2><a href="#" class="pagarP">Pagar</a></h2>
							</div>
						</div>
					</div>
				</div>
				<div class="publicidad">
					<a href="#"><img src="../img/publicidad1.jpg"></a>
					<a href="#"><img src="../img/publicidad2.jpg"></a>
				</div>
		
			
		</div>
		
		
		
		<div class="footer">
				<img src="../img/gardez.jpg"class="img">
		</div>

		<script>
			prueba();
			
			function prueba(){
				//creando el objeto http request
				if (window.XMLHttpRequest) { // Si exite el objeto XMLHttpRequest//Mozilla, Safari, ...
					http_request = new XMLHttpRequest();
				} else if (window.ActiveXObject) {//Si existe el objeto ActiveXObject // IE
					http_request = new ActiveXObject("Microsoft.XMLHTTP");
				}
			
				http_request.onreadystatechange= function(){
					if (http_request.readyState == 4) {
					// todo va bien, respuesta recibida
						if (http_request.status == 200) {//el codigo 200 quiere decir “consulta sin fallas”
						
							document.getElementById("lista_de_productos").innerHTML+= this.responseText;
							subtotal();
							
						} else {
							// hubo algún problema con la petición,
							// por ejemplo código de respuesta 404 (Archivo no encontrado)
							// o 500 (Internal Server Error)
                        }
					} 

				}
				
				http_request.open("POST","servidorajax1.php", true);
				http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				http_request.send("id=e&cant=5&accion=ver");
				
				
			}
			
			function subtotal(){
				//creando el objeto http request
				if (window.XMLHttpRequest) { // Si exite el objeto XMLHttpRequest//Mozilla, Safari, ...
					http_request = new XMLHttpRequest();
				} else if (window.ActiveXObject) {//Si existe el objeto ActiveXObject // IE
					http_request = new ActiveXObject("Microsoft.XMLHTTP");
				}
			
				http_request.onreadystatechange= function(){
					if (http_request.readyState == 4) {
					// todo va bien, respuesta recibida
						if (http_request.status == 200) {//el codigo 200 quiere decir “consulta sin fallas”
						
							document.getElementById("subtotal").innerHTML= this.responseText+" bs";
							impuestos();
							
						} else {
							// hubo algún problema con la petición,
							// por ejemplo código de respuesta 404 (Archivo no encontrado)
							// o 500 (Internal Server Error)
                        }
					} 

				}
				
				http_request.open("POST","servidorajax1.php", true);
				http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				http_request.send("id=e&cant=5&accion=subtotal");
				
			}
			
			function impuestos(){
				//creando el objeto http request
				if (window.XMLHttpRequest) { // Si exite el objeto XMLHttpRequest//Mozilla, Safari, ...
					http_request = new XMLHttpRequest();
				} else if (window.ActiveXObject) {//Si existe el objeto ActiveXObject // IE
					http_request = new ActiveXObject("Microsoft.XMLHTTP");
				}
			
				http_request.onreadystatechange= function(){
					if (http_request.readyState == 4) {
					// todo va bien, respuesta recibida
						if (http_request.status == 200) {//el codigo 200 quiere decir “consulta sin fallas”
						
							document.getElementById("impuestos").innerHTML= this.responseText+" bs";
							metodo_recepcion();
							
						} else {
							// hubo algún problema con la petición,
							// por ejemplo código de respuesta 404 (Archivo no encontrado)
							// o 500 (Internal Server Error)
                        }
					} 

				}
				
				http_request.open("POST","servidorajax1.php", true);
				http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				http_request.send("id=e&cant=5&accion=impuestos");
			}
			
			
			function metodo_recepcion(){
				var elemento= document.getElementById("recepcion");
				alert("hola");
				//creando el objeto http request
				if (window.XMLHttpRequest) { // Si exite el objeto XMLHttpRequest//Mozilla, Safari, ...
					http_request = new XMLHttpRequest();
				} else if (window.ActiveXObject) {//Si existe el objeto ActiveXObject // IE
					http_request = new ActiveXObject("Microsoft.XMLHTTP");
				}
			
				http_request.onreadystatechange= function(){
					if (http_request.readyState == 4) {
					// todo va bien, respuesta recibida
						if (http_request.status == 200) {//el codigo 200 quiere decir “consulta sin fallas”
						
							document.getElementById("envio").innerHTML= this.responseText+" bs";
							total();
							
						} else {
							// hubo algún problema con la petición,
							// por ejemplo código de respuesta 404 (Archivo no encontrado)
							// o 500 (Internal Server Error)
                        }
					} 

				}
				
				http_request.open("POST","servidorajax1.php", true);
				http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				http_request.send("id=e&cant=5&accion=envio&condicion="+elemento.value);
			}
			
			function total(){
				//creando el objeto http request
				if (window.XMLHttpRequest) { // Si exite el objeto XMLHttpRequest//Mozilla, Safari, ...
					http_request = new XMLHttpRequest();
				} else if (window.ActiveXObject) {//Si existe el objeto ActiveXObject // IE
					http_request = new ActiveXObject("Microsoft.XMLHTTP");
				}
			
				http_request.onreadystatechange= function(){
					if (http_request.readyState == 4) {
					// todo va bien, respuesta recibida
						if (http_request.status == 200) {//el codigo 200 quiere decir “consulta sin fallas”
						
							document.getElementById("total").innerHTML= this.responseText+" bs";
							
						} else {
							// hubo algún problema con la petición,
							// por ejemplo código de respuesta 404 (Archivo no encontrado)
							// o 500 (Internal Server Error)
                        }
					} 

				}
				
				http_request.open("POST","servidorajax1.php", true);
				http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				http_request.send("id=e&cant=5&accion=total");
			}
		
		
		</script>
		
	</body>
</html>