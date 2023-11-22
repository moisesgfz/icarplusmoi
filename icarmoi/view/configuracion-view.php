<?php 
    $active12="active";
    include "resources/header.php";

    $empresa=mysqli_query($con, "select * from configuracion");
    $rw=mysqli_fetch_object($empresa);
    $id=$rw->id;
    $nombre=$rw->nombre;
    $dni=$rw->dni;
    $actividad_economica=$rw->actividad_economica;
    $email=$rw->email;
    $telefono=$rw->telefono;
    $imagen=$rw->imagen;

    if ($_SESSION['configuracion']==1){
?>
    <!--main content start-->
    <section class="main-content-wrapper">
        <section id="main-content">
            <div class="row">
                <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb  pull-right">
                            <li><a href="./?view=dashboard">Dashboard</a></li>
                            <li class="active">Configuración</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <br>
                    <h1 class="h1">Configuración</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="panel panel-primary">
                        <div class="panel-body panel-profile">
                            <div id="load_img">
                                <img class="img-responsive" src="<?php echo $imagen;?>" alt="Logotipo">
                            </div>
                            <h3 class="profile-username text-center"><?php echo $nombre;?></h3>
                            <p class="text-muted text-center mail-text"><?php echo $email;?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div id="resultados_ajax"></div><!-- resultados ajax -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos de la Empresa</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" name="update_register" id="update_register" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $id ?>">
                                <div class="form-group">
                                    <label for="empresa" class="col-sm-2 control-label">Empresa: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="empresa" class="form-control" id="empresa" placeholder="Nombre Empresa: " value="<?php echo $nombre ?>">
                                    </div>
                                    <label for="actividad_economica" class="col-sm-2 control-label">Actividad : </label>
                                    <div class="col-sm-4">
                                        <textarea type="text" required name="actividad_economica" class="form-control" id="actividad_economica" placeholder="Actividad Economica: "><?php echo $actividad_economica ?></textarea> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dni" class="col-sm-2 control-label">Dni: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="dni" class="form-control" id="dni" placeholder="Dni: " value="<?php echo $dni ?>">
                                    </div>
                                    <label for="email" class="col-sm-2 control-label">E-Mail: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="email" class="form-control" id="email" placeholder="Correo Electrónico: " value="<?php echo $email ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefono" class="col-sm-2 control-label">Telefóno: </label>
                                    <div class="col-sm-4">
                                        <input type="text" required name="telefono" class="form-control" id="telefono" placeholder="Telefóno: " value="<?php echo $telefono ?>">
                                    </div>
                                    <label for="imagefile" class="col-sm-2 control-label">Imagen: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile" class="form-control" id="imagefile" onchange="upload_image(<?php echo $id; ?>);">
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
<?php  
    include "resources/footer.php";
?>
<script>
    function upload_image(id){
        $("#load_img").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile',file);
        data.append('id',id);

        $.ajax({
            url: "view/ajax/images/image_empresa_ajax.php",        // Url to which the request is send
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
            url: "view/ajax/agregar/actualizar_configuracion.php",
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