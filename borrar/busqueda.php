<html>
<body>

<h2>Datos del Cliente: </h2><br/>
<h4><a href="analista.html">Menu Principal</a></h4>

<form>
<table border='1' cellpadding='1' cellspacing='1'>
 		<tr><th colspan='10'>Listado de Clientes</th></tr>
 		<tr><th>DNI</th><th>Nombre</th><th>Apellidos</th><th>Telefono</th><th>Direccion</th><th>AproG</th><th>AproA</th><th>CodAna</th><th>CodPre</th><th>CanPre</th></tr>



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

//Iniciar Sesión
session_start();

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION['id_usuario']){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.html"
</script>';
}

	//tengo q hacer dos consultas separadas pq sino no mostrara clientes sin prestamo
	//$qr= "SELECT * FROM clientes where dni=" .$bdni ;
	$qr1= "SELECT * FROM clientes  where dni='".$bdni. "'";
	$qr2= "SELECT codpre,canpre FROM prestamos  where dni='".$bdni. "'";
	$res1=mysqli_query($con,$qr1);
	$res2=mysqli_query($con,$qr2);
	$fila2=mysqli_fetch_row($res2);
	//echo $fila['nombre'];

//muestro los datos
if($fila1=mysqli_fetch_row($res1)){
?>
<tr>
	<td><?php echo $fila1[0]?></td>
	<td><?php echo $fila1[1]?></td>
	<td><?php echo $fila1[2]?></td>
	<td><?php echo $fila1[3]?></td>
	<td><?php echo $fila1[4]?></td>
	<td><?php echo $fila1[5]?></td>
	<td><?php echo $fila1[6]?></td>
	<td><?php echo $fila1[7]?></td>
	<td><?php echo $fila2[0]?></td>
	<td><?php echo $fila2[1]?></td>
</tr>
<?php
}

mysqli_free_result($res2); //liberar espacio
mysqli_close($con); //cierro la conexion
?>
</table>
<br /><br/>
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

<!-- formulario para grabar prestamo-->
<h2>Generar Prestamo: </h2><br/>
<form id="forms" action="genera.php" method="POST" enctype="multipart/form-data">

Codigo de Prestamo: <input type="text" name="codpre" /> <br /><br />
Cantidad de Prestamo: <input type="text" name="canpre" /> <br /><br />
Codigo de Cliente: <input type="text" name="codcli" /> <br /> <br />
Numero de Prestamo: <input type="text" name="numpre" /> <br /> <br />

<input type="submit" value="Grabar" name="grabar" />
</form>




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


