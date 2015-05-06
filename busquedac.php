<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SFI Caja</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<script type="text/javascript" src="js/libs/jquery.js"></script>
<script type="text/javascript" src="js/funcionesmenu.js"></script>
</head>
<body>
	
	<div id="header"></div>

	<div id="body">
		<div id="menus"><br/>
		<h2><a href="cajero.html">Menu Principal</a></h2><br>
		<ul><li id="menu4c" class="menuItem">Depositos</li></ul>
		
		</div>
		<div id="resultado">
			<h1>Datos del Cliente: </h1><br/>
			<form>
			<table border='1' cellpadding='1' cellspacing='1'>
		 		<tr><th colspan='14'>Listado de Clientes</th></tr>
		 		<tr><th>DNI</th><th>Nombre</th><th>Apellidos</th><th>AproG</th><th>AproA</th><th>CodAna</th><th>CodPre</th><th>CanPre</th><th>FechaPre</th><th>Plazo</th><th>Cuota</th><th>CuotasPen</th></tr>

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
			
			//Validar si se está ingresando con sesión correctamente
			if (!$_SESSION['id_usuario']){
			echo '<script language = javascript>
			alert("usuario no autenticado")
			self.location = "index.html"
			</script>';
			}

			//Tengo las BD relacionados con llaves foraneas, con lo q puedo hacer consultas de 2 tablas
			//$qr1= "SELECT c.dni,nombre,apellidos,aprger,aprana,codana,p.codpre,canpre,fechapre,plazo,cuota,cuopen FROM clientes c,prestamos p  where c.dni=p.dni and c.dni='".$_POST['dni']. "'";
			$qr1= "SELECT c.dni,nombre,apellidos,aprger,aprana,codana,p.codpre,canpre,fechapre,plazo,cuota,cuotapen FROM clientes c,prestamos p where c.dni=p.dni and c.dni='".$_POST['dni']. "'";
			//$qr11= "SELECT numcuo FROM pagos g, prestamos p where p.codpre=g.codpre and p.dni='".$_POST['dni']. "'";
			$res1=mysqli_query($con,$qr1);
			
			//muestro los datos
			//[0 dni][1 nom][2 apel][3 aprger][4 aprana][5 codana][6 codpre]
			/////[7 canpre][8 fechapre][9 plazo][10 cuopen][11 cuota]	
			//[7 canpre][8 fechapre][9 plazo][10 cuota]	[11 cuopen]
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
				<td><?php echo $fila1[8]?></td>
				<td><?php echo $fila1[9]?></td>
				<td><?php echo $fila1[10]?></td>
				<td><?php echo $fila1[11]?></td>
			</tr>
			
			<?php
			}

			mysqli_free_result($res1); //liberar espacio
			//mysqli_close($con); //cierro la conexion
			?>
			</table><br /><br />
			</form>
	</div>

	<div id="footer1"></div>

</body>
</html>
			



				

		
	