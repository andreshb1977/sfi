<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<title>SFI Caja</title>
</head>
<div id="header">
			<img src="images/logosfi.jpg" id="Image2" alt="" style="width:190px;height:98x;">
</div>
<div id="body">

<div id="informacion">
<h5><a href="cajero.php">Menu Principal</a></h5><br />
</div>
<div id="resultado2">
	

<?php
echo "<h5>Pago Realizado Correctamente<h5>";
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
$hoy= date('Y-m-d');

#INSERTAR LOS PAGOS con codigo de CAJERO
$qr1="INSERT INTO pagos values('',".$_SESSION['canpag'].",'".$hoy."','".$_SESSION['codpre']."',".$_SESSION['penalizacion'].",".$_POST['numcuo'].",'".$_SESSION['empleado']."')";
mysqli_query($con,$qr1);

#Actualizar en Prestamo Cuota_Pendiente
$ncp=$_SESSION['cuotaspendientes']-1;
$qr14="update prestamos set cuotapen=".$ncp. " where codpre='".$_SESSION['codpre']."' ";
$res4=mysqli_query($con,$qr14);

#INSERTAR EN CARTERA
$qr11 ="SELECT cartera FROM cartera order by idcartera DESC limit 1";
$res2=mysqli_query($con,$qr11);
$fila=mysqli_fetch_row($res2);
$ncartera = $fila[0] + $_SESSION['canpag'] ;
$qr12= "INSERT INTO cartera values('', '" .$_SESSION['codpre']. "', '" .$ncartera. "')" ;
$res3=mysqli_query($con,$qr12);

mysqli_free_result($res2);

?>
</div>
</body>
</html>