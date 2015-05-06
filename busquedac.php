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
			$qr1= "SELECT c.dni,nombre,apellidos,aprger,aprana,codana,p.codpre,canpre,fechapre,plazo,cuota,cuotapen FROM clientes c,prestamos p where c.dni=p.dni and c.dni='".$_POST['dni']. "'";
			//$qr11= "SELECT numcuo FROM pagos g, prestamos p where p.codpre=g.codpre and p.dni='".$_POST['dni']. "'";
			$res1=mysqli_query($con,$qr1);
			
			//muestro los datos
			//[0 dni][1 nom][2 apel][3 aprger][4 aprana][5 codana][6 codpre]
			/////[7 canpre][8 fechapre][9 plazo][10 cuopen][11 cuota]	
			//[7 canpre][8 fechapre][9 plazo][10 cuota]	[11 cuopen]
			if($fila1=mysqli_fetch_row($res1)){
			?>
				<table text-align="left">
					<tr> <th>
			<?php
			echo "<h6>_______________________</h6>";
			echo "DNI     	           : ".$fila1[0];
			echo "<h6>_______________________</h6>";
			echo "Nombre               : ".$fila1[1] ;
			echo "<h6>_______________________</h6>";
			echo "Apellidos            : ".$fila1[2] ;
			echo "<h6>_______________________</h6>";
			echo "AprGer               : ".$fila1[3] ;
			echo "<h6>_______________________</h6>";
			echo "AprAna               : ".$fila1[4] ;
			echo "<h6>_______________________</h6>";
			echo "Codigo Analista      : ".$fila1[5] ;
			
			
			?>
					 </th>  

					 <th>
			<?php
			echo "<h6>_______________________</h6>";
			echo "Codigo Prestamo      : ".$fila1[6] ;
			echo "<h6>_______________________</h6>";
			echo "Cantidad de Prestamo : ".$fila1[7] ;
			echo "<h6>_______________________</h6>";
			echo "Fecha de Prestamo    : ".$fila1[8] ;
			echo "<h6>_______________________</h6>";
			echo "Plazo                : ".$fila1[9] ;
			echo "<h6>_______________________</h6>";
			echo "Cuota Mensual        : ".$fila1[10] ;
			echo "<h6>_______________________</h6>";
			echo "Cuota Pendiente      :    ".$fila1[11] ;	
			?>		 	
					  </th> 
					 </tr>
				</table>

			<?php
			
			

					

			mysqli_free_result($res1); //liberar espacio
			//mysqli_close($con); //cierro la conexion
		}
			?>
			<br /><br />
			
	</div>

	<div id="footer1"></div>

</body>
</html>
			



				

		
	