<?php
require_once("../conf/conexion.php");
class User {   
    //funcion para verificar si el usuario esta registrado
    public function verifica($email,$clave){
        $sql="SELECT * FROM usuario WHERE email = '$email' AND clave = '$clave'";

       

        return ejecutarConsulta($sql);
        
        
    }

    
    public function logout() {
        // Cerrar la sesión del usuario
        session_start();
        session_unset();
        session_destroy();
    }

    

    
}
?>
