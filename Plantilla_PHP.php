<?php

$con = mysqli_connect("localhost", "sfi", "123");
$conb = mysqli_select_db($con,"sfi");
if(!$con) {
die("PROBLEMAS AL CONECTAR CON EL SERVIDOR");	
}  

if(!$conb) {
die("ERROR AL TRATAR DE CONECTAR A LA BASE DE DATOS");
}

//Iniciar Sesión
session_start();	
	$dni = $_POST['dni'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$codana = $_POST['codana'];



	$qr1="SELECT c.*, codpre, canpre FROM clientes c, prestamos p where aprana='1' and aprger='1' and c.dni=p.dni order by c.dni";	

$res1=mysqli_query($con,$qr1);
		
	
	
if($res1) {
echo '<script language = javascript>
		alert("Se actualizo los Datos.")
		self.location = "analista.html"
	 </script>';
}	

else  {
	echo '<script language = javascript>
		alert("No se actualizo los Datos.")
		self.location = "analista.html"
	 </script>';
}

?>

