<?php require_once "../vistas/parte_superior.php"?>

<!--INICIO del cont principal-->

<div class="container">
    <h1>Viviendas</h1>
</div>
<?php
include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT V.id, direccion, cuartos, banos, agua, luz, internet, televisores, material_techo, material_piso, tipo_vivienda, metros_cuadrados, habitantes, jardin, C.nombre AS colonia
 FROM colonias C, viviendas V
 WHERE V.id_colonias = C.id";
    "SELECT OrderID, C.CustomerID, CompanyName, OrderDate
        FROM Customers C, Orders O
        WHERE C.CustomerID = O.CustomerID";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT id, nombre FROM colonias ORDER BY nombre";
$colonias = $conexion->prepare($query);
$colonias->execute();   
$option = $colonias->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
        </div>    
    </div>    
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Dirección</th>
                            <th>Colonia</th>
                            <th>Cuartos</th>                                
                            <th>Baños</th>  
                            <th>Agua</th> 
                            <th>Luz</th>  
                            <th>Internet</th>
                            <th>Televisores</th>
                            <th>Techo</th>
                            <th>Piso</th>
                            <th>Tipo</th>
                            <th>Extensión (m<sup>2</sup>) </th>
                            <th>Habitantes</th>
                            <th>Jardín</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $dat) { ?>
                        <tr>
                            <td><?php echo $dat['id'] ?></td>
                            <td><?php echo $dat['direccion'] ?></td>
                            <td><?php echo $dat['colonia'] ?></td>
                            <td><?php echo $dat['cuartos'] ?></td>
                            <td><?php echo $dat['banos'] ?></td>
                            <td><?php echo $dat['agua'] ?></td>
                            <td><?php echo $dat['luz'] ?></td>
                            <td><?php echo $dat['internet'] ?></td>
                            <td><?php echo $dat['televisores'] ?></td>
                            <td><?php echo $dat['material_techo'] ?></td>
                            <td><?php echo $dat['material_piso'] ?></td>
                            <td><?php echo $dat['tipo_vivienda'] ?></td>
                            <td><?php echo $dat['metros_cuadrados'] ?></td>
                            <td><?php echo $dat['habitantes'] ?></td>
                            <td><?php echo $dat['jardin'] ?></td>
                            <td>
                                <a>
                                    <button class='btn btn-primary btnEditarVivienda' id="btnEditar">Editar</button>   
                                </a>
                                <a href="delete.php?id=<?= $dat['id'] ?>">
                                    <button class='btn btn-danger btnBorrar'>Eliminar</button>
                                </a>
                            </td> 
                        </tr>
                        <?php } ?>                                
                    </tbody>                                                        
               </table>                    
            </div>
        </div>
    </div>  
</div>    

