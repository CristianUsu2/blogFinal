<?php

if(isset($_POST)){

    require_once 'includes/Conexion.php';

    $nombre=isset($_POST['nombre'])?$_POST['nombre']:"";
    $errores =[];
    if(!empty(($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre))) {
        $nombreValidado = true;
    }else{
        $nombreValidado = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    if(count($errores)==0){
        try {
            $pdo = new Conexion();
            $sql = $pdo->prepare("INSERT INTO  categorias (nombre) VALUES (:nombre)");
            $sql->bindParam(':nombre', $nombre);
            $sql->execute();
            $pdo=null;
            //$_SESSION['completado'] = "Registro guardado 222";
            header('Location: index.php');
        }catch (PDOException $e){
            echo ("Error ".$e->getMessage());
            $_SESSION['errores']['general'] = "Error al guardar";
        }
    }else{
        session_start();
        $_SESSION['errores'] = "Nombre de categoría incorrecto";
        header('Location: crearCategoria.php');
    }
}
