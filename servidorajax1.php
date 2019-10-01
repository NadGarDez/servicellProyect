<?php
	session_start();
	if(!isset($_SESSION['carrito'])){
		$_SESSION['carrito']=array();
	}
	
	if(!isset($_SESSION['subtotal'])){
		$_SESSION['subtotal']=0;
	}
	
	if(!isset($_SESSION['envio'])){
		$_SESSION['envio']=true;
	}
	
	if(!isset($_SESSION['total'])){
		$_SESSION['total']=0;
	}
	
	if(!isset($_SESSION['impuesto'])){
		$_SESSION['impuesto']=0;
	}
	
	$envio=4000;
	
	if(isset($_POST['condicion'])){
		$condicion=$_POST['condicion'];
	}
	
	$id=$_POST['id'];
	$cant=$_POST['cant'];
	$accion=$_POST['accion'];
	$subtotal=0;
	
	//variables para coneccion con base de datos
	$user="root";
	$pass="Caraota.07";
	$server="localhost";
	$db="db-servicell";
	
	//coneccion a base de datos
	$con=mysqli_connect($server, $user, $pass, $db);
	
	//consulta
	
	
	
	class unidad_de_pedido {
		public $id;
		public $cant;
		public $resultados;
		public $fila;

		public function __construct($a,$b){
			$this->id= $a;
			$this->cant= $b;
			$this->consulta="SELECT * FROM inventario_tienda WHERE id=$this->id";
		}
		
		public function buscarimprimir_db($user,$pass,$server,$db,$con){
			$this->resultados=mysqli_query($con,$this->consulta);
			$this->fila=mysqli_fetch_array($this->resultados,MYSQLI_ASSOC);
			echo"
				<div class='unidad_de_pedido'>
									<div class='img'>
										<img src='".$this->fila['direccion_imagen']."'>
									</div>
									<div class='descripcion'>
										<p><b>Nombre :</b>".$this->fila['nombre_producto']."</p>
										<p><b>Presio </b>".$this->fila['presio_producto']."</p>
										<p><b>Cantidad </b>".$this->cant."</p>
										<p><b>$ grupo </b>:".$this->cant*$this->fila['presio_producto']."</P>
										<a href='#'>editar</a>
									</div>
				</div>
			";
			$this->resultados="";
			$this->fila="";
		}
		
		public function total($user,$pass,$server,$db,$con){
			$this->resultados=mysqli_query($con,$this->consulta);
			$this->fila=mysqli_fetch_array($this->resultados,MYSQLI_ASSOC);
			return $this->cant*$this->fila['presio_producto'];
			$this->resultados="";
			$this->fila="";
		}
		
	}
	if($accion=="insertar"){
		$unidad= new unidad_de_pedido($id,$cant);
		$_SESSION['carrito'][]=$unidad;
		mostrar($user,$pass,$server,$db,$con);
	}
	
	if($accion=="ver"){
		mostrar($user,$pass,$server,$db,$con);
	}
		
	if($accion=="subtotal"){
		calcular_total($user,$pass,$server,$db,$con,$subtotal);
	}
	
	if($accion=="impuestos"){
		impuestos();
	}
	
	if($accion=="envio"){
		calcular_envio($condicion,$envio);
	}
	
	if($accion=="total"){
		total($envio);
	}
	
	mysqli_close($con);
	
	function calcular_total ($user,$pass,$server,$db,$con,$subtotal){
		for($i=0;$i<count($_SESSION['carrito']);$i++){
			$subtotal+=$_SESSION['carrito'][$i]->total($user,$pass,$server,$db,$con);
		}
		$_SESSION['subtotal']=$subtotal;
		echo $subtotal;
	}
	
	function mostrar($user,$pass,$server,$db,$con){
		for($i=0;$i<count($_SESSION['carrito']);$i++){
			$_SESSION['carrito'][$i]->buscarimprimir_db($user,$pass,$server,$db,$con);
		}
	}
	
	function impuestos(){
		$impuesto=$_SESSION['subtotal']*18/100;
		$_SESSION['impuesto']=$impuesto;
		echo $impuesto;
	}
	
	function calcular_envio($condicion,$envio){
		if($condicion=="A domicilio"){
			$_SESSION['envio']=true;
			echo $envio;
		}
		if($condicion=="En la tienda fisica"){
			echo "0";
			$_SESSION['envio']=false;
		}
	}
	
	function total($envio){
		$total= $_SESSION['subtotal']+$_SESSION['impuesto'];
		if($_SESSION['envio']==true){
			$total=$total+$envio;
		}
		$_SESSION['total']=$total;
		echo $total;
	}
	
?>