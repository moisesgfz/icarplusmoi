<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['id'])){
		$errors[] = "ID de la configuracion está vacío";
	} else if (empty($_POST['empresa'])){
		$errors[] = "Empresa está vacío";
	}else if (empty($_POST['actividad_economica'])){
		$errors[] = "Actividad Economica está vacío";
	} else if (empty($_POST['dni'])){
		$errors[] = "DNI está vacío";
	} else if (empty($_POST['email'])){
		$errors[] = "Correo Electronico está vacío";
	} else if (empty($_POST['telefono'])){
		$errors[] = "Telefono está vacío";
	}  elseif (
		!empty($_POST['empresa'])
		&& !empty($_POST['actividad_economica'])
		&& !empty($_POST['dni'])
		&& !empty($_POST['email'])
		&& !empty($_POST['telefono'])
		) {
	
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

		// escaping, additionally removing everything that could be (html/javascript-) code
		$id=intval($_POST['id']);
        $empresa = mysqli_real_escape_string($con,(strip_tags($_POST["empresa"],ENT_QUOTES)));
		$actividad_economica = mysqli_real_escape_string($con,(strip_tags($_POST["actividad_economica"],ENT_QUOTES)));
		$dni= mysqli_real_escape_string($con,(strip_tags($_POST["dni"],ENT_QUOTES)));
		$email= mysqli_real_escape_string($con,$_POST["email"]);
		$telefono= mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
			
		// update data
        $sql = "UPDATE configuracion SET nombre='".$empresa."', dni='".$dni."', actividad_economica='".$actividad_economica."', email='".$email."', telefono='".$telefono."' WHERE id='$id' ";
        $query = mysqli_query($con,$sql);

        // if user has been update successfully
        if ($query) {
            $messages[] = "Los datos han sido actualizados exitosamente.";
			//print ("<script>window.location='./?view=vehiculos';</script>");
        } else {
            $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo. ".mysqli_error($con);
        }
            
		
	} else {
		$errors[] = " Desconocido";	
	}
	if (isset($errors)){
		
		?>
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Error!</strong> 
				<?php
					foreach ($errors as $error) {
							echo $error;
						}
					?>
		</div>
		<?php
		}
		if (isset($messages)){
			
			?>
			<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>¡Bien hecho!</strong>
					<?php
						foreach ($messages as $message) {
								echo $message;
							}
						?>
			</div>
			<?php
		}
?>			