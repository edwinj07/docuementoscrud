<?php
require_once ("../conf/conexion.php");
//clase tienda 

class Proceso{
    //clase constructor
    public function __construct(){

    }  
    //funcion para seleccionar la tabla proceso que  mostraremos en el selector
    public function select(){
        $sql = "SELECT * FROM pro_proceso WHERE pro_id =pro_id";
        return ejecutarConsulta($sql);
    }
}


?>