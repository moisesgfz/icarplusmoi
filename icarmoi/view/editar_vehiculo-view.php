<?php 
    $active8="active";
    include "resources/header.php";

    if ($_SESSION['vehiculo']==1){
    
        if (isset($_GET['id'])){
            $vehiculo_id=intval($_GET['id']);
            $sql_vehiculo=mysqli_query($con,"select * from vehiculo where id='$vehiculo_id'");
            $count=mysqli_num_rows($sql_vehiculo);
            $rw=mysqli_fetch_array($sql_vehiculo);

            $vehiculo_code=$rw['vehiculo_code'];
            $patente=$rw['patente'];
            $marca=$rw['marca'];
            $modelo=$rw['modelo'];
            $nro_chasis=$rw['nro_chasis'];
            $nro_motor=$rw['nro_motor'];
            $vto_vtv=$rw['vto_vtv'];
            $idseguro=$rw['idseguro'];
            $color=$rw['color'];
            $estado=$rw['estado'];
            $imagen=$rw['imagen'];
            $fecha_carga=$rw['fecha_carga'];
        }
        
        if (!isset($_GET['id']) or $count!=1){
            header("location: ./?view=vehiculos");
        }

?>
    <!--main content start-->
    <section class="main-content-wrapper">
        <section id="main-content">
            <div class="row">
                <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb  pull-right">
                            <li><a href="./?view=dashboard">Dashboard</a></li>
                            <li class=""><a href="./?view=vehiculos">Vehiculos</a></li>
                            <li class="active">Editar Vehiculo</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <br>
                    <h1 class="h1">Editar Vehiculo</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img">
                                <img class=" img-responsive" src="<?php echo  $imagen;?>" alt="Foto del Vehiculo" data-toggle="modal" data-target="#myModal" style='cursor:pointer'>
                            </div>
                            <h3 class="profile-username text-center"><?php echo $patente;?></h3>
                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">&nbsp;</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo $imagen;?>" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div id="resultados_ajax"></div><!-- resultados ajax -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos del Vehiculo</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>

                        <div class="panel-body">

                            <form class="form-horizontal" role="form" name="update_register" id="update_register" method="post" enctype="multipart/form-data">

                                <input type="hidden" class="form-control" id="vehiculo_code" name="vehiculo_code"  value="<?php echo $vehiculo_code;?>" >
                                <input type="hidden"  id="id" name="id"  value="<?php echo $vehiculo_id;?>" >

                                <div class="form-group">
                                    <label for="patente" class="col-sm-2 control-label">Patente: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="patente" class="form-control" id="patente" placeholder="Patente: " value="<?php echo $patente ?>">
                                    </div>
                                    <label for="marca" class="col-sm-2 control-label">Marca: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="marca" class="form-control" id="marca" placeholder="Marca: " value="<?php echo $marca ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="modelo" class="col-sm-2 control-label">Modelo: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="modelo" class="form-control" id="modelo" placeholder="Modelo: " value="<?php echo $modelo ?>">
                                    </div>
                                    <label for="chasis" class="col-sm-2 control-label">Chasis: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="chasis" class="form-control" id="chasis" placeholder="Numero Chasis: " value="<?php echo $nro_chasis ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="motor" class="col-sm-2 control-label">Motor: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="motor" class="form-control" id="motor" placeholder="Numero Motor: " value="<?php echo $nro_motor ?>">
                                    </div>
                                    <label for="vto_vtv" class="col-sm-2 control-label">Vto Vtv: </label>
                                    <div class="col-sm-4">
                                        <input type="date" required name="vto_vtv" class="form-control" id="vto_vtv" placeholder="Vto Vtv: " value="<?php echo $vto_vtv ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="seguro" class="col-sm-2 control-label">Seguro: </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="seguro" id="seguro" required>
                                            <option value="">Selecciona</option>
                                            <?php 
                                                $sql=mysqli_query($con,"select *  from seguro order by nombre");
                                                while ($rw=mysqli_fetch_array($sql)){
                                                    $idsegu=$rw['id'];
                                                    $nombre=$rw['nombre'];
                                                    if ($idseguro==$idsegu){$selected1="selected";}else{$selected1="";}
                                                ?>
                                                <option value="<?php echo $idsegu;?>" <?php echo $selected1;?>><?php echo $nombre;?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>    
                                    </div>
                                    <label for="estado" class="col-sm-2 control-label">Estado: </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="estado" id="estado" required>
                                            <option value="1" <?php if ($estado==1){echo "selected";}?>>Activo</option>
                                            <option value="2" <?php if ($estado==0){echo "selected";}?>>Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="color" class="col-sm-2 control-label">Color: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="color" class="form-control" id="color" placeholder="Color: " value="<?php echo $color ?>">
                                    </div>
                                    <label for="imagefile" class="col-sm-2 control-label">Imagen: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile" class="form-control" id="imagefile" onchange="upload_image(<?php echo $vehiculo_id; ?>);">
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary actualizar_datos">Guardar datos</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>       

        </section>
    </section><!--main content end-->
<?php  include "resources/footer.php" ?>
<script>
    function upload_image(vehiculo_id){
            $("#load_img").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile',file);
            data.append('id',vehiculo_id);
            
            $.ajax({
                url: "view/ajax/images/image_vehiculo_ajax.php",        // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $("#load_img").html(data);
                    
                }
            });
            
        }
</script>
<script>
    $( "#update_register" ).submit(function( event ) {
      $('.actualizar_datos').attr("disabled", true);
      var parametros = $(this).serialize();
      $.ajax({
            type: "POST",
            url: "view/ajax/agregar/actualizar_vehiculo.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#resultados_ajax").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#resultados_ajax").html(datos);
            $('.actualizar_datos').attr("disabled", false);
            window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();});}, 5000);
            
          }
    });     
      event.preventDefault();
    });
</script>
<?php     
    }else{
      require 'resources/acceso_prohibido.php';
    }
    ob_end_flush(); 
?>