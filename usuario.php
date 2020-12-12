<?php

require_once 'includes/redireccion.php';
require_once 'includes/cabecera.php';

?>
    <!-- CAJA PRINCIPAL -->
<div id="contenedor">
<?php require_once 'includes/lateral.php'; ?>
    <div id="principal">
        <h1>Mis datos</h1>
        <?php if(isset($_SESSION['completado'])){ ?>
            <div class="alerta alerta-exito">
                <?php echo $_SESSION['completado']?>
            </div>
        <?php }else if (isset($_SESSION['errores']['general'])){ ?>
            <div class="alerta alerta-error">
                <?php echo $_SESSION['errores']['general']?>
            </div>
        <?php } ?>
        <form class="form-group" action="actualizarUsuario.php" method="post">
            <label for="nombre">Nombre</label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="<?=$_SESSION['usuario']->nombre?>">
            <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'nombre'): ''?>
            <label for="apellido">Apellido</label>
            <input class="form-control" type="text" name="apellido" id="apellido" value="<?=$_SESSION['usuario']->apellidos?>">
            <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'apellido'): ''?>
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="<?=$_SESSION['usuario']->email?>">
            <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'email'): ''?>
            <input class="btn btn-success" type="submit" value="Actualizar">
        </form>
    </div>

</div>
<?php

borrarErrores();
?>
