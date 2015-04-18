<?php
	$nombre = $_REQUEST['usuario'];
	$password = $_REQUEST['password'];
	

	$conexion = mysqli_connect("localhost", "sfi", "123") or die("PROBLEMAS AL CONECTAR CON EL SERVIDOR");

	mysqli_select_db($conexion,"sfi") or die("ERROR AL TRATAR DE CONECTAR A LA BASE DE DATOS");

//Inicio de variables de sesion

if(!isset($_SESSION)) {
	session_start();
}


	$empleado = mysqli_query($conexion, "SELECT * FROM empleados where usuario = '".$nombre. "' and password = '" .$password. "'");

	$row =mysqli_fetch_row($empleado);
	
	if(!$row[0]) {
	
	echo '<script language = javascript>
	alert("Usuario o Password errados.")
	self.location = "index.html"
	</script>';
	
	} else {
		//Definimos las variables de sesión y redirigimos a la página de usuario
		$_SESSION['id_usuario'] = $row[0];

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

		}
?>
