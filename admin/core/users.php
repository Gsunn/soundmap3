<?php

include "models/UserRepository.php";

function generateKeys($pass){
                
    // Generamos un salt aleatoreo, de 22 caracteres para Bcrypt
    $salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
    // A Crypt no le gustan los '+' así que los vamos a reemplazar por puntos.
    $salt = strtr($salt, array('+' => '.')); 
    // Generamos el hash
    $hash = crypt($pass, '$2y$10$' . $salt);
    
    return $arr = array(
                        'hash' => $hash, 
                        'salt' => $salt
                    );
}

$config = include("../includes/config.php");
$db = new PDO($config["db"], $config["username"], $config["password"], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
$users = new UserRepository($db);

//selecion por el tipo de metodo de envio
switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $result = $users->getAll(array(
            "nick" => $_GET["nick"]
        ));
        break;
        
    case "POST":
        //copiar fichero
        //$dir_subida = '../../images/fotos/';
        //$lastId = $users->getLastId() + 1; //id del ultimo elemento
        //$fichero_subido = $dir_subida . $lastId . '~' . $_FILES['foto']['name'];
        
        //if (move_uploaded_file($_FILES['foto']['tmp_name'], $fichero_subido)) {
            //echo "El fichero es válido y se subió con éxito.\n";
            //ingresar Registro en la BBDD
            $keys = generateKeys($_POST["pass"]);
            $result = $users->insert(array(
                //"id" => $_POST["id"],
                "nick" => $_POST["nick"],
                "pass" => $keys["hash"],
                "email" => $_POST["email"],
                "salt" => $keys["salt"]
               // "foto" => $_POST["foto"],
                /*"foto" => $lastId . '~' . $_FILES['foto']['name'],
                "nombre" => $_POST["nombre"],
                "direccion" => $_POST["direccion"],
                "descripcion" => $_POST["descripcion"],
                "audio" => $_POST["audio"]*/
            ));
        //} else {
        //    echo "¡Posible ataque de subida de ficheros!\n";
        //}
        break;  
        
    case "PUT":
        parse_str(file_get_contents("php://input"), $_PUT);

        $result = $users->update(array(
            "id" => $_POST["id"],
            "nick" => $_POST["nick"],
            "pass" => $keys["hash"],
            "email" => $_POST["email"],
            "salt" => $keys["salt"]
            //"descripcion" => $_POST["descripcion"],
            //"audio" => $_POST["audio"]
        ));
        break;
        
    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);

        $result = $users->remove(intval($_DELETE["id"]));
        break;

}


header("Content-Type: application/json");
echo json_encode($result);

?>
