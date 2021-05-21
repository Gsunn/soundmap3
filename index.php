<?php 
    session_start();
?>

    <!DOCTYPE html>
    <html class="full" lang="es">

    <head>
        <link rel="shortcut icon" type="image/ico" href="favicon.ico" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Mapa sonoro de la ciudad de Burgos">
        <meta name="author" content="Jesús del Val Velasco">
        <title>City.Sound.Map</title>
     
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" lazyload media="none" onload="if(media!='all')media='all'">

        <noscript>
            <link rel="stylesheet" type="text/css" href="css/soundmap.min.css" />
        </noscript>

        <?php 
           
            include('includes/jsLibsStart.php');
        ?>
            <style>
                /*   .myClass {
                    position: fixed;
                    z-index: 2000;
                }*/
                
                .border-right {
                    border-right: 3px solid #ccc;
                }
                
                .icons {
                    display: inline-flex;
                    padding: 10px;
                }
                
                .contForm {
                    /*padding-left: 50px;*/
                }
                
                @media (max-width: 480px) {
                    .icons {
                        display: block !important;
                    }
                    #backUno {
                        padding: 0px !important;
                    }
                    .contForm {
                        padding: 10px !important;
                    }
                    .border-right {
                        border-right: none !important;
                    }
                }
                
                 @media (max-width: 780px) {
                   
                    #backUno {
                        padding: 20px !important;
                    }
                }

            </style>

            <script>
                function jqLoaded() {

                    if (window.jQuery) {
                        cargarJs();

                        $('.navbar-nav li').click(function() {
                            $('.navbar-nav li.active').removeClass('active');
                            if ($(this).attr('id') != "logoNav") {
                                $(this).addClass('active');
                            }
                        });

                        return 1;
                    } else {
                        window.setTimeout(jqLoaded, 300);
                    }
                }

                function loadjscssfile(filename, filetype) {
                    if (filetype == "js") { //if filename is a external JavaScript file
                        var fileref = document.createElement('script')
                        fileref.setAttribute("type", "text/javascript")
                        fileref.setAttribute("src", filename)
                    } else if (filetype == "css") { //if filename is an external CSS file
                        var fileref = document.createElement("link")
                        fileref.setAttribute("rel", "stylesheet")
                        fileref.setAttribute("type", "text/css")
                        fileref.setAttribute("href", filename)
                    }
                    if (typeof fileref != "undefined")
                        document.getElementsByTagName("head")[0].appendChild(fileref)
                }

                function cargarJs() {
                    loadjscssfile("js/nouislider.min.js", "js");
                    loadjscssfile("js/wavesurfer/wavesurfer.min.js", "js");
                    loadjscssfile("js/jquery.simpleWeather.min.js", "js");

                    loadjscssfile("js/bootstrap.min.js", "js"); //dynamically load and add this .js file
                    loadjscssfile("js/mapas.min.js", "js");
                    loadjscssfile("js/gsun.min.js", "js");

                    //webkit ui
                    loadjscssfile("js/jquery-ui.min.js", "js");
                    loadjscssfile("js/jquery.easing.min.js", "js");
                    loadjscssfile("js/modernizr.min.js", "js");
                    loadjscssfile("js/jquery.mousewheel.min.js", "js");
                    loadjscssfile("js/jquery.jscrollpane.min.js", "js");
                    loadjscssfile("js/general.min.js", "js");

                    //wavesrufer.js
                    loadjscssfile("js/wavesurfer/util.min.js", "js");
                    loadjscssfile("js/wavesurfer/drawer.min.js", "js");
                    loadjscssfile("js/wavesurfer/webaudio.min.js", "js");
                    loadjscssfile("js/wavesurfer/drawer.canvas.min.js", "js");
                    loadjscssfile("js/wavesurfer/wavesurfer.regions.min.js", "js");
                    loadjscssfile("js/wavesurfer/mediaelement.min.js", "js");
                    //loadjscssfile("mystyle.css", "css") ////dynamically load and add this .css file

                    loadjscssfile("js/thumbnail-slider.min.js", "js");
                    loadjscssfile("js/coffee.js", "js");



                }

            </script>

    </head>

    <body>
        <!-- controles -->
        <div class="controlesUI">
            <div id="posCursor">
                <p>Lat: <span id="verLat"></span></p>
                <p>Lon: <span id="verLong"></span></p>
            </div>

            <div id="weather" class="pull-right"></div>
            <a href="#" class="scrollup">Scroll</a>
        </div>


        <!-- Navigation navbar-fixed-top-->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-1" style="margin-top: 28px;">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand page-scroll" href="#principal" id="navLogoCollapse">
                        <img src="images/portada/logo_icon.png" alt="" width="70" style="display: inline-block; margin-top: -5px;">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="collapse-1">
                    <ul class="nav navbar-nav" style="font-size: x-large;">
                        <li class="active"><a class="page-scroll" href="#proyecto">Proyecto</a></li>
                        <li><a class="page-scroll" href="#cafe">Café</a></li>
                        <li id="logoNav">
                            <a class="navbar-brand page-scroll" href="#principal" id="navLogo">
                                <img src="images/portada/logo_icon.png" alt="" width="70" style="display: inline-block; margin-top: -5px;">
                            </a>
                        </li>
                        <li><a href="#soporte" class="page-scroll">Soporte</a></li>
                        <li><a href="#contacto" class="page-scroll">Contacto</a></li>
                    </ul>
                </div>

                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- /. NAV -->

        <!-- Put your page content here! -->
        <section id="principal">
            <div class="container-fluid fluidGsun">
                <!-- CONTENERDOR GOOGLEMAPS -->
                <div id="contentAjax" style="width: 100%;">
                </div>
            </div>
        </section>

        <section id="proyecto">
            <?php include('templates/proyecto.php');?>
        </section>

        <section id="cafe">
            <?php include('templates/coffee.php');?>
        </section>

        <section>
            <?php include('templates/imageFixed.php');?>
        </section>

        <section id="soporte">
            <?php include('templates/soporte.php');?>
        </section>

        <section id="contacto">
            <?php include('templates/contacto.php');?>
        </section>

        <section class="footer-basic-centered">
            <?php include('templates/footer.php');?>
        </section>


        <!-- YOUR CONTENT -->
        <!-- DIALOGO MODAL OCULTO INICIALMETE BARRA DE CARGA-->
        <div class="modal" id="miModal" tabindex="-1" role="dialog" aria-labelledby="bienvenido" aria-hidden="true">
            <div class="modal-dialog" style="top: 18%;">
                <div class="modal-content" id="popup">
                    <div class="modal-header" style="border-bottom: 0px none;">
                        <button id="portada" type="button" class="close" data-dismiss="modal" aria-hidden="true" onClick="cerrar()" style="opacity: 1; color: white; display: none;">&times;</button>
                        <h4 class="modal-title" id="bienvenido"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="progress" style="margin-top: 330px;">
                            <div id="barra" class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"> 0%
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- VENTANA MODAL CARGA LA NOTICIA DEL BLOG SELECCIONADA -->
        <!--        <div class="modal fade" id="sitio" tabindex="-1" role="dialog" aria-labelledby="info" aria-hidden="true"></div>-->
        <div id="dialog" title="Basic dialog" style="display:none">
            <img id="imagePreview" class="img-responsive" src="images/icons/plus.png" alt="vista previa" />
        </div>
        <?php 
            //include('includes/cssLibs.php');
           //include('includes/jsLibsEnd.php');
        ?>


    </body>

    </html>
    
    <script>
        //loadjscssfile("css/soundmap.min.css", "css"); 
        loadjscssfile("css/bootstrap.min.css", "css");
        loadjscssfile("css/style.min.css", "css");
        loadjscssfile("css/gsun.min.css", "css");
        loadjscssfile("css/jquery-ui.min.css", "css");
        loadjscssfile("css/thumbnail-slider.min.css", "css");
        loadjscssfile("css/nouislider.min.css", "css");
        jqLoaded();

    </script>
