<?php

	$con = mysqli_connect("localhost", "root");
	$conb = mysqli_select_db($con,"sfi");
	if(!$con) {
	die("PROBLEMAS AL CONECTAR CON EL SERVIDOR");	
	}  

	if(!$conb) {
	die("ERROR AL TRATAR DE CONECTAR A LA BASE DE DATOS");
	}

if ($_REQUEST['grabar']){
//echo $_REQUEST['dni'];	
$qr5= "UPDATE clientes SET aprana=1 where dni=".$_REQUEST['dni'];
$res5=mysqli_query($con,$qr5);
//ingreso de datos a tabla prestamos
	//echo $_REQUEST['dni'];
	//Prestamos menores a 300 euros
	if($_REQUEST['canpre'] > 300){
	$qr1= "INSERT INTO prestamos values('', '" .$_REQUEST['codpre']. "', '" .$_REQUEST['dni']. "', '" .$_REQUEST['canpre']. "')" ;
	$res1=mysqli_query($con,$qr1);
	}
	else{
		$qr1= "INSERT INTO prestamos values('', '" .$_REQUEST['codpre']. "', '" .$_REQUEST['dni']. "', '" .$_REQUEST['canpre']. "')" ;
		$qr4= "UPDATE clientes SET aprger='1' where dni='" .$_REQUEST['dni']. "'";
		$res1=mysqli_query($con,$qr1);
		$res4=mysqli_query($con,$qr4);
	}
	//echo $_REQUEST['numpre1'];
	//$numpre1 = $_REQUEST['codpre'] -1;
	//echo $numpre1;
	$qr2 ="SELECT cartera FROM cartera order by idcartera DESC limit 1";
	$res2=mysqli_query($con,$qr2);
	$fila=mysqli_fetch_row($res2);
	//echo $fila[0];
	$ncartera = $fila[0] - $_REQUEST['canpre'];

	//$cartera = "select cartera from cartera where numpre ='" .$_REQUEST['numpre']. "'";
	//$cartera = "select cartera from cartera where numpre = 4" ;
	//echo $cartera;
	//$res3=mysqli_query($con,$cartera);

	//echo $nuevacartera;
	$qr3= "INSERT INTO cartera values('', '" .$_REQUEST['codpre']. "', '" .$ncartera. "')" ;

	$res3=mysqli_query($con,$qr3);

		if($res1 and $res2){
			echo '<script language = javascript>
				alert("Prestamo Registrado Correctamente.")
				self.location = "analista.html"
				</script>';
		}else echo '<script language = javascript>
				alert("No se ingresaron correctamente.")
				self.location = "analista.html"
				</script>';

	mysqli_free_result($res2); //liberar espacio
	mysqli_close($con); //cierro la conexion

	}
?>