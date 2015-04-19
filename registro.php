<?php
	
	$dni = $_REQUEST['dni'];
	$nombre = $_REQUEST['nombre'];
	$apellidos = $_REQUEST['apellidos'];
	$telefono = $_REQUEST['telefono'];
	$direccion = $_REQUEST['direccion'];
	$codana = $_REQUEST['codana'];

	$conexion = mysqli_connect("localhost", "root") or die("PROBLEMAS AL CONECTAR CON EL SERVIDOR");

	mysqli_select_db($conexion,"sfi") or die("ERROR AL TRATAR DE CONECTAR A LA BASE DE DATOS");


	$qr1=mysqli_query($conexion, "INSERT INTO clientes VALUES 
		('" .$dni. "', '"  .$nombre. "', '"  .$apellidos. "', '"  .$telefono. "',
		 '"  .$direccion. "','','', '"  .$codana. "')");
		
	
	
if($qr1) {
echo "Cliente Registrado Correctamente";
}	

else  {
	echo "No puede registrarse porque ya esta en nuestra Base de Datos.";
}

?>	

<h4><a href="analista.html">Menu Principal</a></h4>