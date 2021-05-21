$(document).ready(function () {
    
    //ventana de inicio de carga
    $("#miModal").fadeIn();
    
    //para calcular el largo  pantalla
    var largo = $(window).height();
    var menuHeight = $('nav').height(); //restas el acho del menu
    largo = largo - menuHeight;
    
    $("#contentAjax").css({
        "height": largo + "px",
        "top": menuHeight
    });


    //declaro aqui el objeto wavesurfer para que siempre este presente y los controles respondan
    wavesurfer = Object.create(WaveSurfer);

});

//scroll
$(document).ready(function () {

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function (event) {
        event.preventDefault();
        var $anchor = $(this);
        var inicio = (this.getAttribute('href'));
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 2550, 'easeInOutExpo');
    });

    //cuando se esta al principio de la pagina se oculta del boton
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    //boton que lleva hasta la parte superior
    $('.scrollup').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1550, 'easeInOutExpo');
        return false;
    });

    //collapsa el menu desplegado al selecionar un elemento
    $(document).on('click', '.navbar-collapse.in', function (e) {
        if ($(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle') {
            $(this).collapse('hide');
        }
    });

});

//weather
$(document).ready(function () {

    $.simpleWeather({
        location: 'Burgos, Spain',
        unit: 'c',
        success: function (weather) {
            html = '<h2 class="temperature"><i class="icon-' + weather.code + '"></i> ' + weather.temp + '&deg;' + weather.units.temp + '</h2>';
            html += '<ul><li>' + weather.city + ', ' + weather.region + '</li>';
            html += '<li class="currently">' + weather.currently + '</li>';
            html += '<li>' + weather.wind.direction + ' ' + weather.wind.speed + ' ' + weather.units.speed + '</li></ul>';

            $("#weather").html(html);
        },
        error: function (error) {
            $("#weather").html("<p>" + error + "</p>");
        }
    });
});

function cargarPagina(nomPagina) {
    $('#contentAjax').load(nomPagina);

}

function cerrar() {
    $("#miModal").fadeOut();
    $("#miModal").hide();
}


function barraProgerso(valeur) {
    //console.log(valeur);
    /* $('input:checked').each(function () {
         if ($(this).attr('value') > valeur) {
             valeur = $(this).attr('value');
         }
     });*/
    $('.progress-bar').css('width', valeur + '%').attr('aria-valuenow', valeur, '');
    $('.progress-bar').text(valeur + "%");

    //CIERRA LA VENTANA AL ACABAR LA CARGA
    // if (valeur >= 100) $('#portada').css('display', 'block');
    //if (valeur >= 100) cerrar();

    if (valeur >= 100) $("#portada").fadeIn(1300);

}


/******************/
/*                */
/*    AUDIO       */
/*                */
/******************/
//RENDERIZA EL AUDIO Y LO MUESTA EN EL DIV #waveform
function renderizaMP3(audio) {
    // Create an instance
    //var wavesurfer = Object.create(WaveSurfer);

    // Init & load audio file
    //	document.addEventListener('click', function () {
    var options = {
        container: document.querySelector('#waveform'),
        waveColor: '#F04634',
        progressColor: 'purple',
        cursorColor: 'navy',
        height: '50'
    };

    if (location.search.match('scroll')) {
        options.minPxPerSec = 100;
        options.scrollParent = true;
    }

    // Init
    wavesurfer.init(options);
    // Load audio from URL
    wavesurfer.load('audio/' + audio);

    // Regions
    if (wavesurfer.enableDragSelection) {
        wavesurfer.enableDragSelection({
            color: 'rgba(0, 255, 0, 0.1)'
        });
    }
    //});
} //renderizaMP3

function playAudio() {
    wavesurfer.playPause();
} //playAudio

function stopAudio() {
    wavesurfer.destroy();
    /*if(wavesurfer.isPlaying()) {
        wavesurfer.pause();
    }*/

} //stopAudio

//Evento sobre el control de volumen
function renderVol() {
    var element2 = $('#12').jScrollPane({
        verticalDragMaxHeight: 25,
        verticalDragMinHeight: 25,
    });

    //posiciono el fader en una posicion px
    var api2 = element2.data('jsp'); //creo un objeto jscrollpane
    api2.scrollBy(0, 100);
    var pos = parseFloat(api2.getPercentScrolledY());
    //alert(pos); //muestra rango del fader 0-1
    $("#valueSlider2").val(pos);


    //evento para detectar el desplazamiento del eje Y
    $('#12').bind('jsp-scroll-y',
        function (event) {
            pos = parseFloat(api2.getPercentScrolledY());
            $("#valueSlider2").val(1 - pos); //1-pos para invertir el rango
            wavesurfer.setVolume(1 - pos);
        }
    );

} //renderVol



