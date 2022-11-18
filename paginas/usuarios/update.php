<?php
    include_once '../../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $id = (isset($_POST['id'])) ? $_POST['id'] : '';
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
    $mail = (isset($_POST['email'])) ? $_POST['email'] : '';
    $rol = (isset($_POST['rol'])) ? $_POST['rol'] : '';
    
    echo $id, $usuario, $telefono, $mail, $rol;
    
    $consulta = "UPDATE usuarios SET usuario='$usuario', mail='$mail', telefono='$telefono', rol='$rol' WHERE id='$id' ";	
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    echo $consulta;	

    if($resultado){
        Header("Location: index.php");
    }else{

    }

?>