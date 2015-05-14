<?php include ("seguridadc.php"); ?>
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
//session_start();
#CODIGO DE PRESTAMO
$_SESSION['codpre']=@$_POST['codpre'];

$fechapre = "select fechapre,cuota,plazo,cuotapen from prestamos where codpre='".@$_POST['codpre']. "'";
$res1=mysqli_query($con,$fechapre);
$fila1=mysqli_fetch_row($res1);

if($fila1){
#FECHA DE PRESTAMO
$_SESSION['fechapre']=$fila1[0];
$f1=strtotime($fila1[0]);
$fechapagu="select fechapag,numcuo from pagos where codpre='".@$_POST['codpre']. "' order by numcuo desc limit 1";
$res3=mysqli_query($con,$fechapagu);
$fila3=mysqli_fetch_row($res3);

##Fecha Prestamo Foramateada a europa
$fechapc=date("d-m-Y", $f1);
//echo "fechaoc" .$fechapc;


#FECHA ULTIMO PAGO
$_SESSION['fechapagu']=$fila3[0];
$f10=strtotime($fila3[0]);
$f0=$f10+31*86400;
$fechapp=date('Y-m-d',$f0);
##Formateada a Europa
$fechaupc=date("d-m-Y", $f10);


#FECHA DE PROXIMO PAGO
$_SESSION['fechapp']=$fechapp;
##Formateada a Europa
$fechappc=date("d-m-Y", $f0);

#NUMERO DE CUOTAS PAGADAS deL PLAZO
$_SESSION['numcuo']=$fila1[2];
$_SESSION['numcuop']=$fila3[1];

$numerocuotaactual=$fila3[1] + 1;

//# FECHA ACTUAL 
$hoy= date('Y-m-d');
$f2=strtotime($hoy);
$f4=$f1+ $numerocuotaactual*30*86400;
$f3=round(($f2-$f4)/86400);

#DIAS DE RETRASO
$_SESSION['ncuotaa']=$numerocuotaactual;
$_SESSION['diasretraso']=$f3;

#PENALIZACION es 36% al año = 0,1% diario
$penalizacion=round($f3*0.001*$fila1[1],2);
$_SESSION['penalizacion']=$penalizacion;
$canpag=$fila1[1]+$penalizacion;

#NUEVA CUOTA	
$_SESSION['canpag']=$canpag;

#CUOTAS Pendientes:
$_SESSION['cuotaspendientes']=$fila1[3];

# MENSAJES
//echo $_SESSION['empleado'];

echo "<h5>Código de Prestamo: ".@$_POST['codpre']. "</h5><br />";
echo "<h5>Próxima Cuota a Pagar: ".$numerocuotaactual. "</h5><br />";
echo "<h5>Nueva Cuota: ".$canpag. "</h5>";
echo "<h5>______________________________</h5>";
echo "Retraso para la cuota ".$numerocuotaactual." es : " .$f3. " días";
echo "<h5>______________________________</h5>";

echo "Fecha de Prestamo: ".$fechapc. "<br /><br/>";
echo "<h5>---Luego del Primer Pago----</h5><br/>";
//$fechaupc=cambiaf_a_normal($fila3[0]);
//echo "Fecha de Último Pago: ".$fila3[0]. "";
echo "Fecha de Último Pago: ".$fechaupc;
echo "<h5>______________________________</h5>";

//echo "Fecha De Próximo Pago: " .$fechapp.""; 
echo "Fecha De Próximo Pago: " .$fechappc; 
echo "<h5>______________________________</h5>";
echo "Numero de Cuotas Pagadas: ".$fila3[1]. " de  " .$fila1[2]. " cuotas ";
echo "<h5>______________________________</h5>";
echo "Penalización: ".$penalizacion;
echo "<h5>______________________________</h5>";
echo "Cuotas Pendientes: ".$fila1[3];

}
else echo '<script language = javascript>
				alert("Código de Prestamo No Existe.")
				self.location = "cajero.php"
				</script>';
?>
</div>
<div id="resultado2">
<h5><a href="cajero.php">Menu Principal</a></h5><br />
<!-- formulario para grabar prestamo-->
<h5>Pagar Cuota: </h5><br/>
<form action="depositos1.php" method="POST" enctype="multipart/form-data">
Codigo de Prestamo: <input type="text" size="5" name="codpre" value="<?php echo $_POST['codpre']?>" disabled /> <br /><br />
Numero de Cuota:&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" size="5"  name="numcuo" value="<?php echo $numerocuotaactual ?>" disabled /> <br /><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="Pagar" name="submit" />
</form>
</div>
</div>
</body>
</html>
