<?php
require_once ("../conf/conexion.php");
//clase tienda 

class Tipo{
    //clase constructor
    public function __construct(){

    }  
    //funcion para seleccionar la tabla tipo que mostraremos en el selector
    public function select(){
        $sql = "SELECT * FROM tip_tipo_doc WHERE tip_id =tip_id";
        return ejecutarConsulta($sql);
    }
}


?>