<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<title>Sistema Financiero-Gerente</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<div id="header"></div>
		<div id="body">
<div id="resultado">
<p><h4><a href="analista.html">Menu Principal</a></h4><br></p>
	<?php
	if(isset($_POST['submit'])){
	if ($_POST['nomina'] >= 400 and $_POST['asnef'] !='asnef' and $_POST['otrop'] !='otrop'){
		
		echo "Tu prestamo máximo es de 4000 euros";	
		
	 }
	else echo "Tu prestamo máximo es de 300 euros";
}
 
?>


</div>
</div>

</body>
</html>

