

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<title>Sistema Financiero-Gerente</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<div id="header"></div>
		<div id="body">
<div id="resultado">
<p><h4><a href="analista.html">Menu Principal</a></h4><br></p>
	<?php
	
	$dni = $_POST['dni'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$codana = $_POST['codana'];

	$conexion = mysqli_connect("localhost", "root") or die("PROBLEMAS AL CONECTAR CON EL SERVIDOR");

	mysqli_select_db($conexion,"sfi") or die("ERROR AL TRATAR DE CONECTAR A LA BASE DE DATOS");


	$qr1=mysqli_query($conexion, "INSERT INTO clientes VALUES ('','" .$dni. "','"  .$nombre. "','" .$apellidos. "','" .$telefono. "','" .$direccion. "','','','" .$codana. "')");
		
	
	
if($qr1) {
echo "Cliente Registrado Correctamente";
}	

else  {
	echo "No puede registrarse porque ya esta en nuestra Base de Datos.";
}

?>


</div>
</div>

</body>
</html>