<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="select * from sector where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
			$id=$rw['id'];
            $nombre=$rw['nombre'];
            $idempresa=$rw['idempresa'];
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
    <label for="empresa" class="col-sm-2 control-label">Empresa: </label>
    <div class="col-sm-10">
        <select class="form-control" name="empresa" id="empresa">
			<?php
                $empresas=mysqli_query($con,"select * from empresa where estado=1");
                while ($rw=mysqli_fetch_array($empresas)) {
            ?>
                <option value="<?php echo $rw['id']?>" <?php if($idempresa==$rw['id']){echo "selected";} ?>><?php echo $rw['nombre']?></option>
            <?php 
                }
            ?>
		</select>
    </div>
</div>
