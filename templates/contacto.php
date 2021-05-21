<?php 
   // session_start();

    if(isset($_POST['btnEnviar'])){
         // primero hay que incluir la clase phpmailer para poder instanciar
        //un objeto de la misma
        require "includes/phpmailer/PHPMailerAutoload.php";
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
    $mail->AddAddress('gsun975@gmail.com', 'El Destinatario');
    //Definimos el tema del email
    $mail->Subject = 'Esto es un correo de prueba';

    //Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
    //$mail->MsgHTML(file_get_contents('correomaquetado.html'), dirname(ruta_al_archivo));
    $mail->MsgHTML("Hola que tal, esto es el cuerpo del mensaje!");
    //Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
    $mail->AltBody = 'This is a plain-text message body';



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
	      echo "Problemas enviando correo electrónico a ".$valor;
	      echo "<br/>".$mail->ErrorInfo;	
        }
        else{
	      echo "Mensaje enviado correctamente";
        } 
    }


?>

    <style>
        #contactForm {
            border: 2px solid #fb474a;
            padding: 20px 30px;
            background-color: #222222;
            border-radius: 8px;
        }
    </style>

    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="contForm col-md-6 container">
                <form id="contactForm" action="contacto.php" method="post" role="form">
                    <section>
                        <h2>Colabora</h2>
                        <hr>
                        <h3>Si tienes alguna sugerencia o sonido que quieras compartir ...</h3>
                    </section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" style="padding-right: 5px;">
                                <label for="name">Nombre: </label>
                                <input type="text" class="form-control" id="name" placeholder="nombre o nick">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Correo electrónico: </label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="msg">Mensaje: </label>
                        <textarea id="message" name="msg" placeholder="Message" class="form-control"></textarea>
                    </div>



                    <button type="submit" class="btn btn-round hover" name="btnEnviar"><span>Enviar</span></button>
                </form>
            </div>
            <div class="col-md-6">
            </div>
        </div>

    </div>
