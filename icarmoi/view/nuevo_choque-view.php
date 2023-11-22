<?php 
    $active11="active";
    include "resources/header.php";

    if ($_SESSION['choque']==1){
        
        $choque_code=time()."-".$_SESSION['user_id'];
        $created_at=date("Y-m-d H:i:s");
        $target_dir="view/resources/images/choques.png";
        $insert=mysqli_query($con,"INSERT INTO choque (id, choque_code, fecha_choque, idvehiculo, idempleado, descripcion, nombre_ter, dni_ter, registro_ter, domicilio_ter, localidad_ter, patente_ter, marca_modelo_ter, color_ter, seguro_ter, poliza_ter, telefono_ter, celular_ter, fecha_carga, foto1, foto2, foto3, foto4) VALUES (NULL, '$choque_code', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '$created_at','$target_dir','$target_dir','$target_dir','$target_dir' ); ");
        $sql_choque=mysqli_query($con,"select * from choque where  choque_code='$choque_code'");
        $rw_choque=mysqli_fetch_array($sql_choque);
        $id_choque=$rw_choque['id'];
        
        $count=mysqli_query($con,"select count(*) as total from choque where idvehiculo>0");
        $rw=mysqli_fetch_array($count);
        $choques_codes=$rw['total']+1;

?>
    <!--main content start-->
    <section class="main-content-wrapper">
        <section id="main-content">
            <div class="row">
                <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb  pull-right">
                            <li><a href="./?view=dashboard">Dashboard</a></li>
                            <li class=""><a href="./?view=choques">Choques</a></li>
                            <li class="active">Nuevo Choque</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <br>
                    <h1 class="h1">Nuevo Choque</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img">
                                <img class=" img-responsive" src="view/resources/images/choques.png" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img2">
                                <img class=" img-responsive" src="view/resources/images/choques.png" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img3">
                                <img class=" img-responsive" src="view/resources/images/choques.png" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img4">
                                <img class=" img-responsive" src="view/resources/images/choques.png" alt="Fotos">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div id="resultados_ajax"></div><!-- resultados ajax -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos del Choque</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>

                        <div class="panel-body">

                            <form class="form-horizontal" role="form" name="update_register" id="update_register" method="post" enctype="multipart/form-data">

                                <input type="hidden" class="form-control" id="choque_code" name="choque_code"  value="<?php echo $choques_codes;?>" >
                                <input type="hidden"  id="id" name="id"  value="<?php echo $id_choque;?>" >

                                <div class="form-group">
                                    <label for="fecha_choque" class="col-sm-2 control-label">Fecha Choque: </label>
                                    <div class="col-sm-4">
                                        <input type="date" required name="fecha_choque" class="form-control" id="fecha_choque" placeholder="Fecha Choque: ">
                                    </div>
                                    <label for="vehiculo" class="col-sm-2 control-label">Vehiculo: </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="vehiculo" id="vehiculo" required>
                                            <?php 
                                                $sql_vehiculos=mysqli_query($con,"select *  from vehiculo where estado=1 order by patente");
                                                while ($rw=mysqli_fetch_array($sql_vehiculos)){
                                                    $id_vehiculo=$rw['id'];
                                                    $patente=$rw['patente'];
                                                ?>
                                                <option value="<?php echo $id_vehiculo;?>"><?php echo $patente;?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="empleado" class="col-sm-2 control-label">Empleado: </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="empleado" id="empleado" required>
                                            <?php 
                                                $sql_empleados=mysqli_query($con,"select * from empleado where status=1 order by nombre");
                                                while ($rw=mysqli_fetch_array($sql_empleados)){
                                                    $idempleado=$rw['id'];
                                                    $nombre_empleado=$rw['nombre']." ".$rw['apellido'];
                                                ?>
                                                <option value="<?php echo $idempleado;?>"><?php echo $nombre_empleado;?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>    
                                    </div>
                                    <label for="descripcion" class="col-sm-2 control-label">Descripción: </label>
                                    <div class="col-sm-4">
                                        <textarea type="text" required name="descripcion" class="form-control" id="descripcion" placeholder="Descripción: "></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nombre" class="col-sm-2 control-label">Nombre : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="nombre" class="form-control" id="nombre" placeholder="Nombre : ">
                                    </div>
                                    <label for="dni" class="col-sm-2 control-label">Dni : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="dni" class="form-control" id="dni" placeholder="Dni : ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="registro" class="col-sm-2 control-label">Registro : </label>
                                    <div class="col-sm-4">
                                        <input type="date" required name="registro" class="form-control" id="registro" placeholder="Registro : ">
                                    </div>
                                    <label for="domicilio" class="col-sm-2 control-label">Domicilio : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="domicilio" class="form-control" id="domicilio" placeholder="Domicilio : ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="localidad" class="col-sm-2 control-label">Localidad : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="localidad" class="form-control" id="localidad" placeholder="Localidad : ">
                                    </div>
                                    <label for="patente" class="col-sm-2 control-label">Patente : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="patente" class="form-control" id="patente" placeholder="Patente : ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="marca_modelo" class="col-sm-2 control-label">Marca Modelo : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="marca_modelo" class="form-control" id="marca_modelo" placeholder="Marca Modelo : ">
                                    </div>
                                    <label for="color" class="col-sm-2 control-label">Color : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="color" class="form-control" id="color" placeholder="Color : ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="seguro" class="col-sm-2 control-label">Seguro : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="seguro" class="form-control" id="seguro" placeholder="Seguro : ">
                                    </div>
                                    <label for="poliza" class="col-sm-2 control-label">Poliza : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="poliza" class="form-control" id="poliza" placeholder="Poliza : ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefono" class="col-sm-2 control-label">Telefono : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="telefono" class="form-control" id="telefono" placeholder="Telefono : ">
                                    </div>
                                    <label for="celular" class="col-sm-2 control-label">Celular : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="celular" class="form-control" id="celular" placeholder="Celular : ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="imagefile" class="col-sm-2 control-label">Foto 1: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile" class="form-control" id="imagefile" onchange="upload_foto1(<?php echo $id_choque; ?>);">
                                    </div>
                                    <label for="imagefile2" class="col-sm-2 control-label">Foto 2: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile2" class="form-control" id="imagefile2" onchange="upload_foto2(<?php echo $id_choque; ?>);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="imagefile3" class="col-sm-2 control-label">Foto 3: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile3" class="form-control" id="imagefile3" onchange="upload_foto3(<?php echo $id_choque; ?>);">
                                    </div>
                                    <label for="imagefile4" class="col-sm-2 control-label">Foto 4: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile4" class="form-control" id="imagefile4" onchange="upload_foto4(<?php echo $id_choque; ?>);">
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
    function upload_foto1(id_choque){
        $("#load_img").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile',file);
        data.append('id',id_choque);
        
        $.ajax({
            url: "view/ajax/images/foto1_choque_ajax.php",        // Url to which the request is send
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
    function upload_foto2(id_vehiculo){
        $("#load_img2").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile2");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile2',file);
        data.append('id',id_vehiculo);
        
        $.ajax({
            url: "view/ajax/images/foto2_choque_ajax.php",        // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                $("#load_img2").html(data);
                
            }
        });
    }
    function upload_foto3(id_vehiculo){
        $("#load_img3").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile3");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile3',file);
        data.append('id',id_vehiculo);
        
        $.ajax({
            url: "view/ajax/images/foto3_choque_ajax.php",        // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                $("#load_img3").html(data);
                
            }
        });
    }
    function upload_foto4(id_vehiculo){
        $("#load_img4").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile4");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile4',file);
        data.append('id',id_vehiculo);
        
        $.ajax({
            url: "view/ajax/images/foto4_choque_ajax.php",        // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                $("#load_img4").html(data);
                
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
            url: "view/ajax/agregar/actualizar_choque.php",
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