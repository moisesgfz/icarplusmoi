<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="select * from taller where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
			$id=$rw['id'];
            $nombre=$rw['nombre'];
            $cuit=$rw['cuit'];
            $direccion=$rw['direccion'];
            $localidad=$rw['localidad'];
            $telefono=$rw['telefono'];
            $celular=$rw['celular'];
            $status=$rw['estado'];
            $created_at=$rw['fecha_carga'];
		}
	}	
	else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="nombre" class="col-sm-2 control-label">Nombre: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>" placeholder="Nombre: ">
    </div>
</div>
<div class="form-group">
    <label for="cuit" class="col-sm-2 control-label">Cuit: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="cuit" name="cuit" value="<?php echo $cuit;?>" placeholder="Cuit: ">
    </div>
</div>
<div class="form-group">
    <label for="direccion" class="col-sm-2 control-label">Dirección: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="direccion" name="direccion" value="<?php echo $direccion;?>" placeholder="Dirección: ">
    </div>
</div>
<div class="form-group">
    <label for="localidad" class="col-sm-2 control-label">Localidad: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="localidad" name="localidad" value="<?php echo $localidad;?>" placeholder="Localidad: ">
    </div>
</div>
<div class="form-group">
    <label for="telefono" class="col-sm-2 control-label">Telefono: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="telefono" name="telefono" value="<?php echo $telefono;?>" placeholder="Telefono: ">
    </div>
</div>
<div class="form-group">
    <label for="celular" class="col-sm-2 control-label">Celular: </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $celular;?>" placeholder="Celular: ">
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-sm-2 control-label">Estado: </label>
    <div class="col-sm-10">
        <select class="form-control" name="estado" id="estado">
			<option value="1" <?php if ($status==1){echo "selected";}?>>Activo</option>
			<option value="2" <?php if ($status==2){echo "selected";}?>>Inactivo</option>
		</select>
    </div>
</div>
