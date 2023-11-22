<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado	
	if (empty($_POST['dni'])){
			$errors[] = "DNI está vacío.";
		}  elseif (empty($_POST['nombre'])) {
            $errors[] = "Nombre está vacío.";
        }  elseif (empty($_POST['apellido'])) {
            $errors[] = "Apellido está vacío.";
        }  elseif (empty($_POST['usuario'])) {
            $errors[] = "Usuario está vacío.";
        }  elseif (empty($_POST['email'])) {
            $errors[] = "Correo Electronico está vacío.";
        }/*  elseif (empty($_POST['password'])) {
            $errors[] = "Contraseña está vacío.";
        }*/  elseif (empty($_POST['domicilio'])) {
            $errors[] = "Domicilio está vacío.";
        }  elseif (empty($_POST['localidad'])) {
            $errors[] = "Localidad está vacío.";
        }  elseif (empty($_POST['telefono'])) {
            $errors[] = "Telefono está vacío.";
        }  elseif (empty($_POST['celular'])) {
            $errors[] = "Celular está vacío.";
        }  elseif (empty($_POST['registro'])) {
            $errors[] = "Registro está vacío.";
        }  /* elseif (empty($_POST['estado'])) {
            $errors[] = "Estado está vacío.";
        } elseif (empty($_POST['kind'])) {
            $errors[] = "Kind está vacío.";
        }*/ elseif (
        	!empty($_POST['dni'])
        	&& !empty($_POST['nombre'])
        	&& !empty($_POST['apellido'])
			&& !empty($_POST['usuario'])
			&& !empty($_POST['email'])
			/*&& !empty($_POST['password'])*/
			&& !empty($_POST['domicilio'])
			&& !empty($_POST['localidad'])
			&& !empty($_POST['telefono'])
			&& !empty($_POST['celular'])
			&& !empty($_POST['registro'])
			// && !empty($_POST['estado'])
			/*&& !empty($_POST['kind'])*/
        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

	// escaping, additionally removing everything that could be (html/javascript-) code
    $dni = mysqli_real_escape_string($con,(strip_tags($_POST["dni"],ENT_QUOTES)));
    $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
    $apellido = mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
    $usuario = mysqli_real_escape_string($con,(strip_tags($_POST["usuario"],ENT_QUOTES)));
    $email = mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));

    $password=sha1(md5(mysqli_real_escape_string($con,(strip_tags($_POST["password"],ENT_QUOTES)))));

    $domicilio = mysqli_real_escape_string($con,(strip_tags($_POST["domicilio"],ENT_QUOTES)));
    $localidad = mysqli_real_escape_string($con,(strip_tags($_POST["localidad"],ENT_QUOTES)));
    $telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
    $celular = mysqli_real_escape_string($con,(strip_tags($_POST["celular"],ENT_QUOTES)));
    $registro = mysqli_real_escape_string($con,(strip_tags($_POST["registro"],ENT_QUOTES)));
    // $estado = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));
	$id=intval($_POST['id']);
	// UPDATE data into database
    $sql = "UPDATE empleado SET dni='".$dni."', nombre='".$nombre."', apellido='".$apellido."', username='".$usuario."', email='".$email."', domicilio='".$domicilio."', localidad='".$localidad."', telefono='".$telefono."', celular='".$celular."', registro='".$registro."' WHERE id='".$id."' ";
    $query = mysqli_query($con,$sql);

    //Verifico que el campo de la contraseña no este vacia by Amner Saucedo Sosa
    if(!empty(($password))){
    	$sql_password = "UPDATE empleado SET password='".$password."' WHERE id='".$id."' ";
    	$query_password = mysqli_query($con,$sql_password);
    }

    if ($query) {
        $messages[] = "El empleado ha sido actualizado con éxito.";
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