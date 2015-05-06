
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
//Iniciar Sesión
session_start();

#CODIGO DE PRESTAMO
$_SESSION['codpre']=$_POST['codpre'];

//sacar fecha de prestamo
$fechapre = "select fechapre,cuota,plazo,cuotapen from prestamos where codpre='".$_POST['codpre']. "'";
$res1=mysqli_query($con,$fechapre);
$fila1=mysqli_fetch_row($res1);

#FECHA DE PRESTAMO
$_SESSION['fechapre']=$fila1[0];
$f1=strtotime($fila1[0]);
$fechapagu="select fechapag,numcuo from pagos where codpre='".$_POST['codpre']. "' order by numcuo desc limit 1";
$res3=mysqli_query($con,$fechapagu);
$fila3=mysqli_fetch_row($res3);

#FECHA ULTIMO PAGO
$_SESSION['fechapagu']=$fila3[0];
$f10=strtotime($fila3[0]);
$f0=$f10+31*86400;
$fechapp=date('Y-m-d',$f0);

#FECHA DE PROXIMO PAGO
$_SESSION['fechapp']=$fechapp;

#NUMERO DE CUOTAS PAGADAS deL PLAZO
$_SESSION['numcuo']=$fila1[2];
$_SESSION['numcuop']=$fila3[1];
$numerocuotaactual=$fila3[1] + 1;

# FECHA ACTUAL 
$hoy= date('Y-m-d');
$f2=strtotime($hoy);
f4=$f1+ $numerocuotaactual*30*86400;
//echo $f1. "<br /> numcuota";
//echo $numerocuotaactual*30*86400;

//echo $f4. "<br />";
$f3=round(($f2-$f4)/86400);
//$f3=round(($f2-$f1)/86400);

#DIAS DE RETRASO
$_SESSION['ncuotaa']=$numerocuotaactual;
$_SESSION['diasretraso']=$f3;
//echo "Dias de retraso para la cuota ".$numerocuotaactual." es : " .$f3. " dias<br />";

#PENALIZACION es 36% al año = 0,1% diario
$penalizacion=round($f3*0.001*$fila1[1],2);
$_SESSION['penalizacion']=$penalizacion;
//echo "Penalizacion:".$penalizacion. "<br />";
$canpag=$fila1[1]+$penalizacion;

#NUEVA CUOTA	
$_SESSION['canpag']=$canpag;
//echo "Nueva Cuota:".$canpag. "<br />";
///cuantas cuotas se deben????? y de acuerdo a eso aplicar lo de arriba 

//#CUOTAS Pendientes:
//$cuotaspendientes=$fila1[2]-$fila3[1];
//$cuotaspendientes=$fila3[1];
$_SESSION['cuotaspendientes']=$fila1[3];
//echo "Cuotas Pendientes:".$fila1[3]. "<br />";
				         

/*		  
				         //El cliente es informado de la deuda y acepta pagar la sgt cuota




$qr1="INSERT INTO pagos values('',".$canpag.",'".$hoy."','".$_POST['codpre']."',".$penalizacion.",".$_POST['numcuo'].")";
mysqli_query($con,$qr1);
//no actualizo pq no necesito
//$qr11="update prestamos set cuopen=".$cuotaspendientes. "WHERE codpre='".$_POST['codpre']. "'";
//mysqli_query($con,$qr11);
//Actualizar en Prestamo Cuota_Pendiente
$ncp=$cuotaspendientes-1;
$qr14="update prestamos set cuotapen=".$ncp. " where codpre='".$_POST['codpre']."' ";
$fila3=mysqli_query($con,$qr14);
echo $fila3[0];
//Insertar en cartera
$qr11 ="SELECT cartera FROM cartera order by idcartera DESC limit 1";
$fila1=mysqli_query($con,$qr11);
$fila=mysqli_fetch_row($fila1);
//echo $fila[0];
$ncartera = $fila[0] + $canpag ;
$qr12= "INSERT INTO cartera values('', '" .$_POST['codpre']. "', '" .$ncartera. "')" ;
$res3=mysqli_query($con,$qr12);


//mysqli_free_result($res1);
*/
# MENSAJES
echo "CÓDIGO DE PRESTAMO: ".$_POST['codpre']. "<br />";
echo "PROXIMA CUOTA A PAGAR: ".$numerocuotaactual. "<br />";
echo "Nueva Cuota:".$canpag. "<br />";
echo "Dias de retraso para la cuota ".$numerocuotaactual." es : " .$f3. " dias<br />";
echo "########################<br />";
echo "Fecha Prestamo:".$fila1[0]. "<br />";
echo "Fecha Ultimo Pago:".$fila3[0]. "<br />";
echo "Fecha De Proximo Pago: " .$fechapp."<br />"; 
echo "Numero de cuota pagadas:".$fila3[1]. " de  " .$fila1[2]. " cuotas <br />";

echo "Penalizacion:".$penalizacion. "<br />";

echo "Cuotas Pendientes:".$fila1[3]. "<br />";


?>


<body>
<!-- formulario para grabar prestamo-->
<h1>Pagar Cuota: </h1><br/>
<form action="depositos1.php" method="POST" enctype="multipart/form-data">
Codigo de Prestamo: <input type="text" name="codpre" /> <br /><br />
Numero de Cuota: <input type="text" name="numcuo" /> <br /><br />
<input type="submit" value="pagar" name="submit" />
</form>
</body>
</html>