<!--Modal para Update-->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formUsuarios" action="update.php" method="POST">    
            <div class="modal-body">
                <div class="form-group">
                    <label for="id" class="col-form-label">Id:</label>
                    <input type="text" class="form-control" id="id", name="id" readonly="readonly">
                </div>
                <div class="form-group">
                        <label for="direccion" class="col-form-label">Dirección:</label>
                        <input type="text" class="form-control" id="direccion", name="direccion">
                    </div>
                <div class="form-group">
                    <label for="cuartos" class="col-form-label">Cuartos:</label>
                    <input type="number" class="form-control" id="cuartos" name="cuartos">
                </div>                
                <div class="form-group">
                    <label for="banos" class="col-form-label">Baños:</label>
                    <input type="number" class="form-control" id="banos" name="banos">
                </div>  
                <div class="form-group">
                    <label for="agua" class="col-form-label">Agua:</label>
                    <select class="form-control" id="agua" name="agua">
                        <option value="SI">Si</option>
                        <option value="NO">No</option>
                    </select>
                </div>  
                <div class="form-group">
                    <label for="luz" class="col-form-label">Luz:</label>
                    <select class="form-control" id="luz" name="luz">
                        <option value="SI">Si</option>
                        <option value="NO">No</option>
                    </select>
                </div> 
                <div class="form-group">
                    <label for="internet" class="col-form-label">Internet:</label>
                    <select class="form-control" id="internet" name="internet">
                        <option value="SI">Si</option>
                        <option value="NO">No</option>
                    </select>
                </div> 
                <div class="form-group">
                    <label for="televisores" class="col-form-label">Televisores:</label>
                    <input type="number" class="form-control" id="televisores" name="televisores">
                </div> 
                <div class="form-group">
                    <label for="techo" class="col-form-label">Techo:</label>
                    <input type="text" class="form-control" id="techo" name="techo">
                </div> 
                <div class="form-group">
                    <label for="piso" class="col-form-label">Piso:</label>
                    <input type="text" class="form-control" id="piso" name="piso">
                </div> 
                <div class="form-group">
                    <label for="tipo" class="col-form-label">Tipo:</label>
                    <input type="text" class="form-control" id="tipo" name="tipo">
                </div> 
                <div class="form-group">
                    <label for="extension" class="col-form-label">Extensión (m<sup>2</sup>):</label>
                    <input type="number" class="form-control" id="extension" name="extension">
                </div> 
                <div class="form-group">
                    <label for="habitantes" class="col-form-label">Habitantes:</label>
                    <input type="number" class="form-control" id="habitantes" name="habitantes">
                </div> 
                <div class="form-group">
                    <label for="jardin" class="col-form-label">Jardín:</label>
                    <select type="text" class="form-control" id="jardin" name="jardin">
                        <option value="SI">Si</option>
                        <option value="NO">No</option>
                    </select>
                </div> 
                <!--
                <div class="form-group">
                    <label for="password" class="col-form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>  
                -->         
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <a href="update.php?id=<?= $dat['id'] ?>">
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </a>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
<!--Modal para Create-->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formUsuarios" action="create.php" method="POST">    
                <div class="modal-body">
                    <div class="form-group">
                        <label for="direccion" class="col-form-label">Dirección:</label>
                        <input type="text" class="form-control" id="direccion", name="direccion">
                    </div>
                    <div class="form-group">   
                        <label for="colonia" class="col-form-label">Colonia:</label>
                        <select class="form-control" id="colonia" name="colonia">
                            <option value="0">Seleccionar Colonia</option>
                            <?php foreach($option as $row) {  ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                        <div class="form-group">
                        <label for="cuartos" class="col-form-label">Cuartos:</label>
                        <input type="number" class="form-control" id="cuartos" name="cuartos">
                    </div>                
                    <div class="form-group">
                        <label for="banos" class="col-form-label">Baños:</label>
                        <input type="number" class="form-control" id="banos" name="banos">
                    </div>  
                    <div class="form-group">
                        <label for="agua" class="col-form-label">Agua:</label>
                        <select class="form-control" id="agua" name="agua">
                            <option value="SI">Si</option>
                            <option value="NO">No</option>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="luz" class="col-form-label">Luz:</label>
                        <select class="form-control" id="luz" name="luz">
                            <option value="SI">Si</option>
                            <option value="NO">No</option>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="internet" class="col-form-label">Internet:</label>
                        <select class="form-control" id="internet" name="internet">
                            <option value="SI">Si</option>
                            <option value="NO">No</option>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="televisores" class="col-form-label">Televisores:</label>
                        <input type="number" class="form-control" id="televisores" name="televisores">
                    </div> 
                    <div class="form-group">
                        <label for="techo" class="col-form-label">Techo:</label>
                        <input type="text" class="form-control" id="techo" name="techo">
                    </div> 
                    <div class="form-group">
                        <label for="piso" class="col-form-label">Piso:</label>
                        <input type="text" class="form-control" id="piso" name="piso">
                    </div> 
                    <div class="form-group">
                        <label for="tipo" class="col-form-label">Tipo:</label>
                        <input type="text" class="form-control" id="tipo" name="tipo">
                    </div> 
                    <div class="form-group">
                        <label for="extension" class="col-form-label">Extensión (m<sup>2</sup>):</label>
                        <input type="number" class="form-control" id="extension" name="extension">
                    </div> 
                    <div class="form-group">
                        <label for="habitantes" class="col-form-label">Habitantes:</label>
                        <input type="number" class="form-control" id="habitantes" name="habitantes">
                    </div> 
                    <div class="form-group">
                        <label for="jardin" class="col-form-label">Jardín:</label>
                        <select type="text" class="form-control" id="jardin" name="jardin">
                            <option value="SI">Si</option>
                            <option value="NO">No</option>
                        </select>
                    </div> 

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--FIN del cont principal-->
<?php require_once "../vistas/parte_inferior.php"?>