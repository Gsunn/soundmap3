<?php

include "Marker.php";

class MarkerRepository {

    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    private function read($row) {
        //se crea el objeto  y rellena
        $result = new Marker(); 
        $result->id = $row["id"];
        $result->latitud = $row["latitud"];
        $result->longuitud = $row["longuitud"];
        $result->foto = $row["foto"];
        $result->nombre = $row["nombre"];
        $result->direccion = $row["direccion"];
        $result->descripcion = $row["descripcion"];
        $result->audio = $row["audio"];
        /*$result->married = $row["married"] == 1 ? true : false;
        $result->country_id = $row["country_id"];*/
        return $result;
    }

    public function getById($id) {
        $sql = "SELECT * FROM tbl_sitios WHERE id = :id";
        $q = $this->db->prepare($sql);
        $q->bindParam(":id", $id, PDO::PARAM_INT);
        $q->execute();
        $rows = $q->fetchAll();
        return $this->read($rows[0]);
    }
    
   
    public function getAll($filter) {
        $nombre = "%" . $filter["nombre"] . "%";
        $sql = "SELECT * FROM tbl_sitios WHERE nombre LIKE :nombre ORDER BY id DESC";
        $q = $this->db->prepare($sql);
        $q->bindParam(":nombre", $nombre);
        $q->execute();
        $rows = $q->fetchAll();

        $result = array();
        foreach($rows as $row) {
            array_push($result, $this->read($row));
        }
        return $result;
    }//getAll
    
    
    public function insert($data) {
        $sql = "INSERT INTO tbl_sitios (latitud, longuitud, foto, nombre, direccion, descripcion, audio) VALUES (:latitud, :longuitud, :foto, :nombre, :direccion, :descripcion, :audio);";
        $q = $this->db->prepare($sql);
        $q->bindParam(":latitud", $data["latitud"]);
        $q->bindParam(":longuitud", $data["longuitud"]);
        $q->bindParam(":foto", $data["foto"]);
        $q->bindParam(":nombre", $data["nombre"]);
        $q->bindParam(":direccion", $data["direccion"]);
        $q->bindParam(":descripcion", $data["descripcion"]);
        $q->bindParam(":audio", $data["audio"]);
        $q->execute();
        return $this->getById($this->db->lastInsertId());
    }//insert
    
    public function update($data) {
        $sql = "UPDATE tbl_sitios SET latitud = :latitud, longuitud = :longuitud, foto = :foto, nombre = :nombre, direccion = :direccion, descripcion = :descripcion, audio = :audio WHERE id = :id";
        $q = $this->db->prepare($sql);
        $q->bindParam(":latitud", $data["latitud"]);
        $q->bindParam(":longuitud", $data["longuitud"]);
        $q->bindParam(":foto", $data["foto"]);
        $q->bindParam(":nombre", $data["nombre"]);
        $q->bindParam(":direccion", $data["direccion"]);
        $q->bindParam(":descripcion", $data["descripcion"]);    
        $q->bindParam(":audio", $data["audio"]);    
        $q->bindParam(":id", $data["id"], PDO::PARAM_INT);
        $q->execute();
    }//update
    
    public function remove($id) {
        $sql = "DELETE FROM tbl_sitios WHERE id = :id";
        $q = $this->db->prepare($sql);
        $q->bindParam(":id", $id, PDO::PARAM_INT);
        $q->execute();
    }//remove
    
    public function getLastId(){
        $sql = "SELECT MAX(id) AS id FROM tbl_sitios";
        $q = $this->db->prepare($sql);
        $q->execute();
        $r = $q->fetch();
        return $r[0];
    }//getLastId

}
?>