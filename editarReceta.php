<?php
require_once 'includes/redireccion.php';
require_once 'includes/cabecera.php';
?>
<div id="contenedor">
    <?php require_once 'includes/lateral.php'; ?>
    <div id="principal">
        <h1>Editar Recetas</h1>
        <p>Edita la receta</p>
        <br>
        <?php 
         $resultado=ModificarObtener($_GET["id"]);
        ?>
        <?php foreach($resultado as $a){?>
        <form class="form-group" action="operacionesRest.php" method="post">
            <input type="hidden" name="id" value="<?php echo $a["id"];?>">
             <input type="hidden" name="accion" value="1">
            <label for="titulo">Título: </label>
            <input class="form-control" type="text" name="titulo" id="titulo" value="<?php echo $a["titulo"];?>"/>
            <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'],'titulo'): ''?>

            <label for="descripcion">Descripción: </label>
            <textarea  class="form-control" name="descripcion" id="descripcion"><?php echo $a["descripcion"];?></textarea>
            <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'],'descripcion'): ''?>

            <label for="categoria">Categoría: </label>
            <select class="form-control" name="categoria" id="categoria">
                <?php $listaCategorias= obtenerCategorias();
                if(!empty($listaCategorias)) {
                    foreach ($listaCategorias as $categoria){
                        ?>
                        <option value="<?=$categoria->id ?>">
                            <?=$categoria->nombre?>
                        </option>
                        <?php
                    }
                }
                ?>
            </select>
            <?php }?>
            <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'],'categoria'): ''?>
                 
            <input class="btn btn-primary mt-4" type="submit" value="Guardar">
        </form>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php
borrarErrores();
?>
