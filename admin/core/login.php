<?php

session_start();
include('../includes/funciones.php');

if (verifyFormToken('formLog')) {
   // Creo un lista blanca de los campo permitidos
   $whitelist = array('nick','pass','token');	
	
	// se construye un array con las variables superglobales
	foreach ($_POST as $key=>$item) {
			
	// Checkea si el valor de $key (campo de $_POST) esta en la lista blanca.
		if (!in_array($key, $whitelist)) {						
			writeLog('Campos del formulario desconocidos, maninpulacion del formulario.');
			die("Hack-Attempt detectado. Por favor utiliza los campos del formulario");	 
		}
	}//foreach 
    
    include "models/LoginRepository.php";
    $config = include("../includes/config.php");
    
    try{
        $db = new PDO($config["db"], $config["username"], $config["password"], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $users = new LoginRepository($db);
    
    $result = $users->getAccess(array(
        "nick" => stripcleantohtml($_POST["nick"]),
        "pass" => stripcleantohtml($_POST["pass"])
    ));
    
    if($result !=  -1 ){
        $_SESSION['userLogin'] = json_encode($result[0]);
        $result = 1;
    }
    echo $result;
   
}else{
    writeLog("formLog");
    $_SESSION = array();
    session_destroy();
    echo -1;
}


?>