<?php
    include_once '../../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $id = (isset($_POST['id'])) ? $_POST['id'] : '';
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $cp = (isset($_POST['cp'])) ? $_POST['cp'] : '';
    $municipio = (isset($_POST['municipio'])) ? $_POST['municipio'] : '';
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
    
    $consulta = "UPDATE colonias SET nombre='$nombre', municipio='$municipio', cp='$cp', estado='$estado' WHERE id='$id' ";	
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    echo $consulta;	

    if($resultado){
        Header("Location: index.php");
    }else{
    }

?>