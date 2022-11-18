<?php
session_start();

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$pass = md5($password); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD

$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$pass' ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["s_usuario"] = $usuario;
}else{
    $_SESSION["s_usuario"] = null;
    $data=0;
}

print json_encode($data);
$conexion=null;


//usuarios de prueba en la base de datos
//usuario:admin pass:12345
//usuario:demo pass:demo


//    include_once 'database.php';
//
//    session_start();
//
//    if(isset($_GET['cerrar_sesion'])){
//        session_unset();
//
//        session_destroy();
//    }
//
//    if(isset($_SESSION['rol'])){
//        switch($_SESSION['rol']){
//            case 1:
//                header('location: admin.php');
//            break;
//
//            case 2:
//            header('location: colab.php');
//            break;
//
//            default:
//        }
//    }
//
//    if(isset($_POST['username']) && isset($_POST['password'])){
//        $username = $_POST['username'];
//        $password = $_POST['password'];
//
//        $db = new Database();
//        $query = $db->connect()->prepare('SELECT*FROM usuarios WHERE username = :username AND password = :password');
//        $query->execute(['username' => $username, 'password' => $password]);
//
//        $row = $query->fetch(PDO::FETCH_NUM);
//        if($row == true){
//            // validar rol
//            $rol = $row[3];
//            $_SESSION['rol'] = $rol;
//
//            switch($_SESSION['rol']){
//                case 1:
//                    header('location: admin.php');
//                break;
//    
//                case 2:
//                header('location: colab.php');
//                break;
//    
//                default:
//            }
//        }else{
//            // no existe el usuario
//            echo "El usuario o contraseña son incorrectos";
//        }
//    }