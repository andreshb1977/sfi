

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<title>SFI</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<div id="header"></div>
		<div id="body">
<div id="menus"><br />
<input type="button" onclick="history.back()" name="volver atrás" value="volver atrás">
<!--<h2><a href="analista.html">Menu Principal</a></h2><br />-->
</div>
<div id="resultado"><br /><br />

	<?php
	session_start();
	//echo $_SESSION['empleado'];
	/*$dni = $_POST['dni'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$codana = $_POST['codana'];
	*/
	if( isset($_POST['dni']) && !empty($_POST['dni']) &&
		isset($_POST['nombre']) && !empty($_POST['nombre']) &&
	    isset($_POST['apellidos']) && !empty($_POST['apellidos']) &&
		isset($_POST['direccion']) && !empty($_POST['direccion']) &&
		isset($_POST['telefono']) && !empty($_POST['telefono'])  &&
		isset($_POST['codana']) && !empty($_POST['codana'])

	){

	$conexion = mysqli_connect("localhost", "sfi", "123") or die("PROBLEMAS AL CONECTAR CON EL SERVIDOR");

	mysqli_select_db($conexion,"sfi") or die("ERROR AL TRATAR DE CONECTAR A LA BASE DE DATOS");

//echo $_SESSION['empleado']; no uso sesion porque caduca 2 minutos y no hay tiempo para investigar cambio
	//$qr1=mysqli_query($conexion, "INSERT INTO clientes VALUES ('','" .$dni. "','"  .$nombre. "','" .$apellidos. "','" .$telefono. "','" .$direccion. "','','','" .$codana. "')");
	$qr1=mysqli_query($conexion, "INSERT INTO clientes VALUES ('','" .$_POST['dni']. "','"  .$_POST['nombre']. "','" .$_POST['apellidos']. "','" .$_POST['telefono']. "','" .$_POST['direccion']. "','','','" .$_POST['codana']. "')");
		if($qr1){echo "Cliente Registrado Correctamente";} else {echo "Cliente ya Existe en la Base de Datos";}
			
}	

else  {
	echo "Registre Todos los Datos.";
}

?>

</div>
</div>
</div>

</body>
</html>