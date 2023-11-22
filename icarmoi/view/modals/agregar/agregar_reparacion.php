    <button class="btn btn-primary" data-toggle="modal" data-target="#formModal"><i class='fa fa-plus'></i> Nuevo</button>

    <!-- Form Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- form  -->
            <form class="form-horizontal" role="form" method="post" id="new_register" name="new_register">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> Nueva Reparación</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fecha_repa" class="col-sm-2 control-label">Fecha Reparación: </label>
                        <div class="col-sm-10">
                            <input type="date" required class="form-control" id="fecha_repa" name="fecha_repa" placeholder="Fecha Reparación: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="col-sm-2 control-label">Descripción: </label>
                        <div class="col-sm-10">
                            <textarea type="date" required class="form-control" id="descripcion" name="descripcion" placeholder="Descripción: "></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vehiculo" class="col-sm-2 control-label">Vehiculo: </label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" data-live-search="true" name="vehiculo" id="vehiculo">
                               <!--  <option value="">--- SELECCIONA ---</option> -->
                            <?php
                                require_once ("config/config.php");
                                $vehiculos=mysqli_query($con,"select * from vehiculo where estado=1");
                                while ($rw=mysqli_fetch_array($vehiculos)) {
                            ?>
                                <option value="<?php echo $rw['id']?>"><?php echo $rw['patente']?></option>
                            <?php 
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="taller" class="col-sm-2 control-label">Taller: </label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" data-live-search="true" name="taller" id="taller">
                                <!-- <option value="">--- SELECCIONA ---</option> -->
                            <?php
                                $talleres=mysqli_query($con,"select * from taller where estado=1");
                                while ($rw=mysqli_fetch_array($talleres)) {
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