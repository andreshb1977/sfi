
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<title>SFI Caja</title>
</head>

<?php

$con = mysqli_connect("localhost", "sfi", "123");
$conb = mysqli_select_db($con,"sfi");
if(!$con) {
die("PROBLEMAS AL CONECTAR CON EL SERVIDOR");	
}  

if(!$conb) {
die("ERROR AL TRATAR DE CONECTAR A LA BASE DE DATOS");
}

//echo $_POST['consultar']. "<br />";

if ($_POST['consultar']='Consultar'){
//Iniciar Sesión
session_start();
//$cuota= "select cuota from"

//#CODIGO DE PRESTAMO
echo "CÓDIGO DE PRESTAMO: ".$_POST['codpre']. "<br />";
//echo "NUMERO DE COUTA PENDIENTE : ".$numerocuotaactual. "<br />";
//sacar fecha de prestamo
$fechapre = "select fechapre,cuota,plazo from prestamos where codpre='".$_POST['codpre']. "'";
$res1=mysqli_query($con,$fechapre);
$res2=mysqli_fetch_row($res1);

//#FECHA DE PRESTAMO
echo "Fecha Prestamo:".$res2[0]. "<br />";
//Fecha de Prestamo
$f1=strtotime($res2[0]);
//echo $f1. "<br />";;
// FECHA EXPRESADO EN SEGUNDOS, multiplico 1dia por 86400 para convertir dia a segundos
//Fecha de ultimo pago
$fechapagu="select fechapag,numcuo from pagos where codpre='".$_POST['codpre']. "' order by fechapag desc limit 1";
$res3=mysqli_query($con,$fechapagu);
$res4=mysqli_fetch_row($res3);
//#FECHA ULTIMO PAGO
echo "Fecha Ultimo Pago:".$res4[0]. "<br />";


$f10=strtotime($res4[0]);
//echo $f1. "<br />";

$f0=$f10+31*86400;
//echo $f0. "<br />";
$fechapp=date('Y-m-d',$f0);

//#FECHA DE PROXIMO PAGO
echo "Fecha De Proximo Pago: " .$fechapp."<br />"; 

//#NUMERO DE CUOTAS PENDIENTES???
echo "Numero de cuota:".$res4[1]. " de  " .$res2[2]. " cuotas <br />";


////#DIAS DE RETRASO
$numerocuotaactual=$res4[1] + 1;

//# FECHA ACTUAL
$hoy= date('Y-m-d');
echo "Hoy es:".$hoy. "<br />";
$f2=strtotime($hoy);
//echo $f2. "<br />";
$f4=$f1+ $numerocuotaactual*30*86400;
//echo $f1. "<br /> numcuota";
//echo $numerocuotaactual*30*86400;

//echo $f4. "<br />";
$f3=round(($f2-$f4)/86400);
//$f3=round(($f2-$f1)/86400);

//#DIAS DE RETRASO
echo "Dias de retraso para la cuota ".$numerocuotaactual." es : " .$f3. " dias<br />";

//#penalizacion es 36% al año = 0,1% diario
$penalizacion=round($f3*0.001*$res2[1],2);
echo "Penalizacion:".$penalizacion. "<br />";
$canpag=$res2[1]+$penalizacion;	
echo "Nueva Cuota:".$canpag. "<br />";
///cuantas cuotas se deben????? y de acuerdo a eso aplicar lo de arriba 

//#Cuotas Pendientes:
$cuotaspendientes=$res2[2]-$res4[1];
echo "Cuotas Pendientes:".$cuotaspendientes. "<br />";
}else if ($_POST['submit']='Pagar'){

//El cliente es informado de la deuda y acepta pagar la sgt cuota
echo $_POST['submit'];


$qr1="INSERT INTO pagos values('',".$canpag.",'".$hoy."','".$_POST['codpre']."',".$penalizacion.",".$_POST['numcuo'].")";
mysqli_query($con,$qr1);
//no actualizo pq no necesito
//$qr11="update prestamos set cuopen=".$cuotaspendientes. "WHERE codpre='".$_POST['codpre']. "'";
//mysqli_query($con,$qr11);
//Actualizar en Prestamo Cuota_Pendiente
$ncp=$cuotaspendientes-1;
$qr14="update prestamos set cuotapen=".$ncp. " where codpre='".$_POST['codpre']."' ";
$res4=mysqli_query($con,$qr14);
echo $res4[0];
//Insertar en cartera
$qr11 ="SELECT cartera FROM cartera order by idcartera DESC limit 1";
$res2=mysqli_query($con,$qr11);
$fila=mysqli_fetch_row($res2);
//echo $fila[0];
$ncartera = $fila[0] + $canpag ;
$qr12= "INSERT INTO cartera values('', '" .$_POST['codpre']. "', '" .$ncartera. "')" ;
$res3=mysqli_query($con,$qr12);


//mysqli_free_result($res1);

}
?>


<body>
<!-- formulario para grabar prestamo-->
<h1>Pagar Cuota: </h1><br/>
<form action="depositos.php" method="POST" enctype="multipart/form-data">
Codigo de Prestamo: <input type="text" name="codpre" /> <br /><br />
Numero de Cuota: <input type="text" name="numcuo" /> <br /><br />
<input type="submit" value="Pagar" name="submit" />
</form>
</body>
</html>
