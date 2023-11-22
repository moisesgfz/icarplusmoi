<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="select * from seguro where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
			$id=$rw['id'];
            $nombre=$rw['nombre'];
            $poliza=$rw['poliza'];
            $vencimiento=$rw['vencimiento'];
		}
	}	
	else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="nombre" class="col-sm-2 control-label">Nombre: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>" placeholder="Nombre: ">
    </div>
</div>
<div class="form-group">
    <label for="poliza" class="col-sm-2 control-label">Poliza: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="poliza" name="poliza" value="<?php echo $poliza ?>" placeholder="Poliza: ">
    </div>
</div>
<div class="form-group">
    <label for="vencimiento" class="col-sm-2 control-label">Vencimiento: </label>
    <div class="col-sm-10">
        <input type="date" class="form-control" name="vencimiento" id="vencimiento" required="" value="<?php echo $vencimiento ?>" placeholder="DD/MM/YYYY">
    </div>
</div>