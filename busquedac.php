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
	
	<div id="header">
			<img src="images/logosfi.jpg" id="Image2" alt="" style="width:190px;height:98x;">
	</div>

	<div id="body">
		<div id="menus"><br/>
		<h2><a href="cajero.php">Menu Principal</a></h2><br>
		<h2>Opciones de Caja:</h2><br>
		<ul><li id="menu4c" class="menuItem">Depositos</li></ul>
		
		</div>
		<div id="resultado">
			<h1>Datos del Cliente: </h1><br/>
			
			
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
			$qr1= "SELECT c.dni,nombre,apellidos,aprger,aprana,codana,p.codpre,canpre,fechapre,plazo,cuota,cuotapen FROM clientes c,prestamos p where c.dni=p.dni and c.dni='".@$_POST['dni']. "'";
			//$qr11= "SELECT numcuo FROM pagos g, prestamos p where p.codpre=g.codpre and p.dni='".$_POST['dni']. "'";
			$res1=mysqli_query($con,$qr1);
			$fila1=mysqli_fetch_row($res1);
			$newDate = date("d-m-Y", strtotime($fila1[8]));
			//echo $newDate;
			//echo $fechapc;
			//muestro los datos
			//[0 dni][1 nom][2 apel][3 aprger][4 aprana][5 codana][6 codpre]
			/////[7 canpre][8 fechapre][9 plazo][10 cuopen][11 cuota]	
			//[7 canpre][8 fechapre][9 plazo][10 cuota]	[11 cuopen]
			if($fila1){
				
			?>
				<table >
					<tr > <th>
			<?php
			echo "<h6>_______________________</h6>";
			echo "<h6>DNI     	           : ".$fila1[0]."</h6>";
			echo "<h6>_______________________</h6>";
			echo "<h6>Nombre               : ".$fila1[1]."</h6>" ;
			echo "<h6>_______________________</h6>";
			echo "<h6>Apellidos            : ".$fila1[2]."</h6>" ;
			echo "<h6>_______________________</h6>";
			echo "<h6>AprGer               : ".$fila1[3]."</h6>" ;
			echo "<h6>_______________________</h6>";
			echo "<h6>AprAna               : ".$fila1[4]."</h6>" ;
			echo "<h6>_______________________</h6>";
			echo "<h6>Codigo Analista      : ".$fila1[5]."</h6>" ;
			
			?>
					 </th>  

					 <th>
			<?php
			
			echo "<h6>___________________________</h6>";
			echo "<h6>Codigo Prestamo      : ".$fila1[6]."</h6>" ;
			echo "<h6>___________________________</h6>";
			echo "<h6>Cantidad de Prestamo : ".$fila1[7]."</h6>" ;
			echo "<h6>___________________________</h6>";
			echo "<h6>Fecha de Prestamo    : ".$newDate."</h6>" ;
			echo "<h6>___________________________</h6>";
			echo "<h6>Cuota Mensual        : ".$fila1[10]."</h6>" ;
			echo "<h6>___________________________</h6>";
			echo "<h6>Plazo                : ".$fila1[9]."</h6>" ;
			echo "<h6>___________________________</h6>";
			echo "<h6>Cuotas Pendientes      :    ".$fila1[11]."</h6>" ;	
			?>		 	
					  </th> 
					 </tr>
				</table>

			<?php
			}
			

					

			mysqli_free_result($res1); //liberar espacio
			//mysqli_close($con); //cierro la conexion
		
			?>
			<br /><br />
			
	</div>

	<div id="footer1"></div>

</body>
</html>
			



				

		
	