<html>
<head>
<meta charset="UTF-8">
<title>SFI</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<div id="header">
		<img src="images/logosfi.jpg" id="Image2" alt="" style="width:190px;height:98x;">
	</div>
<div id="body">

<div id="menus"><br />	

<!--<h2><a href="gerente.html">Menu Principal</a></h2>-->
<input type="button" onclick="history.back()" name="Volver Atrás" value="volver atrás">
</div>
<div id="resultado">
<input type="button" name="imprimir" value="Imprimir Página" onclick="window.print();"/></br></br>
		<form >
		<table >
		 		<tr><th colspan='6'>Tabla de amortizacion calculada:</th></tr>
		 		<tr><th>No Mes</th><th>Tipo Interes</th><th>Cuota</th><th>Amortizado</th><th>Intereses</th><th>Capital Pendiente</th></tr>
		 		<tr><td>0.00</td><td>0.00</td><td>0.00</td><td>0.00</td><td>0.00</td><td><?php echo $_POST['capital']; ?></td></tr>


		<?php

		$p = $_POST['capital'];
		$n = $_POST['plazo'];
		$t = $_POST['interes'];
		$t1 =$t/(100*12);
		$c = round (($t1*$p)/(1-(pow(1/(1+$t1),$n))),2);



		for ($i = 1; $i < $n; $i++) {
			$r = round ($t1*$p,2);
			$a = round ($c - $r,2);
			$p = round ($p - $a,2);

			

		?>

		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $t ?></td>
			<td><?php echo $c ?></td>
			<td><?php echo $a ?></td>
			<td><?php echo $r ?></td>
			<td><?php echo $p ?></td>
			
			
		</tr>
		<?php
		}

		if ($i = $n) {
			$c = round ($p+$t1*$p,2);
			$a = round ($p,2);
			$r = round ($t1*$p,2);
			$p = "0.00" ;
			?>

		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $t ?></td>
			<td><?php echo $c ?></td>
			<td><?php echo $a ?></td>
			<td><?php echo $r ?></td>
			<td><?php echo $p?></td>
			
			
		</tr>
		</table>
		<?php

		}

		?>
		</form>
		<!--Boton js para imprimir -->
		
</div>
</div>
<div id="footer1"></div>
</body>

</html>