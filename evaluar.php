

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<title>Sistema Financiero-Gerente</title>
</head>
<body>
	
	<h1>Evaluacion de Cliente</h1><br />
	<form id="form" action="mensaje.php" method="POST" enctype="multipart/form-data">
		<input  type="hidden" name="asnef" value="0">
		<input type="checkbox" name="asnef" value="asnef"> Asnef<br />
		<input  type="hidden" name="otrop" value="0">
		<input type="checkbox" name="otrop" value="otrop"> Otro Prestamo<br /><br />
		Nomina: <br /><input type="text" size="8" name="nomina" /> <br /> <br /><br />
		<input type="submit" name="submit" value="Evaluar"  />						
	</form>
	
<!-- crearemos el codigo php que se ejecutara-->	

</body>
</html>