//ajusta el tamaño de las fotos del slider para que ocupe todo el espacio
/*
function ajustarSlider() {
    // Crop Images in Image Slider

    // adds .naturalWidth() and .naturalHeight() methods to jQuery for retrieving a normalized naturalWidth and naturalHeight.
    (function ($) {
        var
            props = ['Width', 'Height'],
            prop;

        while (prop = props.pop()) {
            (function (natural, prop) {
                $.fn[natural] = (natural in new Image()) ?
                    function () {
                        return this[0][natural];
                    } :
                    function () {
                        var
                            node = this[0],
                            img,
                            value;

                        if (node.tagName.toLowerCase() === 'img') {
                            img = new Image();
                            img.src = node.src,
                                value = img[prop];
                        }
                        return value;
                    };
            }('natural' + prop, prop.toLowerCase()));
        }
    }(jQuery));

    var
        carousels_on_page = $('.carousel-inner').length,
        carouselWidth,
        carouselHeight,
        ratio,
        imgWidth,
        imgHeight,
        imgRatio,
        imgMargin,
        this_image,
        images_in_carousel;

    for (var i = 1; i <= carousels_on_page; i++) {
        $('.carousel-inner').eq(i - 1).addClass('id' + i);
    };

    function imageSize() {
        setTimeout(function () {
            for (var i = 1; i <= carousels_on_page; i++) {
                carouselWidth = $('.carousel-inner.id' + i + ' .item').width();
                carouselHeight = $('.carousel-inner.id' + i + ' .item').height();
                ratio = carouselWidth / carouselHeight;

                images_in_carousel = $('.carousel-inner.id' + i + ' .item img').length;

                for (var j = 1; j <= images_in_carousel; j++) {
                    this_image = $('.carousel-inner.id' + i + ' .item img').eq(j - 1);
                    imgWidth = this_image.naturalWidth();
                    imgHeight = this_image.naturalHeight();
                    imgRatio = imgWidth / imgHeight;

                    if (ratio <= imgRatio) {
                        imgMargin = parseInt((carouselHeight / imgHeight * imgWidth - carouselWidth) / 2, 10);
                        this_image.css("cssText", "height: " + carouselHeight + "px; margin-left:-" + imgMargin + "px;");
                    } else {
                        imgMargin = parseInt((carouselWidth / imgWidth * imgHeight - carouselHeight) / 2, 10);
                        this_image.css("cssText", "width: " + carouselWidth + "px; margin-top:-" + imgMargin + "px;");
                    }
                }
            };
        }, 1000);
    };

    imageSize();
    $(window).resize(function () {
        $('.carousel-indicators .first').click();
        imageSize();

    });

}
*/



function verFoto(foto, nombre) {
    //$('#dialog').dialog("close");
    $("#imagePreview").attr("src", "./images/fotos/" + foto);
    $("#dialog").dialog({
        modal: false,
        autoOpen: false,
        width: 'auto',
        resizable: false,
        title: nombre,
        dialogClass:"myClass",
        show: {
            effect: "slide",
            duration: 500
        },
        hide: {
            effect: "slide",
            duration: 500
        },
        position: {
            my: "center top",
            at: "center top+90",
            of: window,
         },
        close: function (event, ui) {
             $('#imagePreview').attr("src", "");
        },
    });
    //$('#dialog').parent().css("top", "180px");
    $("#dialog").dialog("open");
    
    //$("#dialog").dialog({height:'auto', width:'auto'});
    //$("[role='dialog']").css("top", "180px");
    



    /* $("#dialog").dialog({
         
         modal: true,
         autoOpen: false,
         width: 'auto',
         position: {
             my: "center",
             at: "center",
             //of: $("#jsGrid")
         },

         //limpia la ventana de dialogo Jquery UI
         close: function (event, ui) {
             $('#imagePreview').attr("src", "");
         }
     });*/
}

/*
function verMas(id) {
    //hace la busqueda
    $.ajax({
        type: "POST",
        url: "includes/buscar.php",
        data: "b=" + id,
        dataType: "html",
        beforeSend: function () {
            //imagen de carga
            document.getElementById('sitio').style.display = 'block';
            // $("#sitio").html("<p align='center'><img src='images/loading.gif' /></p>");
        },
        error: function () {
            alert("error peticion ajax");
        },
        success: function (data) {
            $("#sitio").empty();
            $("#sitio").append(data);
        }
    });
}
*/
