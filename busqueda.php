<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<title>Sistema Financiero</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<script type="text/javascript" src="js/libs/jquery.js"></script>
<script type="text/javascript" src="js/funcionesmenu.js"></script>
</head>
<body>
	
		<div id="header"></div>
		<div id="body">
			<div id="menus">
				<h4><a href="analista.html">Menu Principal</a></h4><br>

				<ul>
					<li id="menub1" class="menuItem">Cliente </li>
					<li id="menub2" class="menuItem">Simular </li>
					<li id="menub3" class="menuItem">Generar Prestamo </li>					
				</ul>		

			</div>

			<div id="resultado">
							
				<h1>Datos del Cliente: </h1><br/>


				<form id="form1">
				<table border='1' cellpadding='1' cellspacing='1'>
				 		<tr><th colspan='10'>Listado de Clientes</th></tr>
				 		<tr><th>DNI</th><th>Nombre</th><th>Apellidos</th><th>Telefono</th><th>Direccion</th><th>AproG</th><th>AproA</th><th>CodAna</th><th>CodPre</th><th>CanPre</th></tr>



				<?php
					$bdni = $_POST['bdni'];
					$con = mysqli_connect("localhost", "root");
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

					//tengo q hacer dos consultas separadas pq sino no mostrara clientes sin prestamo
					//$qr= "SELECT * FROM clientes where dni=" .$bdni ;
					$qr1= "SELECT * FROM clientes  where dni='".$bdni. "'";
					$qr2= "SELECT codpre,canpre FROM prestamos  where dni='".$bdni. "'";
					$res1=mysqli_query($con,$qr1);
					$res2=mysqli_query($con,$qr2);
					$fila2=mysqli_fetch_row($res2);
					//echo $fila['nombre'];

				//muestro los datos
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
					<td><?php echo $fila2[0]?></td>
					<td><?php echo $fila2[1]?></td>
				</tr>
				<?php
				}

				mysqli_free_result($res2); //liberar espacio
				mysqli_close($con); //cierro la conexion
				?>
				</table>
				
				</form>
		</div>

		<div id="footer"></div>

</body>
</html>
			



				

		
	