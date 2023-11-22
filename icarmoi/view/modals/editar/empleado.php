<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="select * from empleado where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
			$dni=$rw['dni'];
			$imagen=$rw['imagen'];
			$nombre=$rw['nombre'];
			$apellido=$rw['apellido'];
			$username=$rw['username'];
			$email=$rw['email'];
			$domicilio=$rw['domicilio'];
			$localidad=$rw['localidad'];
			$telefono=$rw['telefono'];
			$celular=$rw['celular'];
			$registro=$rw['registro'];
			$status=$rw['status'];
			$created_at=$rw['created_at'];
		}
	}	
	else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="dni" class="col-sm-2 control-label">DNI: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="dni" name="dni" value="<?php echo $dni;?>" placeholder="DNI: ">
    </div>
</div>
<div class="form-group">
    <label for="nombre" class="col-sm-2 control-label">Nombre: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>" placeholder="Nombre: ">
    </div>
</div>
<div class="form-group">
    <label for="apellido" class="col-sm-2 control-label">Apellido: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="apellido" name="apellido" value="<?php echo $apellido;?>" placeholder="Apellido: ">
    </div>
</div>
<div class="form-group">
    <label for="usuario" class="col-sm-2 control-label">Usuario: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="usuario" name="usuario" value="<?php echo $username;?>" placeholder="Usuario: ">
    </div>
</div>
<div class="form-group">
    <label for="email" class="col-sm-2 control-label">Correo Electrónico: </label>
    <div class="col-sm-10">
        <input type="email" required class="form-control" id="email" name="email" value="<?php echo $email;?>" placeholder="Correo Electrónico: ">
    </div>
</div>
<div class="form-group">
    <label for="password" class="col-sm-2 control-label">Contraseña: </label>
    <div class="col-sm-10">
        <input type="password" class="form-control" id="password" name="password" placeholder="*******">
        <p class="text-right text-muted">La contraseña solo se modifica si escribes algo!.</p>
    </div>
</div>
<div class="form-group">
    <label for="domicilio" class="col-sm-2 control-label">Domicilio: </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="domicilio" name="domicilio" value="<?php echo $domicilio;?>" placeholder="Domicilio: ">
    </div>
</div>
<div class="form-group">
    <label for="localidad" class="col-sm-2 control-label">Localidad: </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="localidad" name="localidad" value="<?php echo $localidad;?>" placeholder="Localidad: ">
    </div>
</div>
<div class="form-group">
    <label for="telefono" class="col-sm-2 control-label">Telefóno</label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="telefono" name="telefono" value="<?php echo $telefono;?>" placeholder="Telefóno">
    </div>
</div>
<div class="form-group">
    <label for="celular" class="col-sm-2 control-label">Celular: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="celular" name="celular" value="<?php echo $celular;?>" placeholder="Celular: ">
    </div>
</div>
<div class="form-group">
    <label for="registro" class="col-sm-2 control-label">Registro: </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="registro" name="registro" value="<?php echo $registro;?>" placeholder="Registro: ">
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
<div class="form-group">
<label for="permisos" class="col-sm-2 control-label">Permisos: </label>
<div class="col-sm-10">
    <ul style="list-style: none;" id="permisos">
        <?php 
            $rspta = mysqli_query($con, "SELECT * FROM permisos");

            $marcados = mysqli_query($con, "SELECT * FROM empleado_permisos WHERE idempleado=$id");
            $valores=array();

            while ($per = $marcados->fetch_object())
            {
                array_push($valores, $per->idpermiso);
            }

            while ($reg = $rspta->fetch_object())
            {
                $sw=in_array($reg->id,$valores)?'checked':'';
                echo '<li> <input id="checks" type="checkbox" '.$sw.'  name="permisos[]" value="'.$reg->id.'">'.$reg->nombre.'</li>';
            }
        ?>
    </ul>
</div>
</div>