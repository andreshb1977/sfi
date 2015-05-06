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
/*
echo $_SESSION['fechapre']. "fechapre<br />";
echo $_SESSION['codpre']. "codpre<br />";
echo $_SESSION['fechapagu']. "fechapagu<br />";
echo $_SESSION['fechapp']. "fechapp <br />";
echo $_SESSION['numcuo']. "PLAZO <br />";
echo $_SESSION['numcuop']. "numcuo pAGADAS<br />";
echo $_SESSION['ncuotaa']. "cuota actual+1 <br />";
echo $_SESSION['diasretraso']. "Dias de Retraso<br />";
echo $_SESSION['penalizacion']. "DINERO PENALIZACION<br />";
echo $_SESSION['canpag']. " nueva cuota<br />";
echo $_SESSION['cuotaspendientes']. " CUOTAS PENDIENTES<br />";

*/
$hoy= date('Y-m-d');

#INSERTAR LOS PAGOS 
//$qr1="INSERT INTO pagos values('',".$canpag.",'".$hoy."','".$_SESSION['codpre']."',".$penalizacion.",".$_SESSION['numcuo'].")";
$qr1="INSERT INTO pagos values('',".$_SESSION['canpag'].",'".$hoy."','".$_SESSION['codpre']."',".$_SESSION['penalizacion'].",".$_POST['numcuo'].")";
mysqli_query($con,$qr1);
//no actualizo pq no necesito
//$qr11="update prestamos set cuopen=".$cuotaspendientes. "WHERE codpre='".$_SESSION['codpre']. "'";
//mysqli_query($con,$qr11);

#Actualizar en Prestamo Cuota_Pendiente
$ncp=$_SESSION['cuotaspendientes']-1;
$qr14="update prestamos set cuotapen=".$ncp. " where codpre='".$_SESSION['codpre']."' ";
$res4=mysqli_query($con,$qr14);


#INSERTAR EN CARTERA
$qr11 ="SELECT cartera FROM cartera order by idcartera DESC limit 1";
$res2=mysqli_query($con,$qr11);
$fila=mysqli_fetch_row($res2);
//echo $fila[0];
$ncartera = $fila[0] + $_SESSION['canpag'] ;
$qr12= "INSERT INTO cartera values('', '" .$_SESSION['codpre']. "', '" .$ncartera. "')" ;
$res3=mysqli_query($con,$qr12);

mysqli_free_result($res2);

?>