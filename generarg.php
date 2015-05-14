<?php
include ("seguridadg.php");
	$con = mysqli_connect("localhost", "sfi", "123");
	$conb = mysqli_select_db($con,"sfi");
	if(!$con) {
	die("PROBLEMAS AL CONECTAR CON EL SERVIDOR");	
	}  

	if(!$conb) {
	die("ERROR AL TRATAR DE CONECTAR A LA BASE DE DATOS");
	}

if ($_POST['grabar']){
//echo $_POST['dni'];	
//Al generar el prestamo se pone APROBADO POR ANALISTA
$qr5= "UPDATE clientes SET aprana=1 where dni=".$_POST['dni'];
$res5=mysqli_query($con,$qr5);
//Codpre es int y se insertara automaticamenet el ultimo +1 , el primero se definio a 100
$qr6= "SELECT codpre from prestamos order by codpre desc limit 1";
$res6=mysqli_query($con,$qr6);
$fila6=mysqli_fetch_row($res6);
$codigoprestamo=$fila6[0]+1;
//
//ingreso de datos a tabla prestamos
	//echo $_POST['dni'];
	//Prestamos Mayores o iguales a 300 euros deben pasar por gerente (else parger=1)

	if($_POST['canpre'] > 300){
	//$qr1= "INSERT INTO prestamos values('', '" .$_POST['codpre']. "', '" .$_POST['dni']. "', " .$_POST['canpre']. ",'" .$_POST['fechapre']. "'," .$_POST['plazo']. "," .$_POST['plazo']. "," .$_POST['cuota']. "," .$_POST['interes']. ",'')" ;
	$qr1= "INSERT INTO prestamos values(''," .$codigoprestamo. ", '" .$_POST['dni']. "', " .$_POST['canpre']. ",'" .$_POST['fechapre']. "'," .$_POST['plazo']. "," .$_POST['plazo']. "," .$_POST['cuota']. "," .$_POST['interes']. ",'')" ;
	$res1=mysqli_query($con,$qr1);
	}
	else{
		$qr1= "INSERT INTO prestamos values('', ".$codigoprestamo.", '" .$_POST['dni']. "', " .$_POST['canpre']. ",'" .$_POST['fechapre']. "'," .$_POST['plazo']. "," .$_POST['plazo']. "," .$_POST['cuota']. "," .$_POST['interes']. ",'')" ;
		$qr4= "UPDATE clientes SET aprger='1' where dni='" .$_POST['dni']. "'";
		$res1=mysqli_query($con,$qr1);
		$res4=mysqli_query($con,$qr4);
	}
	//echo $_POST['numpre1'];
	//$numpre1 = $_POST['codpre'] -1;
	//echo $numpre1;
	$qr2 ="SELECT cartera FROM cartera order by idcartera DESC limit 1";
	$res2=mysqli_query($con,$qr2);
	$fila=mysqli_fetch_row($res2);
	//echo $fila[0];
	$ncartera = $fila[0] - $_POST['canpre'];

	//$cartera = "select cartera from cartera where numpre ='" .$_POST['numpre']. "'";
	//$cartera = "select cartera from cartera where numpre = 4" ;
	//echo $cartera;
	//$res3=mysqli_query($con,$cartera);

	//echo $nuevacartera;
	$qr3= "INSERT INTO cartera values('', '" .$codigoprestamo. "', '" .$ncartera. "')" ;

	$res3=mysqli_query($con,$qr3);

		if($res1 and $res2){
			echo '<script language = javascript>
				alert("Prestamo Registrado Correctamente.")
				self.location = "gerente.php"
				</script>';
		}else echo '<script language = javascript>
				alert("No se ingresaron correctamente.")
				self.location = "gerente.php"
				</script>';

	mysqli_free_result($res2); //liberar espacio de select
	mysqli_free_result($res6); 
	mysqli_close($con); //cierro la conexion

	}
?>