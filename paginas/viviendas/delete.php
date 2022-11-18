<?php
    include_once '../../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $id = $id=$_GET["id"];

    $consulta = "DELETE FROM viviendas WHERE id='$id' ";		
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();     

    if($resultado){
        Header("Location: index.php");
    }else{ }
?>