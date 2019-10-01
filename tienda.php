
<!DOOCTIPE html>

<html lang ="en">
	<head>
		<meta charset="UTF-8">
		<link rel="STYLESHEET" type="text/css" href="../estilos/estilos_tienda.css">
		<link rel ="shorcut icon" href="../img/fabicon1.jpg">
		<title>ServiCell</title>
	</head>
	<body >
		<script>
		prueba();
		var activado= false;
			function selector_carrito(){
				
				var elemento= document.getElementById("carrito");
				var sombreado=document.getElementById("sombreado");
				var letras= document.getElementById("enlace_carrito");
				
				var a= document.getElementById("estanteria");
				
				var ancho_carrito=sombreado.offsetWidth;
				var y= a.offsetTop;
				var x= sombreado.offsetLeft;
				elemento.style.left=x;
				elemento.style.top=y;
				elemento.style.width=ancho_carrito;
				while(true){
					
					if(activado==false){
						elemento.style.display="block";
						sombreado.style.backgroundColor="white";
						letras.style.color="8BB434";
						activado=true;
						break;
					}
					
					if(activado==true){
						elemento.style.display="none";
						sombreado.style.backgroundColor="8BB434";
						letras.style.color="white";
						activado=false;
						break;
					}
					
				}
				
			}
			
			function enviar (){
				var id= document.getElementById("id_producto");
				var cant= document.getElementById("cant_producto");
				
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
							document.getElementById("productos_carrito").innerHTML+= this.responseText;
							document.getElementById("mas_detalles").style.display="none";
							alert("Se ha añadido un nuevo elemento al carrito");
							
						} else {
							// hubo algún problema con la petición,
							// por ejemplo código de respuesta 404 (Archivo no encontrado)
							// o 500 (Internal Server Error)
                        }
					} 

				}
				
				http_request.open("POST","servidorajax1.php", true);
				http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				http_request.send("id="+ id.value +"&cant=" + cant.value+"&accion=insertar");
				
				
				return false;

			}
			
			function mostrar_detalles_ajax(id){
				var elemento=document.getElementById("mas_detalles");
				elemento.style.display="block";
				
				
				//peticion ajax
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
							document.getElementById("mas_detalles").innerHTML= this.responseText;
						} else {
							// hubo algún problema con la petición,
							// por ejemplo código de respuesta 404 (Archivo no encontrado)
							// o 500 (Internal Server Error)
                        }
					} 

				}
				
				http_request.open("POST","servidorajax-mostrardetalles.php", true);
				http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				http_request.send("id="+id);
				
				
				
			}
			
			function ocultar_detalles(){
				var elemento=document.getElementById("mas_detalles");
				elemento.style.display="none";
			}
			
			
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
						
							document.getElementById("productos_carrito").innerHTML+= this.responseText;
							document.getElementById("mas_detalles").style.display="none";
							
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
				
				
				return false;
				
			}
			
		
		</script>
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
				<div class="contenedor_tienda">
				
					<div class="barra_de_erramientas">
						<h2 class="tit">Tienda</h2>
						<div class="sombreado" id="sombreado">
							<h2><a class="enlace_carrito" id="enlace_carrito" onclick="selector_carrito()" style="cursor:hand">Carrito</a></h2>
						</div>
					</div>
					<div class="carrito" id="carrito">
							<div class="productos_carrito" id="productos_carrito">
								
							</div>
							<div class="pagar">
								<a href="prueba.php"><h2>Pasar a caja</h2></a>
							</div>
					</div>
					<div class="estanteria" id="estanteria">
					
					
						<?php
						 include "estanteria.php";
						?>
						
						
					</div>
				</div>
				
				<div class="mas_detalles" id="mas_detalles">
					
				</div>
				<div class="publicidad">
					<a href="#"><img src="../img/publicidad1.jpg"></a>
					<a href="#"><img src="../img/publicidad2.jpg"></a>
				</div>
			
		</div>
		
		
		<div class="footer">
				<img src="../img/gardez.jpg"class="img">
		</div>
		
	</body>
<html>