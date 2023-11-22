<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="select * from reparaciones where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
			$id=$rw['id'];
            $fecha_repa=$rw['fecha_repa'];
            $descripcion=$rw['descripcion'];
            $idvehiculo=$rw['idvehiculo'];
            $idtaller=$rw['idtaller'];
            $created_at=$rw['fecha_carga'];
		}
	}	
	else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="fecha_repa" class="col-sm-2 control-label">Fecha Reparación: </label>
    <div class="col-sm-10">
        <input type="date" required class="form-control" id="fecha_repa" name="fecha_repa" placeholder="Fecha Reparación: " value="<?php echo $fecha_repa ?>">
    </div>
</div>
<div class="form-group">
    <label for="descripcion" class="col-sm-2 control-label">Descripción: </label>
    <div class="col-sm-10">
        <textarea type="date" required class="form-control" id="descripcion" name="descripcion" placeholder="Descripción: "><?php echo $descripcion ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="vehiculo" class="col-sm-2 control-label">Vehiculo: </label>
    <div class="col-sm-10">
        <select class="form-control" name="vehiculo" id="vehiculo">
            <option value="">--- SELECCIONA ---</option>
        <?php
            $vehiculos=mysqli_query($con,"select * from vehiculo where estado=1");
            while ($rw=mysqli_fetch_array($vehiculos)) {
                if ($idvehiculo==$rw['id']){$selected1="selected";}else{$selected1="";}
        ?>
            <option value="<?php echo $rw['id']?>" <?php echo $selected1;?>><?php echo $rw['patente']?></option>
        <?php 
            }
        ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="taller" class="col-sm-2 control-label">Taller: </label>
    <div class="col-sm-10">
        <select class="form-control" name="taller" id="taller">
            <option value="">--- SELECCIONA ---</option>
        <?php
            $talleres=mysqli_query($con,"select * from taller where estado=1");
            while ($rows=mysqli_fetch_array($talleres)) {
                if ($idtaller==$rows['id']){$selected1="selected";}else{$selected1="";}
        ?>
            <option value="<?php echo $rows['id']?>" <?php echo $selected1;?>><?php echo $rows['nombre']?></option>
        <?php 
            }
        ?>
        </select>
    </div>
</div>
