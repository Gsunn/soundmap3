<?php

include "models/MarkerRepository.php";

$config = include("../includes/config.php");
$db = new PDO($config["db"], $config["username"], $config["password"], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
$markers = new MarkerRepository($db);


switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $result = $markers->getAll(array(
            "nombre" => $_GET["nombre"]
        ));
        break;
        
    case "POST":
        //copiar fichero
        $dir_fotos = '../../images/fotos/';
        $dir_audios = '../../audio/';
        $lastId = $markers->getLastId() + 1; //id del ultimo elemento
        $fichero_foto = $dir_fotos . $lastId . '~' . $_FILES['foto']['name'];
        $fichero_audio = $dir_audios . $lastId . '~' . $_FILES['audio']['name'];
        // move_uploaded_file($_FILES['audio']['tmp_name'], $fichero_audio)
           
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $fichero_foto) ) {
            move_uploaded_file($_FILES['audio']['tmp_name'], $fichero_audio);
            //echo "El fichero es válido y se subió con éxito.\n";
            //ingresar Registro en la BBDD
            $result = $markers->insert(array(
                //"id" => $_POST["id"],
                "latitud" => $_POST["latitud"],
                "longuitud" => $_POST["longuitud"],
               // "foto" => $_POST["foto"],
                "foto" => $lastId . '~' . $_FILES['foto']['name'],
                "nombre" => $_POST["nombre"],
                "direccion" => $_POST["direccion"],
                "descripcion" => $_POST["descripcion"],
                "audio" => $lastId . '~' . $_FILES['audio']['name']
                //"audio" => $_POST["audio"]
            ));
        } else {
            echo "¡Posible ataque de subida de ficheros!\n";
        }
        break;  
        
    case "PUT":
        parse_str(file_get_contents("php://input"), $_PUT);

        $result = $markers->update(array(
            "id" => $_POST["id"],
            "latitud" => $_POST["latitud"],
            "longuitud" => $_POST["longuitud"],
            "foto" => $_POST["foto"],
            "nombre" => $_POST["nombre"],
            "direccion" => $_POST["direccion"],
            "descripcion" => $_POST["descripcion"],
            "audio" => $_POST["audio"]
        ));
        break;
        
    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);

        $result = $markers->remove(intval($_DELETE["id"]));
        break;
}


header("Content-Type: application/json");
echo json_encode($result);

?>
