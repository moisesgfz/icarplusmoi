<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="select * from tarjeta where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
			$id=$rw['id'];
            $numero=$rw['numero'];
            $vencimiento=$rw['vencimiento'];
            $idvehiculo=$rw['idvehiculo'];
            $created_at=$rw['fecha_carga'];
		}
	}	
	else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="numero" class="col-sm-2 control-label">Numero: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="numero" name="numero" placeholder="Numero: " value="<?php echo $numero ?>">
    </div>
</div>
<div class="form-group">
    <label for="vencimiento" class="col-sm-2 control-label">Vencimiento: </label>
    <div class="col-sm-10">
        <input type="date" required class="form-control" id="vencimiento" name="vencimiento" placeholder="Vencimiento: " value="<?php echo $vencimiento ?>">
    </div>
</div>
<div class="form-group">
    <label for="vehiculo" class="col-sm-2 control-label">Vehiculo: </label>
    <div class="col-sm-10">
        <select class="form-control" name="vehiculo" id="vehiculo">
        <option value="">---SELECCIONAR---</option>
        <?php
            $vehiculos=mysqli_query($con,"select * from vehiculo where estado=1");
            while ($row=mysqli_fetch_array($vehiculos)) {
                if ($idvehiculo==$row['id']){$selected1="selected";}else{$selected1="";}
        ?>
            <option value="<?php echo $row['id']?>" <?php echo $selected1;?>><?php echo $row['patente']?></option>
        <?php 
            }
        ?>
        </select>
    </div>
</div>