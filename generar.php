<?php

	$con = mysqli_connect("localhost", "root");
	$conb = mysqli_select_db($con,"sfi");
	if(!$con) {
	die("PROBLEMAS AL CONECTAR CON EL SERVIDOR");	
	}  

	if(!$conb) {
	die("ERROR AL TRATAR DE CONECTAR A LA BASE DE DATOS");
	}

if ($_REQUEST['codpre']){
//ingreso de datos a tabla prestamos
$qr1= "INSERT INTO prestamos values('" .$_REQUEST['codpre']. "', '" .$_REQUEST['dni']. "', '" .$_REQUEST['canpre']. "')" ;
$res1=mysqli_query($con,$qr1);
//echo $_REQUEST['numpre1'];
$numpre1 = $_REQUEST['numpre'] -1;
echo $numpre1;
$qr2 ="SELECT cartera FROM cartera where numpre='" .$numpre1. "'";
$res=mysqli_query($con,$qr2);
$fila=mysqli_fetch_row($res);
echo $fila[0];
$nuevacartera = $fila[0] - $_REQUEST['canpre'];

//$cartera = "select cartera from cartera where numpre ='" .$_REQUEST['numpre']. "'";
//$cartera = "select cartera from cartera where numpre = 4" ;
//echo $cartera;
//$res3=mysqli_query($con,$cartera);

//echo $nuevacartera;
$qr3= "INSERT INTO cartera values('" .$_REQUEST['numpre']. "', '" .$_REQUEST['codpre']. "', '" .$_REQUEST['canpre']. "',
 '" .$nuevacartera. "')" ;

$res2=mysqli_query($con,$qr3);
//cierro conecion para q no se queden grabadas antiguos datos
mysqli_free_result($res); //liberar espacio
mysqli_close($con); //cierro la conexion

//echo $res3;
}
?>