    <button class="btn btn-primary" data-toggle="modal" data-target="#formModal"><i class='fa fa-plus'></i> Nuevo</button>

    <!-- Form Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- form  -->
            <form class="form-horizontal" role="form" method="post" id="new_register" name="new_register">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> Nuevo Sector</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre" class="col-sm-2 control-label">Nombre: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Nombre: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="empresa" class="col-sm-2 control-label">Empresa: </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="empresa" id="empresa">
                            <?php
                                require_once ("config/config.php");
                                $empresas=mysqli_query($con,"select * from empresa where estado=1");
                                while ($rw=mysqli_fetch_array($empresas)) {
                            ?>
                                <option value="<?php echo $rw['id']?>"><?php echo $rw['nombre']?></option>
                            <?php 
                                }
                            ?>
                            </select>
                        </div>
                    </div>
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