<?php
require_once 'includes/Conexion.php';

session_start();
$errores = [];
if (isset($_POST)){
    $nombre = isset($_POST['nombre'])? $_POST['nombre']:false;
    $apellido = isset($_POST['apellido'])? $_POST['apellido']:false;
    $email = isset($_POST['email'])? $_POST['email']:false;
    $password = isset($_POST['password'])? $_POST['password']:false;

   

    if(!empty(($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre))){
        $nombreValidado = true;
    }else{
        $nombreValidado = false;
        $errores['nombre'] = "El nombre no es válido";
    }

    if(!empty(($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido))){
        $apellidoValidado = true;
    }else{
        $apellidoValidado = false;
        $errores['apellido'] = "El apellido no es válido";
    }

    if(!empty(($email) && filter_var($email,FILTER_VALIDATE_EMAIL) )){
        $emailValidado = true;
    }else{
        $emailValidado = false;
        $errores['email'] = "El email no es válido";
    }

    if(!empty(($password))){
        $passwordValidado = true;
    }else{
        $passwordValidado = false;
        $errores['password'] = "El password no es válido";
    }



    if(count($errores)===0){
        $guardarUsuario = true;
        $passwordSeguro = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

        try {
            $pdo = new Conexion();
            $sql = $pdo->prepare("INSERT INTO  usuarios (nombre, apellidos, email, password) VALUES (:nombre, :apellidos, :email, :password)");
            $sql->bindParam(':nombre', $nombre);
            $sql->bindParam(':apellidos', $apellido);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':password', $passwordSeguro);
            $sql->execute();
            $pdo = null;
            $_SESSION['completado'] = "Registro guardado";
        }catch (PDOException $e){
            $_SESSION['errores']['general'] = "Error al guardar";
            header('Location: index.php');
        }

    }else{

        $_SESSION['errores'] = $errores;
        var_dump($_SESSION['errores']);

    }

    header('Location: index.php');
}
