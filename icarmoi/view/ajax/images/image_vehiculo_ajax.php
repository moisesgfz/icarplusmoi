<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../../config/config.php");

	$id=intval($_REQUEST['id']);
	$target_dir="../../resources/images/";
	$image_name = time()."_".basename($_FILES["imagefile"]["name"]);
	$target_file = $target_dir .$image_name ;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$imageFileZise=$_FILES["imagefile"]["size"];

	/* Inicio Validacion*/
	// Allow certain file formats
	if(($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) and $imageFileZise>0) {
	$errors[]= "<p>Lo sentimos, sólo se permiten archivos JPG , JPEG, PNG y GIF.</p>";
	} else if ($imageFileZise > 1048576) {//1048576 byte=1MB
	$errors[]= "<p>Lo sentimos, pero el archivo es demasiado grande. Selecciona logo de menos de 1MB</p>";
	} else if (empty($id)){
		$errors[]= "<p>ID del vehiculo está vacío.</p>";
	} else{
		/* Fin Validacion*/
		if ($imageFileZise>0){
		move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);
		$imagen=basename($_FILES["imagefile"]["name"]);
		$img_update="imagen='view/resources/images/$image_name' ";

		}else { $img_update="";}
		    $sql = "UPDATE vehiculo SET $img_update WHERE id='$id';";
		    $query_new_insert = mysqli_query($con,$sql);

    if ($query_new_insert) {
?>
		<img class="img-responsive" src="view/resources/images/<?php echo $image_name;?>" alt="Imagen del Vehiculo" data-toggle="modal" data-target="#myModal" style='cursor:pointer'>
		<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
				<div class="modal-content">
			 		<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">&nbsp;</h4>
			  		</div>
					<div class="modal-body">
						<img src="view/resources/images/<?php echo $image_name;?>" class="img-responsive">
					</div>
				</div>
		  	</div>
		</div>
		
	<?php
	    } else {
	        $errors[] = "Lo sentimos, actualización falló. Intente nuevamente. ".mysqli_error($con);
	    }
	}			
	?>
<?php 
	if (isset($errors)){
?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Error! </strong>
		<?php
		foreach ($errors as $error){
				echo $error;
			}
		?>
	</div>	
<?php
	}
?>
<?php 
	if (isset($messages)){
?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Aviso! </strong>
		<?php
		foreach ($messages as $message){
				echo $message;
			}
		?>
	</div>	
<?php
	}
?>
