<?php
require_once  'includes/Conexion.php';
require_once 'includes/helper.php';
if(!isset($_SESSION))
    session_start();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<!--CABECERA-->
<header id="cabecera">
    <!--LOGO-->
    <div id="logo">
        <a href="index.php">Blog de recetas</a>
    </div>
    <!--MENÚ-->
    <?php $listaCategorias = obtenerCategorias();
    //var_dump($listaCategorias);
    ?>
    <nav id="menu">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <?php foreach ($listaCategorias as $categoria){ ?>
                <li><a href="categoria.php?id=<?php echo $categoria->id?>"><?php echo $categoria->nombre ?></a></li>
            <?php } ?>

        </ul>

    </nav>
</header>
