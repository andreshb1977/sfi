<!--Actualizar el campo-->
				<?php

				
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
				echo $_POST['aprana'];
				echo $_POST['dni'];
				if ($_POST['submit']){
					$qr3= "UPDATE clientes  SET aprana=".$_POST['aprana']." where dni='".$_POST['dni']."'";
					$res3=mysqli_query($con,$qr3);
					if(!$res3){
						echo '<script language = javascript>
								alert("No se Actualizo los Datos.")
								self.location = "analista.html"
							 </script>';
					}else echo '<script language = javascript>
								alert("Datos Actualizados Correctamente.")
								self.location = "analista.html"
							 </script>';
				}
				mysqli_close($con); //cierro la conexion
				?>