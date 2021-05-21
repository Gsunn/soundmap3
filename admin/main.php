<?php 
    header ('Content-type: text/html; charset=utf-8');
    session_start();
    if(!isset($_SESSION['userLogin'])){
        header('Location: index.php');
    }
    
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Jesús del Val Velasco">
        <title>Administrator</title>
        <?php
            include('includes/cssLibs.php');
            include('includes/jsLibsStart.php')
        ?>

            <style>
                #audioPreview {
                    display: none;
                }
            </style>
    </head>

    <body>

        <div class="wrapper">
            <nav class="navbar navbar-static-top navbar-inverse" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div>  
                        <p style="color: #c22311; ">
                            <a class="navbar-brand" href="#"><img class="superLogo" src="../images/portada/logo_icon.png" width="40" alt=""></a>
                      
                            <?php
                                $usuario = json_decode($_SESSION['userLogin']);
                                echo $usuario->nick; 
                            ?>
                        </p>

                    </div>


                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <!-- email -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>

                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>

                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil de usuario</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuracion</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="includes/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-inverse sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse fondoOscuro">
                        <ul class="nav fondoOscuro" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="#" class="active" onclick="cargar('dashboard.php');"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            <li>
                                <a href="#" type="button" onclick='marcadores();'><i class="fa fa-map-marker fa-fw"></i> Marcadores</a>
                            </li>

                            <li>
                                <a href="#" type="button" onclick='usuarios();'><i class="fa fa-user fa-fw"></i> Usuarios</a>
                            </li>

                            <li>
                                <a href="#" type="button" onclick="cargar('viewLog.php');"><i class="fa fa-file-text fa-fw"></i> Log</a>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Ventas<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a href="#" onclick=''>Grafico 1</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick=''>Greafico 2</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div id="alertas"></div>
                <!-- al clickar en la tabla crea un handler a descripcion-->
                <div id="cargador" onclick="ellipsisDescripcion();">
                    <div id="jsGrid"></div>
                    <div id="dialog" title="Vista Previa">
                        <img id="imagePreview" />
                        <audio id="audioPreview" src="" controls> </audio>
                    </div>
                </div>

                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->


        </div>
        <!-- /. wrapper -->
        <?php
        include('includes/jsLibsEnd.php')
    ?>

            <script>
                function cargar(elemento) {
                    //alert (elemento);
                    $("#jsGrid").load("includes/" + elemento).hide().fadeToggle();
                }

            </script>

    </body>

    </html>
