    <button class="btn btn-primary" data-toggle="modal" data-target="#formModal"><i class='fa fa-plus'></i> Nuevo</button>


    <!-- Form Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- form  -->
            <form class="form-horizontal" role="form" method="post" id="new_register" name="new_register">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> Nuevo Empleado</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dni" class="col-sm-2 control-label">DNI: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="dni" name="dni" placeholder="DNI: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="col-sm-2 control-label">Nombre: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Nombre: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="apellido" class="col-sm-2 control-label">Apellido: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="apellido" name="apellido" placeholder="Apellido: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="usuario" class="col-sm-2 control-label">Usuario: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="usuario" name="usuario" placeholder="Usuario: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Correo Electrónico: </label>
                        <div class="col-sm-10">
                            <input type="email" required class="form-control" id="email" name="email" placeholder="Correo Electrónico: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Contraseña: </label>
                        <div class="col-sm-10">
                            <input type="password" required class="form-control" id="password" name="password" placeholder="*******">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="domicilio" class="col-sm-2 control-label">Domicilio: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Domicilio: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="localidad" class="col-sm-2 control-label">Localidad: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="localidad" name="localidad" placeholder="Localidad: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telefono" class="col-sm-2 control-label">Telefóno</label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="telefono" name="telefono" placeholder="Telefóno">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="celular" class="col-sm-2 control-label">Celular: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="celular" name="celular" placeholder="Celular: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="registro" class="col-sm-2 control-label">Registro: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="registro" name="registro" placeholder="Registro: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="estado" class="col-sm-2 control-label">Estado: </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="estado" id="estado">
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="permisos" class="col-sm-2 control-label">Permisos: </label>
                        <div class="col-sm-10">
                            <ul style="list-style: none;" id="permisos">
                                <?php 
                                    require_once ("config/config.php");
                                    $rspta = mysqli_query($con, "SELECT * FROM permisos");
                                    $id=0;
                                    $marcados = mysqli_query($con, "SELECT * FROM empleado_permisos WHERE idempleado=$id");
                                    $valores=array();
                                    while ($per = $marcados->fetch_object())
                                    {
                                        array_push($valores, $per->idpermiso);
                                    }
                                    while ($reg = $rspta->fetch_object())
                                    {
                                        $sw=in_array($reg->id,$valores)?'checked':'';
                                        echo '<li> <input id="permisos" type="checkbox" '.$sw.'  name="permisos[]" value="'.$reg->id.'">'.$reg->nombre.'</li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="kind" class="col-sm-2 control-label">Kind: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kind" name="kind" placeholder="Kind: ">
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="guardar_datos" class="btn btn-primary">Agregar</button>
                </div>
            </form>
            <!-- /end form  -->
            </div>
        </div>
    </div>
    <!-- End Form Modal -->