<?php require_once "../vistas/parte_superior.php" ?>

<!--INICIO del cont principal-->

<div class="container">
    <h1>Infraestructura</h1>
</div>
<?php
include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$consulta = "SELECT id, nombre, cp, municipio, estado FROM colonias";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
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
            <div class="table-responsive" id="mydatatable-container">        
                <table id="tablaPersonas" class="records_list table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>CP</th>                                
                            <th>Municipio</th>  
                            <th>Estado</th>  
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $dat) { ?>
                        <tr>
                            <td><?php echo $dat['id'] ?></td>
                            <td><?php echo $dat['nombre'] ?></td>
                            <td><?php echo $dat['cp'] ?></td>
                            <td><?php echo $dat['municipio'] ?></td>
                            <td><?php echo $dat['estado'] ?></td>
                            <td>
                                <a>
                                    <button class='btn btn-primary btnEditarColonia' id="btnEditar">Editar</button>   
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
                    <label for="nombre" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre", name="nombre">
                </div>
                <div class="form-group">
                    <label for="telefono" class="col-form-label">CP:</label>
                    <input type="text" class="form-control" id="cp" name="cp">
                </div>                
                <div class="form-group">
                    <label for="mail" class="col-form-label">Municipio:</label>
                    <input type="text" class="form-control" id="municipio" name="municipio">
                </div>  
                <div class="form-group">
                    <label for="rol" class="col-form-label">Estado:</label>
                    <input type="text" class="form-control" id="estado" name="estado">
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
                        <label for="nombre" class="col-form-label">Nombre:</label>
                           <input type="text" class="form-control" id="nombre", name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="cp" class="col-form-label">CP:</label>
                        <input type="number" class="form-control" id="cp" name="cp">
                    </div>                
                    <div class="form-group">
                        <label for="municipio" class="col-form-label">Municipio:</label>
                        <input type="text" class="form-control" id="municipio" name="municipio">
                    </div>  
                    <div class="form-group">
                        <label for="estado" class="col-form-label">Estado:</label>
                        <input type="text" class="form-control" id="estado" name="estado">
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--FIN del cont principal-->
<?php require_once "../vistas/parte_inferior.php" ?>