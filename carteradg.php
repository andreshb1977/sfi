<?php include ("seguridadg.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<title>SFI</title>
</head>
<body>


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
$qr1="select cartera from cartera order by cartera limit 1";	
$res1=mysqli_query($con,$qr1);
$fila=mysqli_fetch_row($res1);		
echo "<h3>Cartera a día  ".date("d-m-Y"). " es: ".$fila[0]. "</h3>";

mysqli_free_result($res1);
?>

</form>
</body>
</html>
