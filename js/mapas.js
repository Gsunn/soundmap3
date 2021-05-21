function initialize() {

    $.ajax({
        async: true,
        type: "POST",
        url: "includes/load.php",
        data: {},
        success: function (data) {
            var marcadores = $.parseJSON(data); // lo convierte a Array

            //coloca los marcadores en el mapa
            addMarcadores(marcadores);
        },
        error: function (e) {

        }
    });

} //initialize

//carga los marcadores mediante AJAX
function addMarcadores(marcadores) {

    var objLong = parseInt(marcadores.length);
    //console.log("num marcadores " + objLong);
    var porcentaje = 100 / objLong;
    //console.log("num porcentaje " + porcentaje);
    var total = porcentaje;


    var mapOptions = {
        // How zoomed in you want the map to start at (always required)
        zoom: 15,

        //desactiva scroll con la rueda de desplazamiento
        scrollwheel: false,

        // The latitude and longitude to center the map (always required)
        center: new google.maps.LatLng(42.35, -3.7), //BURGOS
        
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.RIGHT_TOP
        },

        // How you would like to style the map. 
        styles: [
            {
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#212121"
                                  }
                                ]
                              },
            {
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                                  }
                                ]
                              },
            {
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#757575"
                                  }
                                ]
                              },
            {
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "color": "#212121"
                                  }
                                ]
                              },
            {
                "featureType": "administrative",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#757575"
                                  }
                                ]
                              },
            {
                "featureType": "administrative.country",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#9e9e9e"
                                  }
                                ]
                              },
            {
                "featureType": "administrative.land_parcel",
                "stylers": [
                    {
                        "visibility": "off"
                                  }
                                ]
                              },
            {
                "featureType": "administrative.locality",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#bdbdbd"
                                  }
                                ]
                              },
            {
                "featureType": "poi",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#757575"
                                  }
                                ]
                              },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#181818"
                                  }
                                ]
                              },
            {
                "featureType": "poi.park",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#616161"
                                  }
                                ]
                              },
            {
                "featureType": "poi.park",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "color": "#1b1b1b"
                                  }
                                ]
                              },
            {
                "featureType": "road",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#2c2c2c"
                                  }
                                ]
                              },
            {
                "featureType": "road",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#8a8a8a"
                                  }
                                ]
                              },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#373737"
                                  }
                                ]
                              },
            {
                "featureType": "road.highway",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#3c3c3c"
                                  }
                                ]
                              },
            {
                "featureType": "road.highway.controlled_access",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#4e4e4e"
                                  }
                                ]
                              },
            {
                "featureType": "road.local",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#616161"
                                  }
                                ]
                              },
            {
                "featureType": "transit",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#757575"
                                  }
                                ]
                              },
            {
                "featureType": "water",
                "stylers": [
                    {
                        "color": "#ff45e1"
                                  }
                                ]
                              },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#000000"
                                  }
                                ]
                              },
            {
                "featureType": "water",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#fb474a"
                                  },
                    {
                        "visibility": "on"
                                  }
                                ]
                              },
            {
                "featureType": "water",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#3d3d3d"
                                  }
                                ]
                              },
            {
                "featureType": "water",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "color": "#ff45e1"
                                  }
                                ]
                              }
                            ]
    };


    // Get the HTML DOM element that will contain your map 
    // We are using a div with id="map" seen below in the <body>
    var mapElement = document.getElementById('contentAjax');

    // Create the Google Map using our element and options defined above
    var map = new google.maps.Map(mapElement, mapOptions);


    //desactiva los controles de zoom  disableDefaultUI: true
    /*var map = new google.maps.Map(document.getElementById('contentAjax'), {
        zoom: 10,
        center: new google.maps.LatLng(42.35, -3.7),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: false
    });*/

    //definimos que los comercios tengan visibilidad "off"
    var styles = [{
        featureType: "poi.business",
        elementType: "labels",
        stylers: [{
            visibility: "off"
                    }]
                }];

    //creamos un objeto styledMap utilizando la definicion anterior
    var styledMap = new google.maps.StyledMapType(styles, {
        name: "Styled Map"
    });


    var infowindow = new google.maps.InfoWindow();
    var marker, i;

    //Asociamos los estilos al mapa.... y listo!
    //map.mapTypes.set('map_style', styledMap);
    //map.setMapTypeId('map_style');

    for (var i in marcadores) {

        marker = new google.maps.Marker({
            position: new google.maps.LatLng(marcadores[i].latitud, marcadores[i].longuitud),
            map: map,
            title: "titulo del marcador",
            //label: "B",
            // must use optimized false for CSS
            optimized: false,
            animation: google.maps.Animation.DROP
                //icon:'http://www.google.com/mapfiles/marker.png'
        });

        //SE DEFINEN LOS EVENTOS EN LOS MARCADORES
        //MUESTRA LA INFOWINDOW CUANDO SE CLIKCA SOBRE EL ARCADOR Y EJECUTA UN METODO
        google.maps.event.addListener(marker, 'click', (function (marker, i) {

            return function () {
                    //x=parseInt(i)+1;
                    var content = 
                        '<div id="contentInfo" class="container-fluid">' +
                            // '<div id="siteNotice"></div>' +
                            '<div class="row">'+
                                '<div class="col-xs-2">'+
                                    '<a id="' + marcadores[i].id + '" style="color: black;  cursor:pointer; cursor: hand; text-decoration:none;" href="#" onclick="verFoto(\'' + marcadores[i].foto + '\',\'' + marcadores[i].nombre + '\');">' +
                                        '<img class="img-rounded" src="images/fotos/' + marcadores[i].foto + '" width="100"  alt=""/>'+
                                    '</a>'+
                                '</div>'+
                                '<div class="col-xs-10">'+
                                    '<h3  class="firstHeading">' + marcadores[i].nombre + '</h3>' +
                                    '<p style="font-size: 16px;" id="direccion">' + marcadores[i].direccion + '</p>' +
                                '</div>'+
                            '</div>'+
                            '<div class="row-fluid" style="padding-top: 10px;">' +
                                    '<div class="col-xs-2" style="padding-left: 34px;">' +
                                        '<div id="12" class="scrollbar">' +
                                            '<p>These examples show very basic functionality and exist so that I can test that any changes to jScrollPane work cross browser.</p>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="col-xs-10" style="margin-left: -15px;">' +
                                        '<div id="waveform">' +
                                        '</div>' +
                                    '</div>' +
                                '<div class="controls">' +
                                    '<button class="btn" onClick="playAudio()" data-action="play" style="margin-left: -5px;">' +
                                    '<span><i class="glyphicon glyphicon-play" style="margin-right: 3px;"></i> / <i class="glyphicon glyphicon-pause" style="margin-right: 3px;"></i></span>' +
                                    '</button>' +
                                '</div>' +
                            '</div>' +
                            '<div id="bodyContent">' +
                                '<p>' + marcadores[i].descripcion + '</p>' +
                                '</div>' +
                        '</div>';

                    infowindow.setContent(content);
                    infowindow.open(map, marker);
                    //console.log(marker.getPosition().lat());   
                    renderVol(); //dibuja el fader del volumen web kit
                    renderizaMP3(marcadores[i].audio); //RENDERIZA EL AUDIO
                } //return

        })(marker, i));

        //Add listener curculo al clickar
        google.maps.event.addListener(marker, 'click', function (event) {
            //var latitude = event.latLng.lat();
            //var longitude = event.latLng.lng();
           // console.log(latitude + ', ' + longitude);
            radius = new google.maps.Circle({
                map: map,
                radius: 5,
                center: event.latLng,
                fillColor: '#777',
                fillOpacity: 0.1,
                strokeColor: '#AA0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                draggable: false, // Dragable
                editable: false // Resizable
            });


        }); //end addListener

        // This event detects a mousemove on the map
        google.maps.event.addListener(map, 'mousemove', function (event) {
            var latitude = event.latLng.lat();
            var longitude = event.latLng.lng();
            $('#verLat').text(latitude);
            $('#verLong').text(longitude);

            //console.log(latitude + ', ' + longitude);
        }); //end addListener

        google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {
            return function () {
                toggleBounce(marker);
            }
        })(marker, i));

        google.maps.event.addListener(marker, 'mouseout', (function (marker, i) {
            return function () {
                toggleBounce(marker);
            }
        })(marker, i));

        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                styleInfowindow();
            }
        })(marker, i));

        /*
         * The google.maps.event.addListener() event waits for
         * the creation of the infowindow HTML structure 'domready'
         * and before the opening of the infowindow defined styles
         * are applied.
         */
        google.maps.event.addListener(infowindow, 'domready', function () {

            // Reference to the DIV which receives the contents of the infowindow using jQuery
            var iwOuter = $('.gm-style-iw');

            /* The DIV we want to change is above the .gm-style-iw DIV.
             * So, we use jQuery and create a iwBackground variable,
             * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().
             */
            var iwBackground = iwOuter.prev();

            // Remove the background shadow DIV
            iwBackground.children(':nth-child(2)').css({
                'display': 'none'
            });

            // Remove the white background DIV
            iwBackground.children(':nth-child(4)').css({
                'display': 'none'
            });

            //borde triangulo señala marcador
            iwBackground.children(':nth-child(3)').find('div').children().eq(0).css({
                'border-left': '2px solid #f04634',
                //'border-right': '2px solid #f04634',
                'background-color': '#f2f2f2',
                'z-index': '1'
            });

            iwBackground.children(':nth-child(3)').find('div').children().eq(1).css({ //'border-left': '2px solid #f04634',
                'border-right': '2px solid #f04634',
                'background-color': '#f2f2f2',
                'z-index': '1'
            });


        });

        /* google.maps.event.addListener(marker, 'click', (function(marker, i) {
             return function(){
                 //Change the marker icon
                 toggleBounce(marker);
                // marker.setIcon('images/greenMark.png');
             }
         })(marker, i));*/

        google.maps.event.addListener(map, 'click', function (event) {
            infowindow.close();
            stopAudio();
        });

        //EVENTO QUE SE EJECUTA CUANDO SE CIERRA LA INFOWINDOW
        google.maps.event.addListener(infowindow, 'closeclick', (function (marker, i) {
            return function () {
                stopAudio();
            }
        })(marker, i));


        barraProgerso(parseInt(total));
        total += porcentaje;

    } //FOR
}

function toggleBounce(marker) {
    if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
} //toggleBounce


function styleInfowindow() {
    //$(".gm-style-iw").parent().parent().css({right: '55px'});
    //$(".gm-style-iw").prev().last().hide();
    //console.log($(".gm-style-iw").prev().siblings());
    //para desplazar la X de la infowndow
    $(".gm-style-iw").next().css({
        "right": '50px',
        "top": '27px'
    });

}