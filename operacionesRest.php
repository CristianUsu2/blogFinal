<?php 
 require 'includes/conexion2.php';
 $db=Db::Conectar();
if($_POST["accion"]== 1){
  $id=$_POST["id"];
  $titulo=$_POST["titulo"];
  $descripcion=$_POST["descripcion"];
  $categoria=$_POST["categoria"];
   try {
    $sql=$db->prepare("UPDATE entradas set categoria_id=?,titulo=?,descripcion=? where id=?");
    $sql->bindvalue(1,$categoria);
    $sql->bindvalue(2,$titulo);
    $sql->bindvalue(3,$descripcion);
    $sql->bindvalue(4,$id);
    $sql->execute();
   }catch(PDOException $a){
    header('Location: editarReceta.php');
   }
   header('Location: index.php');
}

?>