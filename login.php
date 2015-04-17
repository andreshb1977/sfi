<?php
	$nombre = $_REQUEST['usuario'];
	$password = $_REQUEST['password'];
	

	$conexion = mysqli_connect("localhost", "sfi", "123") or die("PROBLEMAS AL CONECTAR CON EL SERVIDOR");

	mysqli_select_db($conexion,"sfi") or die("ERROR AL TRATAR DE CONECTAR A LA BASE DE DATOS");
	
	$empleado = mysqli_query($conexion, "SELECT * FROM empleados where usuario = '".$nombre. "' and password = '" .$password. "'");

if($row =mysqli_fetch_row($empleado)) {
	
	switch ($row[3]) {
	   case 'cajero':
			         header("Location: cajero.html");
			         break;
	   case 'analista':
			         header("Location: analista.html");
			         break;
	   case 'gerente':
			         header("Location: gerente.html");
			         break;
}

//prueba
} else echo "usuario o clave incorrecto";
?>
