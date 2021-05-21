<style>
    .ajax-loader {
        width: 48px;
        position: absolute;
        margin-top: -8px;
        display: none;
    }
    
    .panel-green {
        border-color: #5cb85c;
    }
    
    .panel-green > .panel-heading {
        border-color: #5cb85c;
        color: white;
        background-color: #5cb85c;
    }
    
    .panel-green > a {
        color: #5cb85c;
    }
    
    .panel-green > a:hover {
        color: #3d8b3d;
    }
    
    .panel-red {
        border-color: #d9534f;
    }
    
    .panel-red > .panel-heading {
        border-color: #d9534f;
        color: white;
        background-color: #d9534f;
    }
    
    .panel-red > a {
        color: #d9534f;
    }
    
    .panel-red > a:hover {
        color: #b52b27;
    }
    
    .panel-yellow {
        border-color: #f0ad4e;
    }
    
    .panel-yellow > .panel-heading {
        border-color: #f0ad4e;
        color: white;
        background-color: #f0ad4e;
    }
    
    .panel-yellow > a {
        color: #f0ad4e;
    }
    
    .panel-yellow > a:hover {
        color: #df8a13;
    }

</style>

<div class="fila1">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-map-marker fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">View</div>
                        <div>Markers</div>
                    </div>
                </div>
            </div>
            <a href="#" onclick="marcadores();">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="tempIcon"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div id="weather" class="pull-right"></div>
                    </div>
                </div>
            </div>
            <a href="#" data-toggle="modal" data-target="#modalWeather">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-map-marker fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">Add</div>
                        <div>New Marker</div>
                    </div>
                </div>
            </div>
            <a href="#" type="button" data-toggle="modal" data-target="#modalNewMarker">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">13</div>
                        <div>Support Tickets!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="fila2">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3" style="display: inline-flex;">
                        <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                        <i class="fa fa-user-circle-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">ADD</div>
                        <div>New User</div>
                    </div>
                </div>
            </div>
            <a href="#" type="button" data-toggle="modal" data-target="#modalAddUser">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user-circle-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">View</div>
                        <div>Users</div>
                    </div>
                </div>
            </div>
            <a href="#" onclick='usuarios();'>
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-envelope fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">Send</div>
                        <div>Email</div>
                    </div>
                </div>
            </div>
            <a href="#" type="button" data-toggle="modal" data-target="#modalSendEmail">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">13</div>
                        <div>Support Tickets!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Modal ADD USER -->
<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="labelAddUser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="labelAddUser">Add new user</h4>
            </div>

            <div class="modal-body">
                <form id="formAddUser" method="post" role="form" action="">
                    <div class="form-group">
                        <label for="nick">Nick</label>
                        <input type="text" class="form-control" id="nick" name="nick" placeholder="Nick" value="qqq">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" value="qqq">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="qqq@qqq.com">
                    </div>
                    <!-- <div class="checkbox">
                            <label>
                                <input type="checkbox"> Check me out
                            </label>
                        </div>-->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <div class="ajax-loader"><img src="css/images/ajax-loader.gif" alt="" width="48"></div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal WEATHER -->
<div class="modal fade" id="modalWeather" tabindex="-1" role="dialog" aria-labelledby="labelWeather">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="labelWeather">Weather details</h4>
            </div>
            <div class="modal-body">
                <i class="tempIcon"></i>
                <div id="weatherDetails">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal SEND EMAIL -->
