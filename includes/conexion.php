<?php
//Configuracion de la conexion a base de datos
require "configSQL.php"; //parametros para conectar a SQL  SERVIDOR, USUARIO, ...   

	$conexion = new mysqli(BD_HOST, BD_USUARIO, BD_PASSWORD, BD_BASE);
	
	//comprueba la conexion a la BBDD.
	if(mysqli_connect_errno()) {
		echo "Conexión fallida: " . mysqli_connect_errno();
		exit();
	}

?>