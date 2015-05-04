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

$qr1="SELECT c.*, codpre, canpre FROM clientes c, prestamos p where aprana='1' and aprger='1' and c.dni=p.dni order by c.dni";	

$res1=mysqli_query($con,$qr1);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SFI Analista</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<script type="text/javascript" src="js/libs/jquery.js"></script>
<script type="text/javascript" src="js/funcionesmenu.js"></script>
</head>
<body>
		
	<h1>Clientes Aprobados por Gerencia: </h1><br/>
	<form >
	<table border='1' cellpadding='1' cellspacing='1'>
	<tr><th colspan='10'>Listado de Clientes</th></tr>
	<tr><th>DNI</th><th>Nombre</th><th>Apellidos</th><th>Telefono</th><th>Direccion</th><th>AproG</th><th>AproA</th><th>CodAna</th><th>CodPre</th><th>CanPre</th></tr>
	<!--Introducimos Datos-->
	<?php
	while($fila1=mysqli_fetch_array($res1)){
	?>
	<tr>
		<td><?php echo $fila1[1]?></td>
		<td><?php echo $fila1[2]?></td>
		<td><?php echo $fila1[3]?></td>
		<td><?php echo $fila1[4]?></td>
		<td><?php echo $fila1[5]?></td>
		<td><?php echo $fila1[6]?></td>
		<td><?php echo $fila1[7]?></td>
		<td><?php echo $fila1[8	]?></td>
		<td><?php echo $fila1[9]?></td>
		<td><?php echo $fila1[10]?></td>
	</tr>
	<?php
	}
	mysqli_free_result($res1); //liberar espacio
	mysqli_close($con); //cierro la conexion
	?>
	</table>
	</form>
		
</body>
</html>
