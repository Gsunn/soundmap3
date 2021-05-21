<?php 
//FUNCIONES 
function stripcleantohtml($s){
		return htmlentities(trim(strip_tags(stripslashes($s))), ENT_NOQUOTES, "UTF-8");
}

function cleantohtml($s){
		return strip_tags(htmlentities(trim(stripslashes($s))), ENT_NOQUOTES, "UTF-8");
}

//genera el token
function generateFormToken($form) {
	
    // genera un token con valor unico
    $token = md5(uniqid(microtime(), true));  
		
    //Escriba el token generado en la variable de sesión para comprobarlo en el campo oculto cuando se envía el formulario
    $_SESSION[$form . '_token'] = $token; 
    return $token;
}//generateFormToken
	
//verifica el token generado
function verifyFormToken($form) {
   
	// check if a session is started and a token is transmitted, if not return an error
	if(!isset($_SESSION[$form.'_token'])) { 
		return false;
	}
	
	// check if the form is sent with token in it
	if(!isset($_POST['token'])) {
		return false;
	}
	
	// compare the tokens against each other if they are still the same
	if ($_SESSION[$form.'_token'] !== $_POST['token']) {
		return false;
	}
	
	return true;
}//verifyFormToken

function getRealIp() {
       if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  //check ip from share internet
         $ip=$_SERVER['HTTP_CLIENT_IP'];
       } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy
         $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
       } else {
         $ip=$_SERVER['REMOTE_ADDR'];
       }
       return $ip;
    }

//Hack Logging
function writeLog($where) {
    date_default_timezone_set('UTC');
    setlocale(LC_ALL,"es_ES");

	$ip = getRealIp(); // Coge la IP superglobal
	$host = gethostbyaddr($ip);    // Localiza el host que realiza el ataque
	$date = date("d M Y");
	
	//Crea un mensaje de registro
	$logging = "<<<LOG
		<< Start of Message >>
		There was a hacking attempt on your form.
		Date of Attack: {$date}
		IP-Adress: {$ip}
		Host of Attacker: {$host}
		Point of Attack: {$where}
		<< End of Message >>
        LOG>>>\n";
        
        // Abre el archivo de log
		if($handle = fopen('../log/hacklog.log', 'a')) {
		
			fputs($handle, $logging);  // escribe la informacion
			fclose($handle);           // cierra el archivo
			
		} else {  // Si el primer método no funciona, ej, debido a los permisos de archivos erróneos, envía los datos por correo electrónico
		
        	$to = 'ADMIN@gmail.com';  
        	$subject = 'Ataque hack';
        	$header = 'From: ADMIN@gmail.com';
        	if (mail($to, $subject, $logging, $header)) {
        		echo "Sent notice to admin.";
        	}

		}
}//writeLOG

?>