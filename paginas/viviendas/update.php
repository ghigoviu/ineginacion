<?php
    include_once '../../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $id = (isset($_POST['id'])) ? $_POST['id'] : '';
    $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
    $cuartos = (isset($_POST['cuartos'])) ? $_POST['cuartos'] : '';
    $banos = (isset($_POST['banos'])) ? $_POST['banos'] : '';
    $agua = (isset($_POST['agua'])) ? $_POST['agua'] : '';
    $luz = (isset($_POST['luz'])) ? $_POST['luz'] : '';
    $internet = (isset($_POST['internet'])) ? $_POST['internet'] : '';
    $televisores = (isset($_POST['televisores'])) ? $_POST['televisores'] : '';
    $techo = (isset($_POST['techo'])) ? $_POST['techo'] : '';
    $piso = (isset($_POST['piso'])) ? $_POST['piso'] : '';
    $tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
    $extension = (isset($_POST['extension'])) ? $_POST['extension'] : '';
    $habitantes = (isset($_POST['habitantes'])) ? $_POST['habitantes'] : '';
    $jardin = (isset($_POST['jardin'])) ? $_POST['jardin'] : '';
    
    "INSERT INTO viviendas (direccion, cuartos, banos, agua, luz, internet, televisores, material_techo, material_piso, tipo_vivienda, metros_cuadrados, habitantes, jardin) VALUES  ".
        "('$direccion', '$cuartos', '$banos', '$agua', '$luz', '$internet', '$televisores', '$techo', '$piso', '$tipo', '$extension', '$habitantes', '$jardin') ";			
    $consulta = "UPDATE viviendas SET direccion='$direccion', cuartos='$cuartos', banos='$banos', agua='$agua', luz='$luz', internet='$internet', televisores='$televisores',".
        " material_techo='$techo', material_piso='$piso', tipo_vivienda='$tipo', metros_cuadrados='$extension', habitantes='$habitantes', jardin='$jardin' WHERE id='$id' ";	
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    echo $consulta;	

    if($resultado){
        Header("Location: index.php");
    }else{
    }

?>