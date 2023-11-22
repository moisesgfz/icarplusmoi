<?php
	//session_start();
	//$_SESSION['user_id']=1;
	if (isset($_SESSION['user_id'])) {

		unset($_SESSION['dashboard']);
		unset($_SESSION['empleados']);
		unset($_SESSION['taller']);
		unset($_SESSION['seguro']);
		unset($_SESSION['empresa']);
		unset($_SESSION['sector']);
		unset($_SESSION['vehiculo']);
		unset($_SESSION['tarjeta']);
		unset($_SESSION['reparaciones']);
		unset($_SESSION['choque']);
		unset($_SESSION['configuracion']);

		session_destroy();
		header("location: ./?view=index"); //estemos donde estemos nos redirije al index
	}

?>