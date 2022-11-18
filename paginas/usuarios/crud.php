<?php
include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$mail = (isset($_POST['mail'])) ? $_POST['mail'] : '';
$rol = (isset($_POST['rol'])) ? $_POST['rol'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){    
    case 1: //alta
        $consulta = "INSERT INTO usuarios (usuario, telefono, password) VALUES('$usuario', '$telefono', '$password') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, usuario, telefono, mail, rol, password FROM usuarios ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE usuarios SET usuario='$usuario', email='$pais', telefono='$edad' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id, usuario, pais, edad FROM usuarios WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM usuarios WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
}

//print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
