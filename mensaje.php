<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<title>SFI</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<div id="header">
	<img src="images/logosfi.jpg" id="Image2" alt="" style="width:190px;height:98x;">
</div>
<div id="body">
<div id="menus"><br />
<h2><a href="analista.php">Menu Principal</a></h2><br></div>
<div id="resultado"><br />

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

