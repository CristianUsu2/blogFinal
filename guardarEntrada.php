<?php
if(isset($_POST)){
    session_start();
    require_once 'includes/Conexion.php';


    $titulo=isset($_POST['titulo'])?$_POST['titulo']:"";
    $descripcion=isset($_POST['descripcion'])?$_POST['descripcion']:"";
    $categoria=isset($_POST['categoria'])?$_POST['categoria']:"";
    $usuario=$_SESSION['usuario']->id;
    $errores =[];
    //var_dump($_SESSION['usuario']->id);

    if(empty($titulo)){
        $errores['titulo'] = "El titulo no es válido";
    }

    if(empty($descripcion)){
        $errores['descripcion'] = "La descripcion no es válida";
    }

    if(empty($categoria) && !is_numeric($categoria)){
        $errores['$categoria'] = "La categoria no es válida";
    }


    if(count($errores)==0){
        try {
            $pdo = new Conexion();
            $sql = $pdo->prepare("INSERT INTO  entradas  VALUES (null,:usuario, :categoria, :titulo, :descripcion, CURRENT_DATE)");
            $sql->bindParam(':usuario', $usuario);
            $sql->bindParam(':categoria', $categoria);
            $sql->bindParam(':titulo', $titulo);
            $sql->bindParam(':descripcion', $descripcion);
            $sql->execute();
            $pdo=null;
            //$_SESSION['completado'] = "Registro guardado 222";
            header('Location: index.php');
        }catch (PDOException $e){
            echo ("Error ".$e->getMessage());
            $_SESSION['errorgeneral'] = "Error al guardar";
        }
    }else{
        var_dump($errores);

        $_SESSION['errores_entrada'] = $errores;
        header('Location: crearEntrada.php');
    }
    //header('Location: index.php');
}
