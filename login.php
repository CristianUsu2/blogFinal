<?php
//Iniciamos la sesión y la db
require_once 'includes/Conexion.php';
session_start();


if(isset($_POST)){
    if (isset($_SESSION['error_login'])) {
        $_SESSION['error_login'] = null;
    }
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    try{
        $pdo = new Conexion();
        $sentencia = $pdo->prepare("SELECT * FROM usuarios WHERE email =:email");
        $sentencia->bindParam(':email',$email);
        $sentencia->execute();
        $usuario = $sentencia->fetch();

        if ($sentencia->rowCount()>0){
       

            $passwordVerificador = (password_verify($password, $usuario->password));

            if($passwordVerificador) {
                $_SESSION['usuario'] = $usuario;
            }else {
                $_SESSION['error_login'] = "Login incorrecto!!";
            }
        }else{
            $_SESSION['error_login'] = "No se encuentra el usuario!!";
        }

    }catch(PDOException $e){
        $_SESSION['error_login'] = "Error de conexión";

    }
}

header('location: index.php');