<div class="modal fade" id="modalSendEmail" tabindex="-1" role="dialog" aria-labelledby="labelSendEmail">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modalSendEmail :input').val('');"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="labelSendEmail">Send Email</h4>
            </div>

            <div class="modal-body">
                <form id="formSendEmail" method="post" role="form" action="">
                    <div class="form-group">
                        <label for="para">Para</label>
                        <input type="email" class="form-control" id="para" name="para" placeholder="email destino" value="qqq@qqq.com" required>
                    </div>
                    <div class="form-group">
                        <label for="asunto">Asunto</label>
                        <input type="text" class="form-control" id="asunto" name="asunto" placeholder="asunto" value="asunto" required>
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <textarea rows="4" cols="50" class="form-control" id="mensaje" name="mensaje" placeholder="mensaje" value="mensaje" required></textarea>
                    </div>
                    <!-- <div class="checkbox">
                            <label>
                                <input type="checkbox"> Check me out
                            </label>
                        </div>-->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <div class="ajax-loader"><img src="css/images/ajax-loader.gif" alt="" width="48"></div>
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#modalSendEmail :input').val('');">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal ADD NEW MARKER -->
<div class="modal fade" id="modalNewMarker" tabindex="-1" role="dialog" aria-labelledby="labelNewMarker">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modalSendEmail :input').val('');"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="labelNewMarker">New Marker</h4>
            </div>

            <div class="modal-body">
                <form id="formSendEmail" method="post" role="form" action="">
                    <div class="form-group">
                        <label for="latitud">Latitud</label>
                        <input type="number" class="form-control" id="latitud" name="latitud" placeholder="latitud" required>
                    </div>
                    <div class="form-group">
                        <label for="longuitud">Longuitud</label>
                        <input type="number" class="form-control" id="longuitud" name="longuitud" placeholder="longuitud" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion" required>
                    </div>
                    <div class="form-group">
                        <label class="btn btn-primary" for="foto">
                            <input id="foto" name="foto" type="file" style="display:none;" onchange="$('#upload-foto-info').html($(this).val());"> Foto
                            <div>
                                <img id="imgSalida" width="100" src="" style="display: none;"/>
                            </div>
                            <div>
                                <span class='label label-info' id="upload-foto-info"></span>
                            </div>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="btn btn-primary" for="audio">
                            <input id="audio" name="audio" type="file" style="display:none;" onchange="$('#upload-audio-info').html($(this).val());"> Audio
                            <div>
                                <audio id="audioSalida" width="100" src="" style="display: none;"/>
                            </div>
                            <div>
                                <span class='label label-info' id="upload-audio-info"></span>
                            </div>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <div class="ajax-loader"><img src="css/images/ajax-loader.gif" alt="" width="48"></div>
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#modalNewMarker :input').val('');">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    //weather
    $(document).ready(function() {

        $('#foto').change(function(e) {
            addImage(e);
            $('#imgSalida').show();
        });

        function addImage(e) {
            var file = e.target.files[0],
                imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imgSalida').attr("src", result);
        }
        
        $('#audio').change(function(e) {
            addAudio(e);
            
            $('#audioSalida').show();
        });
        
        function addAudio(e) {
            
            var file = e.target.files[0],
                imageType = /audio.*/;
            
            if (!file.type.match(audio))
                return;

            var reader = new FileReader();
            reader.onload = fileOnloadAudio;
            reader.readAsDataURL(file);
        }
        

        function fileOnloadAudio(e) {
            var result = e.target.result;
            alert(result);
            $('#audioSalida').attr("src", result);
        }

        $.simpleWeather({
            location: 'Burgos, Spain',
            unit: 'c',
            success: function(weather) {
                // html = '<h2 class="temperature"><i class="icon-' + weather.code + '"></i> ' + weather.temp + '&deg;' + weather.units.temp + '</h2>';

                tempIcon = '<h2 class="temperature2"><i class="icon-' + weather.code + '"></i> ' + weather.temp + '&deg;' + weather.units.temp + '</h2>';

                html = '<ul><li>' + weather.city + ',<br> ' + weather.region + '</li>';
                //                    html += '<li class="currently">' + weather.currently + '</li>';
                html += '<li>' + weather.wind.direction + ' ' + weather.wind.speed + ' ' + weather.units.speed + '</li></ul>';

                $('.tempIcon').html(tempIcon);
                $("#weather").html(html);

                html = '<ul><li>' + weather.city + ', ' + weather.region + '</li>';
                html += '<li> humidity ' + weather.humidity + ' % </li>';
                html += '<li> pressure ' + weather.pressure + '</li>';
                html += '<li> High ' + weather.high + 'º, Low ' + weather.low + 'º </li>';
                html += '<li> ' + weather.currently + '</li>';
                html += '<li> sunrise ' + weather.sunrise + '</li>';
                html += '<li> sunset ' + weather.sunset + '</li>';
                html += '<li>  wind direction ' + weather.wind.direction + ' ' + weather.wind.speed + ' ' + weather.units.speed + '</li></ul>';

                $("#weatherDetails").html(html);
            },
            error: function(error) {
                $("#weather").html("<p>" + error + "</p>");
            }
        });

        // var formAddUser = $('#formAddUser input');

        $('#formAddUser').submit(function(e) {

            var formData = $("#formAddUser").serialize();

            $.ajax({
                type: "POST",
                url: "core/users.php",
                data: formData,
                beforeSend: function() {
                    $('.ajax-loader').fadeIn(100);
                },
                success: function(respuesta) {
                    if (!respuesta) {
                        $.notify("El nick o email ya estan en uso.", "error");
                    } else {
                        $.notify("Estupendo! se ha creado un nuevo usuario.", "success");
                    }
                    $('.ajax-loader').fadeOut(1000);
                },
                fail: function(respuesta) {
                    $.notify("Error, no se a creado el usuario.", "error");
                }
            });

            e.preventDefault;
            //evita la recarga de la pagina
            return false;
        });

        $('#formSendEmail').submit(function(e) {

            var formData = $("#formSendEmail").serialize();

            $.ajax({
                type: "POST",
                url: "includes/sendEmail.php",
                data: formData,
                beforeSend: function() {
                    $('.ajax-loader').fadeIn(100);
                },
                success: function(respuesta) {
                    if (!respuesta) {
                        $.notify("No enviado.", "error");
                    } else {
                        $.notify("Estupendo! email enviado.", "success");
                        $('#modalSendEmail :input').val('');
                    }
                    $('.ajax-loader').fadeOut(1000);
                },
                fail: function(respuesta) {
                    $.notify("Error, en la conexion.", "error");
                }
            });

            //evita la recarga de la pagina
            e.preventDefault;
            return false;
        });
    });

</script>
