<?php
class ServerBd {
    private $servidor;
    private $usuario;
    private $pass;
    private $base_datos;
    private $mysqli;
    private $resultado;
    
    //constructor
    function __construct($servidor, $usuario, $pass, $base_datos) {
        $this->servidor = $servidor;
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->base_datos = $base_datos;
        $this->conectar_base_datos();
    }
    
    //conexion con la bbdd
    private function conectar_base_datos() {
        try{
             $this->mysqli = new mysqli($this->servidor, $this->usuario, $this->pass, $this->base_datos);
        } catch (Exception $ex) {
            echo "error conexion bbdd $ex";
        }  
    }
    
    //Consulta - realiza una query
    public function consulta($consulta) {
        $this->resultado = $this->mysqli->query($consulta);   
    }
      
    //Extrae un registro
    public function extraer_registro() {
        if ($fila = $this->resultado->fetch_array(MYSQLI_ASSOC)) {
            return $fila;
        } else {
            return false;
        }
    }
    
    //Extraer los registros de una consulta
    public function extraer_registros() {
        $registros = array();
        while ($fila = $this->resultado->fetch_array(MYSQLI_ASSOC)) {
            $registros[] = $fila;
        }
        return $registros;
    }
    
    //CIERRA LA CONEXION
    public function cerrar_conexion(){
        mysqli_close($this->mysqli);
    }
    
    //CUENTA LAS FILAS OBTENIDAS MEDIANTE UNA FUNCION DE PHP
    public function numero_filas(){
        return mysqli_num_rows($this->resultado);
        //return $this->resultado->nums_rows;
    }
    
    //CUENTA LAS FILAS AFECTADAS DESPUES DE MANIPULAR LA BBDD
    public function filas_afectadas(){
        //return mysqli_affected_rows($this->resultado);
        return $this->mysqli->affected_rows;
    }
    //limpia la entra de datos
	function inputSeguro($post){
		$input = htmlentities($post);
		$seguro = $this->mysqli->real_escape_string($input);
		return $seguro;
	}
}