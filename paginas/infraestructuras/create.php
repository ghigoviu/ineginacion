<?php
    include_once '../../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $cp = (isset($_POST['cp'])) ? $_POST['cp'] : '';
    $municipio = (isset($_POST['municipio'])) ? $_POST['municipio'] : '';
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';

    $consulta = "INSERT INTO colonias (nombre, cp, municipio, estado) VALUES ('$nombre', '$cp', '$municipio', '$estado') ";			
    $resultado = $conexion->prepare($consulta);
    $resultado->execute(); 

    if($resultado){
        Header("Location: index.php");
    }else{
    }

?>