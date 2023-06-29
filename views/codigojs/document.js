var tabla;


function init() {
    mostrarelformulario(false);
    listar();

    $("#formulario").on("submit", function(e) {
        guardaryeditar(e);
    }) 
    
    $.post("../ajax/documento.php?op=selectProceso",function(r){
                $("#docproceso").html(r);
        
    })
    $.post("../ajax/documento.php?op=selectTipo",function(s){
                $("#doctipo").html(s);
    })

}
function limpiar(){
    
    $("#docid").val("");
    $("#docnombre").val("");
    $("#doccodigo").val("");
    $("#doccontenido").val("");
    $("#doctipo").val("");      
    $("#docproceso").val("");
    

}

function mostrarelformulario(x){
    limpiar();

    if(x){
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
    }else{
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}
function cancelarformulario(){
    limpiar();
    mostrarelformulario(false);
}
function listar() {
    tabla=$("#tablalistado").dataTable(
        {
            "aProcessing":true,
            "aServerSide":true,
                dom:'Bfrtip',
                    buttons:[
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdf'
                    ],
                    "ajax":
                        {
                            url:'../ajax/documento.php?op=listar',
                            type:"get",
                            dataType:"json",
                            error: function(e){
                                console.log(e.responseText);
                            }
                        },
                    "bDestroy":true,
                    "iDisplayLength":10,
                    "order":[[0,"desc"]]
        }).DataTable();
}

function guardaryeditar(e){
    e.preventDefault();
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);
            $.ajax({
                url:'../ajax/documento.php?op=guardareditar',
                type:"POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos){

                    //bootbox.alert(datos);
                    mostrarelformulario(false);
                    tabla.ajax.reload();

                    swal.fire(
                        'Registro!',
                        'Tienda Guardada Exitosamente!!',
                        'success'
                    )
                }
            });
    limpiar();
}
function mostrar(docid){
    $.post("../ajax/documento.php?op=mostrar",{docid:docid},function(data,status){

        data=JSON.parse(data);
        mostrarelformulario(true);

        $("#docid").val(data.docid);
        $("#doccodigo").val(data.doc_codigo);
        $("#docnombre").val(data.doc_nombre);
        $("#doccontenido").val(data.doc_contenido); 
        $("#doctipo").val(data.doc_id_tipo);      
        $("#docproceso").val(data.doc_id_proceso);       
        
    })    
}
function eliminar(docid){
    Swal.fire({
        title: 'Documento',
        text: "Desea Eliminar el Registro!",
        icon: 'error ',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si Borrar Registro!'

      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../ajax/documento.php?op=eliminar",{docid:docid},function(data){

            });
            tabla.ajax.reload();
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
          )
        }
      })
}





init();