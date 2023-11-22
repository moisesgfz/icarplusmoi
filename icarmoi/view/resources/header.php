<?php
    if (!isset($_SESSION['user_id'])&& $_SESSION['user_id']==null) {
        header("location: ./?view=index");
    }

    $id=$_SESSION['user_id'];
    $query=mysqli_query($con,"SELECT * from empleado where id=$id");
    while ($row=mysqli_fetch_array($query)) {
        $dni_empleado=$row['dni'];
        $imagen_empleado=$row['imagen'];
        $nombre_empleado=$row['nombre'];
        $apellido_empleado=$row['apellido'];
        $username_empleado=$row['username'];
        $email_empleado=$row['email'];
        $domicilio_empleado=$row['domicilio'];
        $localidad_empleado=$row['localidad'];
        $telefono_empleado=$row['telefono'];
        $celular_empleado=$row['celular'];
        $registro_empleado=$row['registro'];
        $status_empleado=$row['status'];
        $created_at_empleado=$row['created_at'];
    }

    $configuracion=mysqli_query($con, "select * from configuracion");
    $rw=mysqli_fetch_array($configuracion);
    $nombre_empresa=$rw['nombre'];
?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $nombre_empresa; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Fonts from Font Awsome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- Vector Map  -->
    <link rel="stylesheet" href="assets/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css">
    <!-- ToDos  -->
    <link rel="stylesheet" href="assets/plugins/todo/css/todos.css">
    <!-- Morris  -->
    <link rel="stylesheet" href="assets/plugins/morris/css/morris.css">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <!-- Feature detection -->
    <script src="assets/js/modernizr-2.6.2.min.js"></script>

    <!-- <link rel="stylesheet" href="assets/plugins/selectpicker/bootstrap-select.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/plugins/select2/css/select2.css"> -->
</head>

<body>
    <section id="container">
        <header id="header">
            <!--logo start-->
            <div class="brand">
                <a href="./?view=dashboard" ><span><?php echo $nombre_empresa; ?></span></a>
            </div>
            <!--logo end-->
            <div class="toggle-navigation toggle-left">
                <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="Toggle Navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="user-nav">
                <ul>
                    <li class="profile-photo">
                        <img src="<?php echo $imagen_empleado ?>" height="40px" width="40px" alt="" class="img-circle">
                    </li>
                    <li class="dropdown settings">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <?php echo $nombre_empleado." ".$apellido_empleado; ?> <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu animated fadeInDown">
                            <li>
                                <a href="./?view=perfil"><i class="fa fa-user"></i> Mi Perfil</a>
                            </li>
                            <li>
                                <a href="./?view=logout"><i class="fa fa-power-off"></i> Salir</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
        <!--sidebar left start-->
        <aside class="sidebar">
            <div id="leftside-navigation" class="nano">
                                 
                <ul class="nano-content">
                    <?php if ($_SESSION['dashboard']==1) { ?>
                    <li class="<?php if(isset($active1)){echo $active1;}?>">
                        <a href="./?view=dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                    </li>


                    <?php } ?>
                    <?php if ($_SESSION['empleados']==1) { ?>
                    <li class="<?php if(isset($active2)){echo $active2;}?>">
                        <a href="./?view=empleados"><i class="fa fa-users"></i><span>Usuarios</span></a>
                    </li>
                    <?php } ?>
                    <!-- <li class="<?php if(isset($active3)){echo $active3;}?>">
                        <a href="./?view=kind"><i class="fa fa-tag"></i><span>Kind</span></a>
                    </li> -->
                    <?php if ($_SESSION['taller']==1) { ?>
                    <li class="<?php if(isset($active4)){echo $active4;}?>">
                        <a href="./?view=taller"><i class="fa fa-indent"></i><span>Taller</span></a>
                    </li>
                    <?php } ?>
                    <?php if ($_SESSION['vehiculo']==1) { ?>
                    <li class="<?php if(isset($active8)){echo $active8;}?>">
                        <a href="./?view=vehiculos"><i class="fa fa-truck"></i><span>Vehiculo</span></a>
                    </li>
                    <?php } ?>
                    <?php if ($_SESSION['reparaciones']==1) { ?>
                    <li class="<?php if(isset($active10)){echo $active10;}?>">
                        <a href="./?view=reparaciones"><i class="fa fa-gavel"></i><span>Reparaciones</span></a>
                    </li>
                    <?php } ?>
                    <?php if ($_SESSION['configuracion']==1) { ?>
                    <li class="<?php if(isset($active12)){echo $active12;}?>">
                        <a href="./?view=configuracion"><i class="fa fa-cog"></i><span>Configuración</span></a>
                    </li>
                
                    <?php } ?>
                </ul>
            </div>
        </aside>
        <!--sidebar left end-->