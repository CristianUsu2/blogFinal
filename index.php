<?php


?>
<?php require_once 'includes/cabecera.php' ?>

<!--CONTENIDO PRINCIPAL-->

    <div id="contenedor">
        <!--BARRA LATERAL-->

        <?php require_once 'includes/lateral.php' ?>

        <div id="principal">
            <p>Recetas activas</p>
        <?php
                $listaEntradas = obtenerEntradas();
                foreach ($listaEntradas as $entrada){
            ?>
                <div class="card mt-4" style="width: 18rem;">
               <div class="card-body">
                <h5 class="card-title"><?php echo "Titulo receta:".$entrada->titulo ?></h5>
                <p class="card-text"><?php echo "Descripcion:" .$entrada->descripcion ?></p>
                <a href="editarReceta.php?id=<?php echo $entrada->id?>" class="btn btn-primary">Editar</a>
                <a href="eliminarRe.php?id=<?php echo $entrada->id?>&&a=Eliminar" class="btn btn-danger">Eliminar</a>
                <p>
                    <?php echo "Receta creada".$entrada->fecha ?>
                </p>
               </div>
              </div>
                
            
            <?php } ?>
        </div>
    </div>
 
</body>
