<aside id="sidebar">

    <?php if(isset($_SESSION['usuario'])){ ?>
        <div id="usuario-logueado" class="bloque">
            <h3>Bienvenido: <?php echo $_SESSION['usuario']->nombre .' ' .$_SESSION['usuario']->apellidos ;?></h3>
            <a href="usuario.php" class="btn btn-lingth mt-2">Datos usuario</a>
            <a href="crearCategoria.php" class="btn btn-dark mt-2">Crear una categoria</a>
            <a href="crearEntrada.php" class="btn btn-primary mt-2">Crear recetas</a> <!-- ok -->
            <a href="cerrar.php" class="btn btn-danger mt-2">Cerrar sesión</a>

        </div>
    <?php } else{ ?>


    <div id="login" class="bloque">

        <h3>Login</h3>
        <form class="form-group" action="login.php" method="post">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password">
            <input class="btn btn-warning" type="submit" value="Ingresar">
        </form>
    </div>

    <div id="register" class="bloque">
        <h3>Registrate</h3>


        <?php if(isset($_SESSION['completado'])){ ?>
            <div class="alerta alerta-exito">
                <?php echo $_SESSION['completado']?>
            </div>
        <?php }else if (isset($_SESSION['errores']['general'])){ ?>
            <div class="alerta alerta-error">
                <?php echo $_SESSION['errores']['general']?>
            </div>
        <?php } ?>


        <form ckass="form-group" action="registro.php" method="post">
            <label for="nombre">Nombre</label>
            <input class="form-control" type="text" name="nombre" id="nombre">
            <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'nombre'): ''?>

            <label for="apellido">Apellido</label>
            <input class="form-control" type="text" name="apellido" id="apellido">
            <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'apellido'): ''?>

            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email">
            <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'email'): ''?>


            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password">
            <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'password'): ''?>


            <input class="btn btn-primary" type="submit" value="Registrar">
        </form>
        <?php borrarErrores();?>
    </div>
    <?php } ?>
  
</aside>