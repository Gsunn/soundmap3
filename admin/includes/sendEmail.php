<?php

var_dump($_POST);
$para = $_POST['para'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

require ('phpMailer/PHPMailerAutoload.php');
    //Crear una instancia de PHPMailer
    $mail = new PHPMailer();
    //Definir que vamos a usar SMTP
    $mail->IsSMTP();
    //Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
    // 0 = off (producción)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug  = 0;
    //Ahora definimos gmail como servidor que aloja nuestro SMTP
    $mail->Host       = 'smtp.gmail.com';
    //El puerto será el 587 ya que usamos encriptación TLS
    $mail->Port       = 587;
    //Definmos la seguridad como TLS
    $mail->SMTPSecure = 'tls';
    //Tenemos que usar gmail autenticados, así que esto a TRUE
    $mail->SMTPAuth   = true;
    //Definimos la cuenta que vamos a usar. Dirección completa de la misma
    $mail->Username   = "jesus.delvalvelasco@gmail.com";
    //Introducimos nuestra contraseña de gmail
    $mail->Password   = "arimoon1";
    //Definimos el remitente (dirección y, opcionalmente, nombre)
    $mail->SetFrom('jesus.delvalvelasco@gmail.com', 'Administrador');
    //Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
    $mail->AddReplyTo('jesus.delvalvelasco@gmail.com','El de la réplica');
    //Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
    $mail->AddAddress($para, 'El Destinatario');
    //Definimos el tema del email
    $mail->Subject = $asunto;

    //Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
    //$mail->MsgHTML(file_get_contents('correomaquetado.html'), dirname(ruta_al_archivo));
    $mail->MsgHTML($mensaje);
    //Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
    $mail->AltBody = $mensaje;


        //el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
        //una cuenta gratuita, por tanto lo pongo a 30  
        $mail->Timeout=30;

        //se envia el mensaje, si no ha habido problemas 
        //la variable $exito tendra el valor true
        $exito = $mail->Send();

        //Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
        //para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
        //del anterior, para ello se usa la funcion sleep	
        $intentos=1; 
        while ((!$exito) && ($intentos < 5)) {
	       sleep(5);
           	//echo $mail->ErrorInfo;
           	$exito = $mail->Send();
           	$intentos=$intentos+1;	
	
        }
 
	       	
        if(!$exito) {
	      //echo "Problemas enviando correo electrónico a ".$valor;
	      //echo "<br/>".$mail->ErrorInfo;
          echo 0;    
        }
        else{
	      echo -1; //"Mensaje enviado correctamente";
        } 

?>