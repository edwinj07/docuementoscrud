<?php

require_once("../models/Documento.php");

$documentos=new Documento();
//verificar las variables post 

$docid=isset($_POST["docid"])?limpiarCadena($_POST["docid"]):"";
$doc_nombre=isset($_POST["docnombre"])?limpiarCadena($_POST["docnombre"]):"";
$doc_codigo=isset($_POST["doccodigo"])?limpiarCadena($_POST["doccodigo"]):"";
$doc_contenido=isset($_POST["doccontenido"])?limpiarCadena($_POST["doccontenido"]):"";
$doc_id_tipo=isset($_POST["doctipo"])?limpiarCadena($_POST["doctipo"]):"";
$doc_id_proceso=isset($_POST["docproceso"])?limpiarCadena($_POST["docproceso"]):"";

switch($_GET["op"]){
    case 'guardareditar':
        // Verificar si se ha enviado el ID del documento
        //var_dump(empty($doc_id),$doc_id);
        if ((empty($docid))) {
            // Si no se ha enviado el ID, es un nuevo registro y se realiza la inserción
            $respuesta = $documentos->insert($doc_nombre, $doc_contenido, $doc_id_tipo, $doc_id_proceso, $doc_codigo);
            
            // Verificar si la inserción fue exitosa
            if ($respuesta) {
                echo "Documento registrado correctamente";
            } else {
                echo "No se pudo guardar el documento";
            }
        } else {
            // Si se ha enviado el ID, se realiza la actualización del registro existente
            $respuesta = $documentos->update($doc_nombre, $doc_codigo, $doc_contenido, $doc_id_tipo, $doc_id_proceso, $docid);
            
            // Verificar si la actualización fue exitosa
            if ($respuesta) {
                echo "Documento actualizado correctamente";
            } else {
                echo "No se pudo actualizar el documento";
            }
        }
    break;
    // case 'editar':
        # code...

        $respuesta=$documentos->mostrar($_POST["docid"]);

        if(empty($_POST["docid"])){
            if(is_array($respuesta)==true and count($respuesta)==0){
                $documentos->insert($_POST["docnombre"],$_POST["doccodigo"],$_POST["doccontenido"],$_POST["doctipo"],$_POST["docproceso"]);
            }else{
                $documentos->update($_POST["docnombre"],$_POST["doccodigo"],$_POST["doccontenido"],$_POST["doctipo"],$_POST["docproceso"],$_POST["docid"]);
            }
        }
        break;



    case 'listar':
        $respuesta=$documentos->list();

       $data=Array();

       while($res=$respuesta->fetch_object()){
        
        $data[]=array(
            
            "0"=>'<button type="button" onClick="mostrar('.$res->docid.');"  id="'.$res->docid.'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>'.
            '<button type="button" onClick="eliminar('.$res->docid.');"  id="'.$res->docid.'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-trash"></i></div></button>',
            "1"=>$res->documento,
            "2"=>$res->proceso,
            "3"=>$res->tipo,
            "4"=>$res->codigo,         
        );
       }
       $result=array(
           "echo"=>0,
           "totalRecords"=>count($data),
           "iTotalDisplayRecords"=>count($data),
           "aaData"=>$data);

           echo json_encode($result);       

    break;

    
    
    

    case 'eliminar':

        $respuesta=$documentos->delete($docid);
        echo $respuesta?"Tienda eliminada":"Tienda no se pudo eliminar";
    break;


    case 'mostrar':
        $respuesta=$documentos->mostrar($docid);
        echo json_encode($respuesta);
    break;


    case 'selectTipo':
        require_once ("../models/Tipo.php");

        $tipo=new Tipo();
        $respuesta=$tipo->select();
        
            while($res=$respuesta->fetch_object()){

                echo '<option value='.$res->tip_id.'>'.$res->tip_prefijo.'</option>';
            }
    break;


    case 'selectProceso':
        require_once ("../models/Proceso.php");

        $proceso=new Proceso();
        $respuesta=$proceso->select();
        
            while($res=$respuesta->fetch_object()){

                echo '<option value='.$res->pro_id.'>'.$res->pro_prefijo.'</option>';
            }
    break;


}


?>