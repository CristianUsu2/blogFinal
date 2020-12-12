<?php 
require 'includes/conexion2.php';
$db=Db::Conectar();
echo $_GET["id"];
if($_GET["a"]== "Eliminar"){
   try{
    $id=$_GET["id"];
    $sql=$db->prepare("DELETE  FROM entradas WHERE id=?");
    $sql->bindvalue(1, $id);
    $sql->execute();
    }catch(PDOException $e){
        header('Location: registro.php');
    }
    header('Location: index.php');
}
?>