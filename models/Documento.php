<?php
require_once ("../conf/conexion.php");
//clase producto model de la tabla de la base de datos 

class Documento{
    //clase constructor
    public function __construct(){

    }
    //funcion insertar datos en la tabla producto 
    public function insert($doc_nombre,$doc_contenido,$doc_id_tipo,$doc_id_proceso,$doc_codigo){

        //$sql="CALL insertar_documento($doc_nombre,$doc_contenido,$doc_id_tipo,$doc_id_proceso); ";pl para insertar el codigo con el proceso y el tipo
        $sql="INSERT INTO doc_documento (doc_nombre,doc_codigo,doc_contenido,doc_id_tipo,doc_id_proceso)
        VALUES ('$doc_nombre','$doc_codigo','$doc_contenido','$doc_id_tipo','$doc_id_proceso'); ";
        return ejecutarConsulta($sql);
    }

  

    public function update($doc_nombre,$doc_codigo,$doc_contenido,$doc_id_tipo,$doc_id_proceso,$docid ){

        //$sql="CALL gestionar_documento($doc_nombre,$doc_codigo,$doc_contenido,$doc_id_tipo,$doc_id_proceso,$docid)";
        $sql="UPDATE doc_documento SET doc_nombre='$doc_nombre',doc_codigo='$doc_codigo',
        doc_contenido='$doc_contenido',doc_id_tipo='$doc_id_tipo',
        doc_id_proceso='$doc_id_proceso' WHERE docid='$docid'";
        return ejecutarConsulta($sql);
    }

    public function delete($docid){
        //variable sql codigo para eliminar producto
        $sql="DELETE FROM doc_documento WHERE docid='$docid'";
        return ejecutarConsulta($sql);
    }

    public function list(){
        //variable sql codigo para realizar inner join para las tablas relacionadas
        $sql="SELECT d.docid,d.doc_nombre as documento,CONCAT(p.pro_prefijo, ' ', p.pro_nombre) as proceso,
        CONCAT(t.tip_prefijo,'  ',t.tip_nombre) AS tipo,
        CONCAT(P.pro_prefijo,'-',T.tip_prefijo,'-',d.doc_codigo) AS codigo
        FROM doc_documento d INNER JOIN pro_proceso p ON d.doc_id_proceso=p.pro_id
        INNER JOIN tip_tipo_doc t ON d.doc_id_tipo=t.tip_id;";
        return ejecutarConsulta($sql);
    }

    public function mostrar($docid){
        //variable sql codigo para todos los elementos de la tabla id de la tabla
        $sql="SELECT * FROM doc_documento WHERE docid ='$docid'";
        return ejecutarConsultaSimpleFila($sql);
    }

    

    
}
?>