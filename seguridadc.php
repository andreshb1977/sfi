<?php
session_start();
session_set_cookie_params(0,"/");

if($_SESSION["cargo"] !="cajero"){
	header("Location:index.html");
	//salir de este script
	exit();
}

?>