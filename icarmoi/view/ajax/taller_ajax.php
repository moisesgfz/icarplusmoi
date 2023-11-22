<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");
	if (isset($_REQUEST["id"])){//codigo para eliminar 
	$id=$_REQUEST["id"];
	$id=intval($id);

	$query_validate=mysqli_query($con,"select * from reparaciones where idtaller='".$id."'");
	$count=mysqli_num_rows($query_validate);
	if ($count==0){

		if($delete=mysqli_query($con, "DELETE FROM taller WHERE id='$id'")){
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
	}else{
		$aviso="Aviso!";
		$msj="Error al eliminar los datos. El taller se encuentra vinculado con una reparacion";
		$classM="alert alert-danger";
		$times="&times;";
	}
}

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$tables="taller";
	$campos="*";
	$sWhere=" nombre LIKE '%".$query."%'";
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
	$reload = './taller-view.php';
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
                <th>Nombre</th>
                <th>Cuit</th>
                <th>Dirección</th>
                <th>Localidad</th>
                <th>Telefóno</th>
                <th>Celular</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th></th>
            </tr>
        </thead>
        <?php 
			$finales=0;
			while($row = mysqli_fetch_array($query)){	
				$id=$row['id'];
				$nombre=$row['nombre'];
				$cuit=$row['cuit'];
				$direccion=$row['direccion'];
				$localidad=$row['localidad'];
				$telefono=$row['telefono'];
				$celular=$row['celular'];
				$estado=$row['estado'];
				$created_at=$row['fecha_carga'];
				

				list($date,$hora)=explode(" ",$created_at);
				list($Y,$m,$d)=explode("-",$date);
				$fecha=$d."-".$m."-".$Y;


				if ($estado==1){
					$lbl_status="Activo";
					$lbl_class='label label-success';
				}else {
					$lbl_status="Inactivo";
					$lbl_class='label label-danger';
				}
				/*$kind=$row['kind'];*/
				
				$finales++;
		?>	
        <tbody>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $nombre ?></td>
                <td><?php echo $cuit ?></td>
                <td><?php echo $direccion ?></td>
                <td><?php echo $localidad ?></td>
                <td><?php echo $telefono ?></td>
                <td><?php echo $celular ?></td>
                <td><span class="<?php echo $lbl_class;?>"><?php echo $lbl_status;?></span></td>
                <td><?php echo $fecha ?></td>
                <td class="text-right">
                    <button type="button" class="btn btn-warning btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $id;?>');"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-square btn-xs" onclick="eliminar('<?php echo $id;?>')"><i class="fa fa-trash-o"></i></button>
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