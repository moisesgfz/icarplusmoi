<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado	
    if (empty($_POST['nombre'])){
            $errors[] = "Nombre está vacío.";
        }  elseif (empty($_POST['poliza'])) {
            $errors[] = "Poliza está vacío.";
        }  elseif (empty($_POST['vencimiento'])) {
            $errors[] = "Vencimiento está vacío.";
        }  elseif (
            !empty($_POST['nombre'])
            && !empty($_POST['poliza'])
            && !empty($_POST['vencimiento'])
        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

       // escaping, additionally removing everything that could be (html/javascript-) code
        $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
        $poliza = mysqli_real_escape_string($con,(strip_tags($_POST["poliza"],ENT_QUOTES)));
        $vencimiento = mysqli_real_escape_string($con,(strip_tags($_POST["vencimiento"],ENT_QUOTES)));
        $id=intval($_POST['id']);
	// UPDATE data into database
    $sql = "UPDATE seguro SET nombre='".$nombre."', poliza='".$poliza."', vencimiento='".$vencimiento."' WHERE id='".$id."' ";
    $query = mysqli_query($con,$sql);

    if ($query) {
        $messages[] = "El Seguro ha sido actualizado con éxito.";
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