<?php
//include arriba del todo
include ("seguridadc.php");
//$empleado=$_SESSION['empleado'];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SFI cajero</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<script type="text/javascript" src="js/libs/jquery.js"></script>
<script type="text/javascript" src="js/funcionesmenu.js"></script>
</head>
<body>
		<div id="header">
			<img src="images/logosfi.jpg" id="Image2" alt="" style="width:190px;height:98x;">
			<img src="images/contactosfi.jpg" id="Image10" alt="" style="width:190px;height:103x;" align="right">
		</div>

		<div id="body">

			<div id="menus"><br />
				<h2>Opciones de Caja:</h2><br>

				<ul>
					<li id="menu1c" class="menuItem">Buscar</li> <br />
					<li id="menu2c" class="menuItem">Bandeja Aprobados</li><br />
					<li id="menu4c" class="menuItem">Depositos</li><br />
					<li id="menu3c" class="menuItem">Generar Ticket</li><br />
					<b><a href="salir.php" align="right">SALIR</a></b>

				</ul>		

			</div>

			<div id="resultado">
				
			</div>

		</div>

		<div id="footer1"></div>
</body>
</html>