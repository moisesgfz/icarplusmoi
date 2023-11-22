<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['id'])){
		$errors[] = "ID del choque está vacío";
	} else if (empty($_POST['choque_code'])){
		$errors[] = "Código del choque está vacío";
	}else if (empty($_POST['fecha_choque'])){
		$errors[] = "Fecha está vacío";
	} else if (empty($_POST['vehiculo'])){
		$errors[] = "Vehiculo está vacío";
	} else if (empty($_POST['empleado'])){
		$errors[] = "Empleado está vacío";
	} else if (empty($_POST['descripcion'])){
		$errors[] = "Descripcion está vacío";
	} else if (empty($_POST['nombre'])){
		$errors[] = "Nombre está vacío";
	} else if (empty($_POST['dni'])){
		$errors[] = "DNI está vacío";
	}  else if (empty($_POST['registro'])){
		$errors[] = "Registro está vacío";
	}  else if (empty($_POST['domicilio'])){
		$errors[] = "Domicilio está vacío";
	}   else if (empty($_POST['localidad'])){
		$errors[] = "Localidad está vacío";
	}  else if (empty($_POST['patente'])){
		$errors[] = "Patente está vacío";
	}   else if (empty($_POST['marca_modelo'])){
		$errors[] = "Marca Modelo está vacío";
	}   else if (empty($_POST['color'])){
		$errors[] = "Color está vacío";
	}   else if (empty($_POST['seguro'])){
		$errors[] = "Seguro está vacío";
	}   else if (empty($_POST['poliza'])){
		$errors[] = "Poliza está vacío";
	}   else if (empty($_POST['telefono'])){
		$errors[] = "telefono está vacío";
	}   else if (empty($_POST['celular'])){
		$errors[] = "Celular está vacío";
	}  elseif (
		!empty($_POST['id'])
		&& !empty($_POST['choque_code'])
		&& !empty($_POST['fecha_choque'])
		&& !empty($_POST['vehiculo'])
		&& !empty($_POST['empleado'])
		&& !empty($_POST['descripcion'])
		&& !empty($_POST['nombre'])
		&& !empty($_POST['dni'])
		&& !empty($_POST['registro'])
		&& !empty($_POST['domicilio'])
		&& !empty($_POST['patente'])
		&& !empty($_POST['marca_modelo'])
		&& !empty($_POST['color'])
		&& !empty($_POST['seguro'])
		&& !empty($_POST['poliza'])
		&& !empty($_POST['telefono'])
		&& !empty($_POST['celular'])
		) {
	
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

		// escaping, additionally removing everything that could be (html/javascript-) code
		$id=intval($_POST['id']);
        $choque_code = mysqli_real_escape_string($con,(strip_tags($_POST["choque_code"],ENT_QUOTES)));
		$fecha_choque = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_choque"],ENT_QUOTES)));
		$vehiculo= mysqli_real_escape_string($con,(strip_tags($_POST["vehiculo"],ENT_QUOTES)));
		$empleado= mysqli_real_escape_string($con,$_POST["empleado"]);
		$descripcion= mysqli_real_escape_string($con,(strip_tags($_POST["descripcion"],ENT_QUOTES)));
		$nombre= mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$dni= mysqli_real_escape_string($con,(strip_tags($_POST["dni"],ENT_QUOTES)));
		$registro= mysqli_real_escape_string($con,(strip_tags($_POST["registro"],ENT_QUOTES)));
		$domicilio= mysqli_real_escape_string($con,(strip_tags($_POST["domicilio"],ENT_QUOTES)));
		$localidad= mysqli_real_escape_string($con,(strip_tags($_POST["localidad"],ENT_QUOTES)));
		$patente= mysqli_real_escape_string($con,(strip_tags($_POST["patente"],ENT_QUOTES)));
		$marca_modelo= mysqli_real_escape_string($con,(strip_tags($_POST["marca_modelo"],ENT_QUOTES)));
		$color= mysqli_real_escape_string($con,(strip_tags($_POST["color"],ENT_QUOTES)));
		$seguro= mysqli_real_escape_string($con,(strip_tags($_POST["seguro"],ENT_QUOTES)));
		$poliza= mysqli_real_escape_string($con,(strip_tags($_POST["poliza"],ENT_QUOTES)));
		$telefono= mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$celular= mysqli_real_escape_string($con,(strip_tags($_POST["celular"],ENT_QUOTES)));
			
		// update data
        $sql = "UPDATE choque SET choque_code='".$choque_code."', fecha_choque='".$fecha_choque."', idvehiculo='".$vehiculo."', idempleado='".$empleado."', descripcion='".$descripcion."',nombre_ter='".$nombre."', dni_ter='".$dni."', registro_ter='".$registro."', domicilio_ter='".$domicilio."', localidad_ter='".$localidad."', patente_ter='".$patente."', marca_modelo_ter='".$marca_modelo."', color_ter='".$color."', seguro_ter='".$seguro."', poliza_ter='".$poliza."', telefono_ter='".$telefono."', celular_ter='".$patente."' WHERE id='$id' ";
        $query = mysqli_query($con,$sql);

        // if user has been update successfully
        if ($query) {
            $messages[] = "Los datos han sido procesados exitosamente.";
			//print ("<script>window.location='./?view=choques';</script>");
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