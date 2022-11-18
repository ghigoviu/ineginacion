<?php
    include_once '../../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
    $mail = (isset($_POST['email'])) ? $_POST['email'] : '';
    $rol = (isset($_POST['rol'])) ? $_POST['rol'] : '';
    $password = (isset($_POST['password'])) ? $_POST['password'] : '';
    $pw = md5($password);
    $id = (isset($_POST['id'])) ? $_POST['id'] : '';

    $consulta = "INSERT INTO usuarios (usuario, telefono, mail, rol, password) VALUES ('$usuario', '$telefono', '$mail', '$rol', '$pw') ";			
    $resultado = $conexion->prepare($consulta);
    $resultado->execute(); 

    if($resultado){
        Header("Location: index.php");
    }else{

    }

?>