<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");
	if (isset($_REQUEST["id"])){//codigo para eliminar 
	$id=$_REQUEST["id"];
	$id=intval($id);

	if($delete=mysqli_query($con, "DELETE FROM choque WHERE id='$id'")){
		$aviso="Bien hecho!";
		$msj="Datos eliminados satisfactoriamente.";
		$classM="alert alert-success";
		$times="&times;";	
	}else{
		$aviso="Aviso!";
		$msj="Error al eliminar los datos ".mysqli_error($con);
		$classM="alert alert-danger";
		$times="&times;";					
	}

		
}

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$tables="choque";
	$campos="*";
	$sWhere=" fecha_choque LIKE '%".$query."%' and idvehiculo>0";
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	$reload = './choques-view.php';
	//main query to fetch the data
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data
	
	if (isset($_REQUEST["id"])){
?>
		<div class="<?php echo $classM;?>">
			<button type="button" class="close" data-dismiss="alert"><?php echo $times;?></button>
			<strong><?php echo $aviso?> </strong>
			<?php echo $msj;?>
		</div>	
<?php
	}
	if ($numrows>0){
?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Fecha Choque</th>
                <th>Vehiculo</th>
                <th>Empleado</th>
                <th>Dni</th>
                <th>Seguro</th>
                <th>Celular</th>
                <th>Fecha Carga</th>
                <th></th>
            </tr>
        </thead>
        <?php 
			$finales=0;
			while($row = mysqli_fetch_array($query)){	
				$id=$row['id'];
				$choque_code=$row['choque_code'];
				$fecha_choque=$row['fecha_choque'];

				$idvehiculo=$row['idvehiculo'];
				$vehiculos=mysqli_query($con, "select * from vehiculo where id=$idvehiculo and estado=1");
				$rw_vehiculo=mysqli_fetch_array($vehiculos);
				$patente_vehiculo=$rw_vehiculo['patente'];

				$idempleado=$row['idempleado'];
				$empleados=mysqli_query($con, "select * from empleado where id=$idempleado and status=1");
				$rw_empleado=mysqli_fetch_array($empleados);
				$nombre_empleado=$rw_empleado['nombre']." ".$rw_empleado['apellido'];

				$descripcion=$row['descripcion'];
				$nombre_ter=$row['nombre_ter'];
				$dni_ter=$row['dni_ter'];
				$registro_ter=$row['registro_ter'];
				$domicilio_ter=$row['domicilio_ter'];
				$localidad_ter=$row['localidad_ter'];
				$patente_ter=$row['patente_ter'];
				$marca_modelo_ter=$row['marca_modelo_ter'];
				$color_ter=$row['color_ter'];
				$seguro_ter=$row['seguro_ter'];
				$poliza_ter=$row['poliza_ter'];
				$telefono_ter=$row['telefono_ter'];
				$celular_ter=$row['celular_ter'];
				$fecha_carga=$row['fecha_carga'];
				$foto1=$row['foto1'];
				$foto2=$row['foto2'];
				$foto3=$row['foto3'];
				$foto4=$row['foto4'];

				list($date)=explode(" ",$fecha_choque);
				list($Y,$m,$d)=explode("-",$date);
				$fecha_choques=$d."-".$m."-".$Y;

				list($date,$hora)=explode(" ",$fecha_carga);
				list($Y,$m,$d)=explode("-",$date);
				$fecha_cargas=$d."-".$m."-".$Y;
				
				$finales++;
		?>	
        <tbody>
            <tr>
                <td><?php echo $choque_code ?></td>
                <td><?php echo $fecha_choques ?></td>
                <td><?php echo $patente_vehiculo ?></td>
                <td><?php echo $nombre_empleado ?></td>
                <td><?php echo $dni_ter ?></td>
                <td><?php echo $seguro_ter ?></td>
                <td><?php echo $celular_ter ?></td>
                <td><?php echo $fecha_cargas ?></td>
                <td class="text-right">

					<a style="color: white;" class="btn btn-warning btn-square btn-xs" href="./?view=editar_choque&id=<?php echo $id;?>"><i class='fa fa-edit'></i></a>

                    <button type="button" class="btn btn-danger btn-square btn-xs" onclick="eliminar('<?php echo $id;?>')"><i class="fa fa-trash-o"></i></button>

                    <!-- <button type="button" class="btn btn-info btn-square btn-xs" data-toggle="modal" data-target="#modal_show" onclick="mostrar('<?php echo $id;?>')"><i class="fa fa-eye"></i></button> -->
                    
                </td>
            </tr>
        </tbody>
        <?php }?>	
        <tfoot>
            <tr>
				<td colspan='10'> 
					<?php 
						$inicios=$offset+1;
						$finales+=$inicios -1;
						echo "Mostrando $inicios al $finales de $numrows registros";
						echo paginate($reload, $page, $total_pages, $adjacents);
					?>
				</td>
			</tr>
		</tfoot>
    </table>
<?php	
	}else{
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Sin Resultados!</strong> No se encontraron resultados en la base de datos!.</div>';
	}
}
?>