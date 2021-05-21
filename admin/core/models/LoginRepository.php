<?php

include "LoginAdmin.php";

class LoginRepository {

    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }
    
    private function read($row) {
        //se crea el objeto  y rellena
        $result = new LoginAdmin(); 
        $result->id = $row["id"];
        $result->nick = $row["nick"];
        $result->pass = $row["pass"];
        $result->email = $row["email"];
        $result->salt = $row["salt"];
        return $result;
    }
    
    public function getAccess($data){
        //$sql = "SELECT * FROM tbl_usuarios WHERE nick = :nick AND pass = :pass;";
        
        $sql = 'SELECT * FROM tbl_usuarios WHERE nick = :nick';
        
        $q = $this->db->prepare($sql);
        $q->bindParam(":nick", $data['nick'], PDO::PARAM_STR);
        //$q->bindParam(":pass", $data['pass'], PDO::PARAM_STR);
        $q->execute();
        
        $rows = $q->fetchAll();
        if($rows == null) return -1;
        
        //$cuenta = $rows->rowCount();
        $row = $rows[0];
        
        $passDB = $row['pass'];
        $saltDB = $row['salt'];
        
        $hash = crypt($data['pass'], '$2y$10$' . $saltDB);
        
        //si la pass es correcta preparo los datos del usuario
        if(hash_equals($passDB,$hash)){
            $result = array();
            foreach($rows as $row) {
                array_push($result, $this->read($row));
            }

            return $result;
        }else{
            return -1;
        }
    }//getAccess
    
}//class


?>