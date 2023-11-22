<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['id'])){
		$errors[] = "ID del vehiculo está vacío";
	} else if (empty($_POST['vehiculo_code'])){
		$errors[] = "Código del vehiculo está vacío";
	}else if (empty($_POST['patente'])){
		$errors[] = "Patente del vehiculo está vacío";
	} else if (empty($_POST['marca'])){
		$errors[] = "Marca está vacío";
	} else if (empty($_POST['modelo'])){
		$errors[] = "Modelo está vacío";
	} else if (empty($_POST['chasis'])){
		$errors[] = "Numero Chasis está vacío";
	} else if (empty($_POST['motor'])){
		$errors[] = "Numero Motor está vacío";
	} else if (empty($_POST['vto_vtv'])){
		$errors[] = "Vto Vtv está vacío";
	}  else if (empty($_POST['seguro'])){
		$errors[] = "Seguro está vacío";
	}  else if (empty($_POST['estado'])){
		$errors[] = "Estado está vacío";
	}   else if (empty($_POST['color'])){
		$errors[] = "Color está vacío";
	}  elseif (
		!empty($_POST['vehiculo_code'])
		&& !empty($_POST['patente'])
		&& !empty($_POST['marca'])
		&& !empty($_POST['modelo'])
		&& !empty($_POST['chasis'])
		&& !empty($_POST['motor'])
		&& !empty($_POST['vto_vtv'])
		&& !empty($_POST['seguro'])
		&& !empty($_POST['estado'])
		&& !empty($_POST['color'])
		) {
	
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

		// escaping, additionally removing everything that could be (html/javascript-) code
		$id=intval($_POST['id']);
        $vehiculo_code = mysqli_real_escape_string($con,(strip_tags($_POST["vehiculo_code"],ENT_QUOTES)));
		$patente = mysqli_real_escape_string($con,(strip_tags($_POST["patente"],ENT_QUOTES)));
		$marca= mysqli_real_escape_string($con,(strip_tags($_POST["marca"],ENT_QUOTES)));
		$modelo= mysqli_real_escape_string($con,$_POST["modelo"]);
		$chasis= mysqli_real_escape_string($con,(strip_tags($_POST["chasis"],ENT_QUOTES)));
		$motor= mysqli_real_escape_string($con,(strip_tags($_POST["motor"],ENT_QUOTES)));
		$vto_vtv= mysqli_real_escape_string($con,(strip_tags($_POST["vto_vtv"],ENT_QUOTES)));
		$seguro=intval($_POST['seguro']);
		$estado= mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));
		$color= mysqli_real_escape_string($con,(strip_tags($_POST["color"],ENT_QUOTES)));
			
		// update data
        $sql = "UPDATE vehiculo SET vehiculo_code='".$vehiculo_code."', patente='".$patente."', marca='".$marca."', modelo='".$modelo."', nro_chasis='".$chasis."',nro_motor='".$motor."', vto_vtv='".$vto_vtv."', idseguro='".$seguro."', color='".$color."', estado='".$estado."' WHERE id='$id' ";
        $query = mysqli_query($con,$sql);

        // if user has been update successfully
        if ($query) {
            $messages[] = "Los datos han sido procesados exitosamente.";
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