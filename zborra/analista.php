<!-- include arriba del todo-->
<?php include ("seguridada.php");  ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SFI</title>
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
				<h2>Opciones de Analista:</h2><br />

				<ul>
					<li id="menu1" class="menuItem">Buscar </li> <br />
					<li id="menu2" class="menuItem">Evaluar </li> <br />
					<li id="menu3" class="menuItem">Registrar </li> <br />
					<li id="menu4" class="menuItem">Simular </li>	<br />						
					<li id="menu5" class="menuItem">Bandeja Solicitudes </li> <br />
					<li id="menu6" class="menuItem">Bandeja Aprobados </li>	<br />						
					<li id="menu7" class="menuItem">Generar Ticket </li><br />	
					<b><a href="salir.php" align="right">SALIR</a></b>						
				</ul>		

			</div>

			<div id="resultado"></div>

		</div>
		<div id="footer1"></div>
</body>
</html>