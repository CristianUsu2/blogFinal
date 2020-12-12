<?php
function mostrarError($errores, $campo){
    $alerta = "";
    if(isset($errores[$campo])&&!empty($campo))
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
    return $alerta;
}
function borrarErrores(){
    unset($_SESSION['errores']);
    unset($_SESSION['completado']);
    unset($_SESSION['errores']['general']);
    unset($_SESSION['errores_entrada']);

}
function obtenerCategorias(){
    $listaCategoria=[];
    $pdo = new Conexion();
    $sentencia = $pdo->prepare("SELECT * FROM categorias");
    $sentencia->execute();
    if ($sentencia->rowCount()>0) {
        $listaCategoria = $sentencia->fetchAll();
    }
    $pdo=null;
    return $listaCategoria;
}

function obtenerEntradas(){
    $listaEntradas=[];
    $pdo = new Conexion();
    $sentencia = $pdo->prepare("SELECT e.*, c.nombre AS 'categoria' from entradas e ".
        "INNER JOIN categorias c on e.categoria_id = c.id ORDER BY e.id DESC LIMIT 4");
    $sentencia->execute();
    if ($sentencia->rowCount()>0) {
        $listaEntradas = $sentencia->fetchAll();
    }
    $pdo=null;

    return $listaEntradas;
}

function ModificarObtener($id){
    require 'conexion2.php';
    $db=Db::Conectar();
    if(!is_numeric ($id)){
      header('location: ../index.php ');  
    }
    $listaEntradas=[];
    $sentencia = $db->prepare("SELECT * FROM entradas WHERE id=? ");
    $sentencia->bindValue(1, $id);    
    $sentencia->execute();
    $listaEntradas=$sentencia->fetchAll();
    $pdo=null;

    return $listaEntradas;
}
