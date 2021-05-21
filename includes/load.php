<?php

require "configSQL.php";
require "serverBd.php";

$esquema = new ServerBd(BD_HOST, BD_USUARIO, BD_PASSWORD, BD_BASE);
if(!$esquema) echo "error de servidor";
$esquema->consulta("SET NAMES 'utf8'");

$sql = "SELECT * FROM tbl_sitios";
$esquema->consulta($sql);
$result = $esquema->extraer_registros();
header("Content-Type: text/html;charset=utf-8");
echo json_encode($result);  // lo convierte a  json


/*
$resultado=mysqli_query($conexion, $sql);
$arr = array();
while($obj = mysqli_fetch_object($resultado)){
$arr[] = array('id' => $obj->id,
               'latitud' => $obj->latitud,
               'longuitud' => $obj->longuitud,
               'logo' => $obj->logo,
               'nombre' => $obj->nombre,
               'direccion' => $obj->direccion,
               'audio' => $obj->audio,);
}
*/
//header("Content-Type: application/json");
//echo json_encode($result);  // lo convierte a  json
//echo '' . json_encode($result) . '';  // lo convierte a  json

/*
while ($obj = mysql_fetch_object($resulset)) {
    $arr[] = array('ID' => $obj->ID,
                   'P' => utf8_encode($obj->POBLACION),
                   'NV' => $obj->NUMVISITAS,
        );
}
echo '' . json_encode($arr) . '';*/