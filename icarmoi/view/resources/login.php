<?php
	session_start();

	/*if (isset($_POST['token']) && $_POST['token']!=='') {*/
			
	//Contiene las variables de configuracion para conectar a la base de datos
	include "../../config/config.php";

	$email=mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
	$password=sha1(md5(mysqli_real_escape_string($con,(strip_tags($_POST["password"],ENT_QUOTES)))));

    $query = mysqli_query($con,"SELECT * FROM empleado WHERE username=\"$email\" OR email =\"$email\" AND password = \"$password\";");

		if ($row = mysqli_fetch_array($query)) {
			
				//$marcados = $user->list_mark($fetch->iduser);
				$idempleado=intval($row['id']);
				$marcados=mysqli_query($con, "SELECT * FROM empleado_permisos WHERE idempleado=$idempleado");
				$valores=array();

				while ($per = mysqli_fetch_object($marcados))
				{
					array_push($valores, $per->idpermiso);
				}

				in_array(1,$valores)?$_SESSION['dashboard']=1:$_SESSION['dashboard']=0;
				in_array(2,$valores)?$_SESSION['empleados']=1:$_SESSION['empleados']=0;
				in_array(3,$valores)?$_SESSION['taller']=1:$_SESSION['taller']=0;
				in_array(4,$valores)?$_SESSION['seguro']=1:$_SESSION['seguro']=0;
				in_array(5,$valores)?$_SESSION['empresa']=1:$_SESSION['empresa']=0;
				in_array(6,$valores)?$_SESSION['sector']=1:$_SESSION['sector']=0;
				in_array(7,$valores)?$_SESSION['vehiculo']=1:$_SESSION['vehiculo']=0;
				in_array(8,$valores)?$_SESSION['tarjeta']=1:$_SESSION['tarjeta']=0;
				in_array(9,$valores)?$_SESSION['reparaciones']=1:$_SESSION['reparaciones']=0;
				in_array(10,$valores)?$_SESSION['choque']=1:$_SESSION['choque']=0;
				in_array(11,$valores)?$_SESSION['configuracion']=1:$_SESSION['configuracion']=0;

				$_SESSION['user_id'] = $idempleado;
				if($_SESSION['dashboard']==1){
					header("location: ../../?view=dashboard");
				}else{
					header("location: ../../?view=perfil");
				}
				

		}else{
			header("location: ../../index.php?invalid");
			//echo mysqli_error($con);
		}
	/*}else{
		//header("location: ../../");
	}*/

?>