<?php
require_once 'includes/redireccion.php';
require_once 'includes/cabecera.php';

?>
<!-- CAJA PRINCIPAL -->
<div id="contenedor">
    <?php require_once 'includes/lateral.php'; ?>
    <div id="principal">
        <h1>Crear Categorías</h1>
        <p>Añade nuevas categorías</p>
        <br>
        <form class="form-group" action="guardarCategoria.php" method="post">
            <label for="nombre">Nombre de la categoría: </label>
            <input type="text"  class="form-control" name="nombre" id="nombre">
            <?php if (isset($_SESSION['errores'])){ ?>
                <div class="alerta alerta-error">
                    <?php echo $_SESSION['errores']?>
                </div>
            <?php } ?>
            <input type="submit"  class="btn btn-primary" value="Guardar">
        </form>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>