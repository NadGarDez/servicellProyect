<!DOOCTIPE html>
<html lang ="en">
	<head>
		<meta charset="UTF-8">
		<link rel="STYLESHEET" type="text/css" href="../estilos/estilos-panel.css">
		<link rel ="shorcut icon" href="../img/fabicon1.jpg">
		<title>ServiCell</title>
	</head>
	<body id="cuerpo">
		
		<div class="encabezado">
			<a href="../index.php"><img src="../img/logo.jpg" class="logo"></a>
			<a href="#">
				<div class="salir">
					<h4 class="text">Cerrar secion</h4>
				</div>
			</a>
		</div>
		<div class="roll-over">
			<img src="../img/carrusel1.jpg">
		</div>
		<div class="central">
		
		<?php

				//inicio de secion
				session_start();
				
				if(isset($_SESSION['rol'])){
					if($_SESSION['rol']=="administrador"){
						echo "<div class='gestorblog'>
								<h2>Gestor del Blog</h2>
								<div class='opcionsubir'>
									<h3>Añadir una nueva entrada</h3>
									<form class='formulario' id='formulario_subir' action='subir_articulos.php' enctype='multipart/form-data' method='POST'>
										<input type='text' name='nombrearticulo' placeholder='nombre del articulo'class='text'>
										<input type='text' name='informacion' placeholder='autor' class='text'>
										<input type='text' name='descripcion' placeholder='descripcion' class='text'>
										<p>texto<input type='file' class='input' name='texto' accept='text' placeholder='texto'></p>
										<p>imagen<input type='file' name='imagen' accept='image/jpeg' class='input' placeholder='imagen'></p>
										<input type='submit' class='submit' value='enviar'>
									</form>
								</div>
								<div class='opcioneditar'>
									<h3>Editar una entrada</h3>
									<form class='formulario' id='formulario_subir' action='modificar_articulos_del_blog.php' enctype='multipart/form-data' method='POST'>
										";
										include "select_de_blogs.php";
										echo "
										<input type='text' name='nombrearticuloN' placeholder='nombre del articulo'class='text'>
										<input type='text' name='informacion' placeholder='autor' class='text'>
										<input type='text' name='descripcion' placeholder='descripcion' class='text'>
										<p>texto<input type='file' class='input' name='texto' accept='text' placeholder='texto'></p>
										<p>imagen<input type='file' name='imagen' accept='image/jpeg' class='input' placeholder='imagen'></p>
										<input type='submit' class='submit' value='editar'>
									</form>
								</div>	
								
								<div class='opcioneliminar'>
									<h3>Eliminar una entrada</h3>
									<form class='formulario' id='formulario_subir' action='eliminar_articulos_del_blog.php' enctype='multipart/form-data' method='POST'>
										";
										include "select_de_blogs.php";
										echo "<input type='submit' class='submit' value='eliminar'>
									</form>
								</div>	
							</div>
							
							<div class='gestormensajes' id='gestormensajes'>
								<h2 class='tit' id='tit_gestormensajes'>Gestor de Mensajes<h2>
								<div class='buzon' id='buzon'>
									";
									include "mostrar_mensajes.php";
									echo "
									
								</div>
									<div class='zona_respuesta' id='zona_respuesta'>
										<h3 class='tit'>Responder</h3>
										<a  class='enlace_cerrar' onclick='ocultar()'><h3>Atras</h3></a><br>
										<form action='enviarmail.php' method='POST'>
										<input type='text' placeholder='titulo de respuesta' name='titulo_respuesta'></input>
										<textarea placeholder='tu respuesta' name='respuesta'></textarea>
										<input type='hidden' id='formulariooculto' name='direccionenvio'></input>
										<input type='submit'></input>
										</form>
									</div>
							</div>
							
						
							<div class='gestortienda'>
								<h2 class='tit'>Gestor de Tienda</h2>
								<div class='opcionsubir'>
									<h3>Añadir un Producto a la Tienda</h3>
									<form class='formulario' id='formulario_subir' action='subir_a_tienda.php' enctype='multipart/form-data' method='POST'>
										<input type='text' name='nombreproducto' placeholder='nombre del producto'class='text'>
										<input type='text' name='marca' placeholder='marca' class='text'>
										<input type='text' name='cantidad' placeholder='cantidad' class='text'>
										<input type='text' name='presio' placeholder='presio' class='text'>
										<textarea name='descripcion' placeholder='descripcion' class='text'></textarea>
										<p>imagen1<input type='file' name='imagen1' accept='image/jpeg' class='input' placeholder='imagen'></p>
										<input type='submit' class='submit' value='enviar'>
									</form>
								</div>
								<div class='opcioneditar'>
									<h3>Editar un Producto de la Tienda</h3>
									<form class='formulario' id='formulario_subir' action='modificar_articulos_de_tienda.php' enctype='multipart/form-data' method='POST'>
										";
										include "select_de_tienda.php";
										echo "
										<input type='text' name='nombreproductoM' placeholder='nombre articulo nuevo' class='text'>
										<input type='text' name='marca' placeholder='marca' class='text'>
										<input type='text' name='cantidad' placeholder='cantidad' class='text'>
										<input type='text' name='presio' placeholder='presio' class='text'>
										<textarea name='descripcion' placeholder='descripcion' class='text'></textarea>
										<p>imagen1<input type='file' name='imagenM' accept='image/jpeg' class='input' placeholder='imagen'></p>
										<input type='submit' class='submit' value='editar'>
									</form>
								</div>	
								
								<div class='opcioneliminar'>
									<h3>Eliminar un Producto de la Tienda</h3>
									<form class='formulario' id='formulario_subir' action='eliminar_producto_tienda.php' enctype='multipart/form-data' method='POST'>
										";
										include "select_de_tienda.php";
										echo "<input type='submit' class='submit' value='eliminar'>
									</form>
								</div>	
								
								<div class='inventario'>
									<h3 class='tit' >Inventario</h3>";
									include "mostrar_inventario.php";
									
									echo "
									
								</div>
							</div>
							
							<div class='gestordepedido'>
								<h2>Gestor de Pedidos</h2>
								<div class='pedidosporprocesar'>
									<h3>Pedidos por procesar</h3>
								</div>
								<div class='pagosporprocesar'>
									<h3>Pagos por confirmar</h3>
								</div>
								<div class='pagosprocesados'>
									<h3>Pagos confirmados</h3>
								</div>
								<div class='listosparaenviar'>
									<h3>Listos para enviar</h3>
								</div>
								<div class='enviados'>
									<h3>Enviados</h3>
								</div>
							</div>
							
						";
					}
					if($_SESSION['rol']=="no_autorizado"){
						echo "no esta autorizado";
					}
				}
			
			?>
			
		</div>
		<script>
		
			function mostrar(a){
				var elemento2=document.getElementById("buzon");
				var elemento= document.getElementById("zona_respuesta");
				var elemento3= document.getElementById("formulariooculto");
				elemento3.value=a;
				
				elemento2.style.display="none";

				elemento.style.display="block";
			}
			
			function ocultar (){
				var elemento2=document.getElementById("buzon");
				elemento2.style.display="block";
				var elemento3= document.getElementById("tit_gestormensajes");
				elemento3.style.display="block";
				
				var elemento= document.getElementById("zona_respuesta");
				elemento.style.display="none";
				
			}
		</script>
		
		<div class="footer">
				<img src="../img/gardez.jpg"class="img">
		</div>
	</body>
<html>
