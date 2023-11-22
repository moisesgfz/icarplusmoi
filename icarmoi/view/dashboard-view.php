<?php
    $active1="active";  
    include "resources/header.php";

    if ($_SESSION['dashboard']==1){

        $empleados = mysqli_query($con, "select * from empleado");
        $talleres = mysqli_query($con, "select * from taller");
        $empresas = mysqli_query($con, "select * from empresa");
        $vehiculos = mysqli_query($con, "select * from vehiculo");

        function suma_reparaciones($month){
            global $con;
            $year=date('Y');
            $sql="select count(id) as id from reparaciones where year(fecha_carga) = '$year' and month(fecha_carga)= '$month' ";
            $query = mysqli_query($con, $sql);
            $reg=mysqli_fetch_array($query);
            return $total=number_format($reg['id'],2,'.','');
        }
        function suma_choques($month){
            global $con;
            $year=date('Y');
            $sql="select count(id) as id from choque where year(fecha_carga) = '$year' and month(fecha_carga)= '$month' ";
            $query = mysqli_query($con, $sql);
            $reg=mysqli_fetch_array($query);
            return $total=number_format($reg['id'],2,'.','');
        }

?>
        <!--main content start-->
        <section class="main-content-wrapper">
            <section id="main-content">
                <!--tiles start-->
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="dashboard-tile detail tile-red">
                            <div class="content">
                                <h1 class="text-left timer" data-from="0" data-to="<?php echo mysqli_num_rows($empleados) ?>" data-speed="2500"> </h1>
                                <p>Usuarios</p>
                            </div>
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="dashboard-tile detail tile-turquoise">
                            <div class="content">
                                <h1 class="text-left timer" data-from="0" data-to="<?php echo mysqli_num_rows($talleres) ?>" data-speed="2500"> </h1>
                                <p>Talleres</p>
                            </div>
                            <div class="icon"><i class="fa fa-indent"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="dashboard-tile detail tile-purple">
                            <div class="content">
                                <h1 class="text-left timer" data-to="<?php echo mysqli_num_rows($vehiculos) ?>" data-speed="2500"> </h1>
                                <p>Vehiculos</p>
                            </div>
                            <div class="icon"><i class="fa fa-truck"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!--tiles end-->
            </section>
        </section>
        <!--main content end-->
    </section>
<?php
    include "resources/footer.php";
?>
<script src="assets/plugins/chartjs/Chart.min.js"></script> 
<!--Page Level JS-->
<script src="assets/plugins/countTo/jquery.countTo.js"></script>
<script src="assets/plugins/weather/js/skycons.js"></script>
<script>
var barChartData = {
    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
    datasets : [
        {
            fillColor : "rgba(220,220,220,0.5)",
            strokeColor : "rgba(220,220,220,1)",
            data : [<?php echo suma_reparaciones(1);?>, <?php echo suma_reparaciones(2);?>, <?php echo suma_reparaciones(3);?>, <?php echo suma_reparaciones(4);?>, <?php echo suma_reparaciones(5);?>, <?php echo suma_reparaciones(6);?>, <?php echo suma_reparaciones(7);?>,<?php echo suma_reparaciones(8);?>,<?php echo suma_reparaciones(9);?>,<?php echo suma_reparaciones(10);?>,<?php echo suma_reparaciones(11);?>,<?php echo suma_reparaciones(12);?>]
        },
        {
            fillColor : "rgba(151,187,205,0.5)",
            strokeColor : "rgba(151,187,205,1)",
            data : [<?php echo suma_choques(1);?>, <?php echo suma_choques(2);?>, <?php echo suma_choques(3);?>, <?php echo suma_choques(4);?>, <?php echo suma_choques(5);?>, <?php echo suma_choques(6);?>, <?php echo suma_choques(7);?>,<?php echo suma_choques(8);?>,<?php echo suma_choques(9);?>,<?php echo suma_choques(10);?>,<?php echo suma_choques(11);?>,<?php echo suma_choques(12);?>]
        }
    ]
    
}
var myLine = new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
</script>

<!-- Morris  -->
<script src="assets/plugins/morris/js/morris.min.js"></script>
<script src="assets/plugins/morris/js/raphael.2.1.0.min.js"></script>

<!--Load these page level functions-->
<script>
    $(document).ready(function() {
        app.timer();
        app.weather();
    });
</script>
<?php     
    }else{
      require 'resources/acceso_prohibido.php';
    }
    ob_end_flush(); 
?>