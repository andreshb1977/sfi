<?php
/*Incluimos el fichero de la clase*/
require 'Db.class.php';

/*Creamos la instancia del objeto. Ya estamos conectados*/
$bd=Db::getInstance();
	
	$dni = $_POST['dni'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$codana = $_POST['codana'];



	$res1=mysqli_query($conexion, "SELECT * FROM " );
		
	
	
if($res1) {
echo '<script language = javascript>
		alert("Se actualizo los Datos.")
		self.location = "analista.html"
	 </script>';
}	

else  {
	echo '<script language = javascript>
		alert("No se actualizo los Datos.")
		self.location = "analista.html"
	 </script>';
}

?>

