<?php 
    $active8="active";
    include "resources/header.php";

    if ($_SESSION['vehiculo']==1){

        $vehiculo_code=time()."-".$_SESSION['user_id'];
        $created_at=date("Y-m-d H:i:s");
        $target_dir="view/resources/images/vehiculo.png";
        $inser=mysqli_query($con,"INSERT INTO vehiculo (id, vehiculo_code, patente, marca, modelo, nro_chasis, nro_motor, vto_vtv, idseguro, color, estado, imagen, fecha_carga) VALUES (NULL, '$vehiculo_code', '', '', '', '', '', '', '0', '','1','$target_dir', '$created_at'); ");
        $sql_vehiculo=mysqli_query($con,"select * from vehiculo where  vehiculo_code='$vehiculo_code'");
        $rw_vehiculo=mysqli_fetch_array($sql_vehiculo);
        $id_vehiculo=$rw_vehiculo['id'];
        
        $count=mysqli_query($con,"select count(*) as total from vehiculo where idseguro>0");
        $rw=mysqli_fetch_array($count);
        $vehiculo_codes=$rw['total']+1;

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
                            <li class="active">Nuevo Vehiculo</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <br>
                    <h1 class="h1">Nuevo Vehiculo</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img">
                                <img class=" img-responsive" src="view/resources/images/vehiculo.png" alt="Bussines profile picture">
                            </div>
                            <h3 class="profile-username text-center">Imagen</h3>
                            <p class="text-muted text-center mail-text"></p>
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

                                <input type="hidden" class="form-control" id="vehiculo_code" name="vehiculo_code"  value="<?php echo $vehiculo_codes;?>" >
                                <input type="hidden"  id="id" name="id"  value="<?php echo $id_vehiculo;?>" >

                                <div class="form-group">
                                    <label for="patente" class="col-sm-2 control-label">Patente: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="patente" class="form-control" id="patente" placeholder="Patente: ">
                                    </div>
                                    <label for="marca" class="col-sm-2 control-label">Marca: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="marca" class="form-control" id="marca" placeholder="Marca: ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="modelo" class="col-sm-2 control-label">Modelo: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="modelo" class="form-control" id="modelo" placeholder="Modelo: ">
                                    </div>
                                    <label for="chasis" class="col-sm-2 control-label">Chasis: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="chasis" class="form-control" id="chasis" placeholder="Numero Chasis: ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="motor" class="col-sm-2 control-label">Motor: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="motor" class="form-control" id="motor" placeholder="Numero Motor: ">
                                    </div>
                                    <label for="vto_vtv" class="col-sm-2 control-label">Vto Vtv: </label>
                                    <div class="col-sm-4">
                                        <input type="date" required name="vto_vtv" class="form-control" id="vto_vtv" placeholder="Vto Vtv: ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="seguro" class="col-sm-2 control-label">Seguro: </label>
                                    <div class="col-sm-4">
                                        <select class="form-control selectpicker" data-live-search="true" name="seguro" id="seguro" required>
                                            <!-- <option value="">Selecciona</option> -->
                                            <?php 
                                                $sql=mysqli_query($con,"select *  from seguro order by nombre");
                                                while ($rw=mysqli_fetch_array($sql)){
                                                    $id=$rw['id'];
                                                    $nombre=$rw['nombre'];
                                                ?>
                                                <option value="<?php echo $id;?>"><?php echo $nombre;?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>    
                                    </div>
                                    <label for="estado" class="col-sm-2 control-label">Estado: </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="estado" id="estado" required>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="color" class="col-sm-2 control-label">Color: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="color" class="form-control" id="color" placeholder="Color: ">
                                    </div>
                                    <label for="imagefile" class="col-sm-2 control-label">Imagen: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile" class="form-control" id="imagefile" onchange="upload_image(<?php echo $id_vehiculo; ?>);">
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
    function upload_image(id_vehiculo){
            $("#load_img").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile',file);
            data.append('id',id_vehiculo);
            
            
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