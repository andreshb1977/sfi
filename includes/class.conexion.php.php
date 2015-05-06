<?php
class Conexion extends mysqli {


	public function __construct() {
		parent::__construct('localhost','sfi','123','sfi');
		$this->query("SET NAMES 'UTF-8';");
		$this->connect_errno ? die('Error con la conexión') : $x = 'conectado';
		echo $x;
		unset($x);
	}
}
//Lo sgte agregar a todas las conexiones
//require('includes/class.conexion.php')
//$db = new Conexion();
?>