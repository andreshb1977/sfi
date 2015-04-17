<html>
<body>
<h2>Datos del Cliente: </h2><br/>
<form>
<table border='1' cellpadding='1' cellspacing='1'>
 		<tr><th colspan='8'>Listado de Clientes</th></tr>
 		<tr><th>DNI</th><th>Nombre</th><th>Apellidos</th><th>Telefono</th><th>Direccion</th><th>AproG</th><th>AproA</th><th>CodAna</th></tr>



<?php
	$bdni = $_REQUEST['bdni'];
	$con = mysqli_connect("localhost", "root");
	$conb = mysqli_select_db($con,"sfi");
	if(!$con) {
	die("PROBLEMAS AL CONECTAR CON EL SERVIDOR");	
	}  

	if(!$conb) {
	die("ERROR AL TRATAR DE CONECTAR A LA BASE DE DATOS");
	}

	$qr= "SELECT * FROM clientes where dni=" .$bdni ;
	$res=mysqli_query($con,$qr);
	

//muestro los datos
while($fila=mysqli_fetch_array($res,MYSQL_ASSOC)){
?>
<tr>
	<td><?php echo $fila['dni']?></td>
	<td><?php echo $fila['nombre']?></td>
	<td><?php echo $fila['apellidos']?></td>
	<td><?php echo $fila['telefono']?></td>
	<td><?php echo $fila['direccion']?></td>
	<td><?php echo $fila['aprger']?></td>
	<td><?php echo $fila['aprana']?></td>
	<td><?php echo $fila['codana']?></td>
</tr>
<?php
}

mysqli_free_result($res); //liberar espacio
mysqli_close($con); //cierro la conexion
?>
</table>
<br /><br/>
</form>
<!-- formulario para grabar prestamo-->
<h2>Generar Prestamo: </h2><br/>
<form id="forms" action="genera.php" method="POST" enctype="multipart/form-data">

Codigo de Prestamo: <input type="text" name="codpre" /> <br /><br />
Cantidad de Prestamo: <input type="text" name="canpre" /> <br /><br />
Codigo de Cliente: <input type="text" name="codcli" /> <br /> <br />
Numero de Prestamo: <input type="text" name="numpre" /> <br /> <br />

<input type="submit" value="Grabar" name="grabar" />
</form>


<!-- formulario para simular prestamo-->
<h2>Simulacion de prestamo: </h2><br/>
<form id="forms" action="simulacion.php" method="POST" enctype="multipart/form-data">

Capital: <input type="text" name="capital" /> <br /><br />
Interes Anual: <input type="text" name="interes" /> <br /><br />
Plazo en meses: <input type="text" name="plazo" /> <br /> <br />

<input type="submit" value="simular" name="simular" />
</form>

<p><a href='./gerente.html'>Volver al Menu</a></p>
</body>

</html>

<!--
mysqli_query($conexion, "INSERT INTO clientes VALUES ('', '"  .$nombre. "', '"  .$apellidos. "', '"  .$telefono. "', '"  .$direccion. "', '"  .$prestamo. "')");

$bapellidos = $_REQUEST['bapellidos'];

or apellidos='".$bapellidos. "'"
		

if($row =mysqli_fetch_array($registro)) {
echo "datos ingresados correctamente";
}	

else  {
	echo "error al ingresar datos";
}
-->


