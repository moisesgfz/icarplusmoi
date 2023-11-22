<?php 
    $active11="active";
    include "resources/header.php";

    if ($_SESSION['choque']==1){
    
        if (isset($_GET['id'])){
            $choque_id=intval($_GET['id']);
            $sql_choque=mysqli_query($con,"select * from choque where  id='$choque_id'");
            $count=mysqli_num_rows($sql_choque);
            $row=mysqli_fetch_array($sql_choque);

            $choque_code=$row['choque_code'];
            $fecha_choque=$row['fecha_choque'];
            $idvehiculo=$row['idvehiculo'];
            $idempleado=$row['idempleado'];
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
        }
        
        if (!isset($_GET['id']) or $count!=1){
            header("location: ./?view=choques");
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
                            <li class=""><a href="./?view=choques">Choques</a></li>
                            <li class="active">Editar Choque</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <br>
                    <h1 class="h1">Editar Choque</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img">
                                <img class=" img-responsive" src="<?php echo  $foto1;?>" alt="Foto del choque" data-toggle="modal" data-target="#myModal1" style='cursor:pointer'>
                            </div>
                           <br>
                            <div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">&nbsp;</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo $foto1;?>" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img2">
                                <img class=" img-responsive" src="<?php echo  $foto2;?>" alt="Foto del choque" data-toggle="modal" data-target="#myModal2" style='cursor:pointer'>
                            </div>
                            <br>
                            <div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">&nbsp;</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo $foto2;?>" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img3">
                                <img class=" img-responsive" src="<?php echo  $foto3;?>" alt="Foto del choque" data-toggle="modal" data-target="#myModal3" style='cursor:pointer'>
                            </div>
                            <br>
                            <div id="myModal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">&nbsp;</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo $foto3;?>" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary"><!-- Profile Image -->
                        <div class="box-body box-profile">
                            <div id="load_img4">
                                <img class=" img-responsive" src="<?php echo  $foto4;?>" alt="Foto del choque" data-toggle="modal" data-target="#myModal4" style='cursor:pointer'>
                            </div>
                            <br>
                            <div id="myModal4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">&nbsp;</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo $foto4;?>" class="img-responsive">
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
                            <h3 class="panel-title">Datos del Choque</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>

                        <div class="panel-body">

                            <form class="form-horizontal" role="form" name="update_register" id="update_register" method="post" enctype="multipart/form-data">

                                <input type="hidden" class="form-control" id="choque_code" name="choque_code"  value="<?php echo $choque_code;?>" >
                                <input type="hidden"  id="id" name="id"  value="<?php echo $choque_id;?>" >

                                <div class="form-group">
                                    <label for="fecha_choque" class="col-sm-2 control-label">Fecha Choque: </label>
                                    <div class="col-sm-4">
                                        <input type="date" required name="fecha_choque" class="form-control" id="fecha_choque" placeholder="Fecha Choque: " value="<?php echo $fecha_choque ?>">
                                    </div>
                                    <label for="vehiculo" class="col-sm-2 control-label">Vehiculo: </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="vehiculo" id="vehiculo" required>
                                            <?php 
                                                $sql_vehiculos=mysqli_query($con,"select *  from vehiculo where estado=1 order by patente");
                                                while ($rw=mysqli_fetch_array($sql_vehiculos)){
                                                    $id_vehiculo=$rw['id'];
                                                    $patente=$rw['patente'];
                                                    if ($idvehiculo==$id_vehiculo){$selected1="selected";}else{$selected1="";}
                                                ?>
                                                <option value="<?php echo $id_vehiculo;?>" <?php echo $selected1;?>><?php echo $patente;?></option>
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
                                                    $idempleado2=$rw['id'];
                                                    $nombre_empleado=$rw['nombre']." ".$rw['apellido'];
                                                    if ($idempleado==$idempleado2){$selected1="selected";}else{$selected1="";}
                                                ?>
                                                <option value="<?php echo $idempleado2;?>" <?php echo $selected1;?>>
                                            <?php echo $nombre_empleado;?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>    
                                    </div>
                                    <label for="descripcion" class="col-sm-2 control-label">Descripción: </label>
                                    <div class="col-sm-4">
                                        <textarea type="text" required name="descripcion" class="form-control" id="descripcion" placeholder="Descripción: "><?php echo $descripcion ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nombre" class="col-sm-2 control-label">Nombre : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="nombre" class="form-control" id="nombre" placeholder="Nombre : " value="<?php echo $nombre_ter ?>">
                                    </div>
                                    <label for="dni" class="col-sm-2 control-label">Dni : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="dni" class="form-control" id="dni" placeholder="Dni : " value="<?php echo $dni_ter ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="registro" class="col-sm-2 control-label">Registro : </label>
                                    <div class="col-sm-4">
                                        <input type="date" required name="registro" class="form-control" id="registro" placeholder="Registro : " value="<?php echo $registro_ter ?>">
                                    </div>
                                    <label for="domicilio" class="col-sm-2 control-label">Domicilio : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="domicilio" class="form-control" id="domicilio" placeholder="Domicilio : " value="<?php echo $domicilio_ter ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="localidad" class="col-sm-2 control-label">Localidad : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="localidad" class="form-control" id="localidad" placeholder="Localidad : " value="<?php echo $localidad_ter ?>">
                                    </div>
                                    <label for="patente" class="col-sm-2 control-label">Patente : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="patente" class="form-control" id="patente" placeholder="Patente : " value="<?php echo $patente_ter ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="marca_modelo" class="col-sm-2 control-label">Marca Modelo : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="marca_modelo" class="form-control" id="marca_modelo" placeholder="Marca Modelo : " value="<?php echo $marca_modelo_ter ?>">
                                    </div>
                                    <label for="color" class="col-sm-2 control-label">Color : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="color" class="form-control" id="color" placeholder="Color : " value="<?php echo $color_ter ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="seguro" class="col-sm-2 control-label">Seguro : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="seguro" class="form-control" id="seguro" placeholder="Seguro : " value="<?php echo $seguro_ter ?>">
                                    </div>
                                    <label for="poliza" class="col-sm-2 control-label">Poliza : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="poliza" class="form-control" id="poliza" placeholder="Poliza : " value="<?php echo $poliza_ter ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefono" class="col-sm-2 control-label">Telefono : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="telefono" class="form-control" id="telefono" placeholder="Telefono : " value="<?php echo $telefono_ter ?>">
                                    </div>
                                    <label for="celular" class="col-sm-2 control-label">Celular : </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="celular" class="form-control" id="celular" placeholder="Celular : " value="<?php echo $celular_ter ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="imagefile" class="col-sm-2 control-label">Foto 1: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile" class="form-control" id="imagefile" onchange="upload_foto1(<?php echo $choque_id; ?>);">
                                    </div>
                                    <label for="imagefile2" class="col-sm-2 control-label">Foto 2: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile2" class="form-control" id="imagefile2" onchange="upload_foto2(<?php echo $choque_id; ?>);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="imagefile3" class="col-sm-2 control-label">Foto 3: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile3" class="form-control" id="imagefile3" onchange="upload_foto3(<?php echo $choque_id; ?>);">
                                    </div>
                                    <label for="imagefile4" class="col-sm-2 control-label">Foto 4: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile4" class="form-control" id="imagefile4" onchange="upload_foto4(<?php echo $choque_id; ?>);">
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
    function upload_foto1(choque_id){
        $("#load_img").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile',file);
        data.append('id',choque_id);
        
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
    function upload_foto2(choque_id){
        $("#load_img2").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile2");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile2',file);
        data.append('id',choque_id);
        
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
    function upload_foto3(choque_id){
        $("#load_img3").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile3");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile3',file);
        data.append('id',choque_id);
        
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
    function upload_foto4(choque_id){
        $("#load_img4").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile4");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile4',file);
        data.append('id',choque_id);
        
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