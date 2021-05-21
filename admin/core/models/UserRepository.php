<?php

include "User.php";

class UserRepository {

    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    private function read($row) {
        //se crea el objeto  y rellena
        $result = new User(); 
        $result->id = $row["id"];
        $result->nick = $row["nick"];
        $result->pass = $row["pass"];
        $result->email = $row["email"];
        $result->salt = $row["salt"];
        //$result->pass = $row["salt"];
        /*$result->married = $row["married"] == 1 ? true : false;
        $result->country_id = $row["country_id"];*/
        return $result;
    }

    public function getById($id) {
        $sql = "SELECT * FROM tbl_usuarios WHERE id = :id";
        $q = $this->db->prepare($sql);
        $q->bindParam(":id", $id, PDO::PARAM_INT);
        $q->execute();
        $rows = $q->fetchAll();
        return $this->read($rows[0]);
    }
     
    public function getAll($filter) {
        $nick = "%" . $filter["nick"] . "%";
        $sql = "SELECT * FROM tbl_usuarios WHERE nick LIKE :nick ORDER BY id DESC";
        $q = $this->db->prepare($sql);
        $q->bindParam(":nick", $nick);
        $q->execute();
        $rows = $q->fetchAll();
        $result = array();
        foreach($rows as $row) {
            array_push($result, $this->read($row));
        }
        return $result;
    }//getAll
       
    public function insert($data) {
        //nick y email son campor unicos.
        //existe nick o email en la BBDD??
        $sql = "SELECT * FROM tbl_usuarios WHERE nick LIKE :nick OR email LIKE :email";
        $q = $this->db->prepare($sql);
        $q->bindParam(":nick", $data["nick"]);
        $q->bindParam(":email", $data["email"]);
        $q->execute();
        $rows = $q->fetchAll();

        //si encuentra algun resultado detiene la operacion
        if(count($rows) != 0 ){
            return false;
        } 
           
        $sql = "INSERT INTO tbl_usuarios (nick, pass, email, salt) VALUES (:nick, :pass, :email, :salt);";
        $q = $this->db->prepare($sql);
        
        $q->bindParam(":nick", $data["nick"]);
        $q->bindParam(":pass", $data["pass"]);
        $q->bindParam(":email", $data["email"]);
        $q->bindParam(":salt", $data["salt"]);
        //$q->bindParam(":direccion", $data["direccion"]);
        //$q->bindParam(":descripcion", $data["descripcion"]);
        //$q->bindParam(":audio", $data["audio"]);
        $q->execute();
        return $this->getById($this->db->lastInsertId());
    }//insert
    
    
    public function update($data) {
        $sql = "UPDATE tbl_usuarios SET nick = :nick, pass = :pass, email = :email, salt = :salt WHERE id = :id";
        $q = $this->db->prepare($sql);
        $q->bindParam(":nick", $data["nick"]);
        $q->bindParam(":pass", $data["pass"]);
        $q->bindParam(":email", $data["email"]);
        $q->bindParam(":salt", $data["salt"]);
        //$q->bindParam(":direccion", $data["direccion"]);
        //$q->bindParam(":descripcion", $data["descripcion"]);    
        //$q->bindParam(":audio", $data["audio"]);    
        $q->bindParam(":id", $data["id"], PDO::PARAM_INT);
        $q->execute();
    }//update
    
    public function remove($id) {
        $sql = "DELETE FROM tbl_usuarios WHERE id = :id";
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