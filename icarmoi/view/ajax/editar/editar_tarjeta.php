<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado	
    if (empty($_POST['numero'])){
            $errors[] = "Numero está vacío.";
        }  elseif (empty($_POST['vencimiento'])) {
            $errors[] = "Vencimiento está vacío.";
        }  elseif (empty($_POST['vehiculo'])) {
            $errors[] = "Vehiculo está vacío.";
        }  elseif (
            !empty($_POST['numero'])
            && !empty($_POST['vencimiento'])
            && !empty($_POST['vehiculo'])
        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

       // escaping, additionally removing everything that could be (html/javascript-) code
        $numero = mysqli_real_escape_string($con,(strip_tags($_POST["numero"],ENT_QUOTES)));
        $vencimiento = mysqli_real_escape_string($con,(strip_tags($_POST["vencimiento"],ENT_QUOTES)));
        $vehiculo = mysqli_real_escape_string($con,(strip_tags($_POST["vehiculo"],ENT_QUOTES)));
        $id=intval($_POST['id']);
	// UPDATE data into database
    $sql = "UPDATE tarjeta SET numero='".$numero."', vencimiento='".$vencimiento."', idvehiculo='".$vehiculo."' WHERE id='".$id."' ";
    $query = mysqli_query($con,$sql);

    if ($query) {
        $messages[] = "La Tarjeta ha sido actualizado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
    }
		
	} else {
		$errors[] = "desconocido.";
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