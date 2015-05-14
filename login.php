<?php

	$conexion = mysqli_connect("localhost", "sfi", "123") or die("PROBLEMAS AL CONECTAR CON EL SERVIDOR");

	mysqli_select_db($conexion,"sfi") or die("ERROR AL TRATAR DE CONECTAR A LA BASE DE DATOS");

//Inicio de variables de sesion

if(!isset($_SESSION)) {
	
}

	//necesito idempleado para pasar por sesion q hay datos validos
	$empleado = mysqli_query($conexion, "SELECT cargo,idempleado,usuario FROM empleados where usuario = '".$_POST['usuario']. "' and password = '" .$_POST['password']. "'");

	$row =mysqli_fetch_row($empleado);
	
	if(!$row[1]) {
	
	echo '<script language = javascript>
	alert("Usuario o Password Incorrectos.")
	self.location = "index.html"
	</script>';
	
	} else {
		//Definimos las variables de sesión y redirigimos a la página de usuario
		session_start();
		session_set_cookie_params(0,"/");
		$_SESSION["autentificado"]="SI";

		$_SESSION['id_usuario'] = $row[1];
		$_SESSION['empleado'] = $row[2];
		$_SESSION['cargo'] = $row[0];

		switch ($row[0]) {
		   case 'cajero':
				         //header("Location: cajero.html");
				         header("Location: cajero.php");
				         break;
		   case 'analista':
				         header("Location: analista.php");
				         break;
		   case 'gerente':
				         header("Location: gerente.php");
				         break;
						}

		}
?>
