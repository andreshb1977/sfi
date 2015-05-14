<!--Actualizar el campo-->
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
				if ($_POST['submit']='aprobarg'){
					//$qr4= "UPDATE clientes  SET sel=1 where id='".$_POST['id']."'";
					
					//echo $_POST['aprger'];
					foreach($_POST['sel'] as $valor)
					{
						
						$qr4= "UPDATE clientes  SET aprger=1 where idcliente=".$valor;
						$res4=mysqli_query($con,$qr4);
					}	

					//$qr5= "INSERT INTO clientes  SET sel=1 where sel='".$_POST['sel']."'";
					//$qr4= "UPDATE clientes  SET aprger=".$_POST['aprger']." where sel='".$_POST['sel']."'";
					//$res4=mysqli_query($con,$qr4);

					if(!$res4){
						echo '<script language = javascript>
								alert("No se Actualizo los Datos.")
								self.location = "gerente.php"
							 </script>';
					}else echo '<script language = javascript>
								alert("Datos Actualizados Correctamente.")
								self.location = "gerente.php"
							 </script>';
				}
				//mysqli_close($con); //cierro la conexion
			?>