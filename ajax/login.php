<?php
session_start();
require_once "../models/User.php";

$usuario=new User();

if (!empty($_POST["login"])) {
    //verifica email y clave
    if(!empty($_POST["email"]) AND !empty($_POST["clave"])){
        //guarda en estas variables el email y la clave
        $email=$_POST["email"];
        $clave=$_POST["clave"];
        $us=$usuario->verifica($email,$clave);
        if($datos=$us->fetch_object()){
            $_SESSION["email"]=$datos->email;
            header("Location: index.php");
        }else{
            echo"<div class='alert alert-danger'>Error de Email o clave</div>";
        }

    }else{
        echo "Campos vacios";
    }
    
}

if (isset($_GET['logout'])) {
    // Realizar el logout
    $usuario->logout();
    header('Location: login.php');
    exit();
}  

?>













