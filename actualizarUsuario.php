<?php
include_once "includes/Conexion.php";

session_start();
$errores = [];
if (isset($_POST)){
    //recogemos los datos del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre']:false;
    $apellido = isset($_POST['apellido'])? $_POST['apellido']:false;
    $email = isset($_POST['email'])? $_POST['email']:false;
    $id = $_SESSION['usuario']->id;

    //Validamos antes de actualizar

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


    if(count($errores)===0){
        $guardarUsuario = true;
        $pdo = new Conexion();

        try{
            $sql = $pdo->prepare("SELECT id, email FROM usuarios WHERE email =:email");
            $sql->bindParam(':email',$email);
            $sql->execute();
            $usuario = $sql->fetch();
            $idUsuario = $usuario->id;


            if ($idUsuario == $id || $sql->rowCount()==0){ // si los id tanto del usuario en sesion es igual al id del usuario de la tabla (el mismo usuario esta modificando sus datos) o mas nadie tiene ese correo

                try {
                    $sql = $pdo->prepare("UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, email = :email WHERE id = :id");
                    $sql->bindParam(':nombre', $nombre);
                    $sql->bindParam(':apellidos', $apellido);
                    $sql->bindParam(':email', $email);
                    $sql->bindParam(':id', $id);
                    $sql->execute();
                    $pdo = null;
                    $_SESSION['completado'] = "Usuario Actualizado";
                    $_SESSION['usuario']->nombre = $nombre;
                    $_SESSION['usuario']->apellidos = $apellido;
                    $_SESSION['usuario']->email = $email;


                    header('Location: usuario.php');
                }catch (PDOException $e){
                    echo ("Error ".$e->getMessage());
                    $_SESSION['errores']['general'] = "Error al actualizar";
                    //header('Location: usuario.php');

                }

            }else{
                $_SESSION['errores']['general'] = "Error al actualizar, el correo ya existe";
                $pdo = null;

                header('Location: usuario.php');
            }

        }catch(PDOException $e){
            $_SESSION['error_login'] = "Error de conexión";

        }

    }else{
        //header('Location: usuario.php');
        //var_dump($_POST);
        $_SESSION['errores'] = $errores;
        //header('Location: index.php');

    }

    header('Location: usuario.php');
}
