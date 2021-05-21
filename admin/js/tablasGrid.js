/* JSGRID*/
/*ellipse en text area de la tabla*/
function ellipsisDescripcion() {
    $('.descripcion').on('click', function () {
        if ($(this).hasClass("ellipsisNo")) $(this).removeClass('ellipsisNo');
        else $(this).addClass('ellipsisNo');
    });
}


/*carga la tabla marcadores*/
function marcadores() {
    
    $("#dialog").dialog({
        modal: true,
        autoOpen: false,
        width: 'auto',
        position: {
            my: "center",
            at: "center",
            of: $("#jsGrid")
        },

        //limpia la ventana de dialogo Jquery UI
        close: function (event, ui) {
            $('#imagePreview').attr("src", "");
            $('#audioPreview').css({
                display: "none"
            });
        }
    });

   /* $.ajax({
        type: "GET",
        url: "core/users.php?nick=*"
    }).done(function(users) {
        users.unshift({ id: "0", nick: "" });
        alert(users[2].id);
    });*/
    
    $("#jsGrid").jsGrid("destroy");
    $("#jsGrid").jsGrid({

        //eventos genericos

        /*onDataLoading: function(args) {
           $('.ellipsis').hide();
            
        },*/

        onItemInserted: function (args) {
            $('#alertas').fadeIn('2000').html('<div class="alert alert-success alert-dismissable"><strong>Estupendo!</strong> Entrada realizada con exito.</div>').fadeTo(2000, 1500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });;

        }, // on done of controller.insertItem

        onItemUpdated: function (args) {
            $('#alertas').fadeIn('2000').html('<div class="alert alert-success alert-dismissable"><strong>Estupendo!</strong> Entrada actualizada con exito.</div>').fadeTo(2000, 1500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });;

        }, // on done of controller.updateItem

        onItemDeleted: function (args) {
            $('#alertas').fadeIn('2000').html('<div class="alert alert-success alert-dismissable"><strong>Estupendo!</strong> Entrada eliminada con exito.</div>').fadeTo(2000, 1500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });;

        }, // on done of controller.deleteItem

        height: "auto",
        width: "100%",

        filtering: true,
        inserting: true,
        editing: true,
        sorting: true,
        paging: true,
        autoload: true,

        pageSize: 8,
        pageButtonCount: 5,

        deleteConfirm: "Se eliminara la localizacion, ¿Quieres continuar?",

        controller: {
            loadData: function (filter) {
                return $.ajax({
                    type: "GET",
                    url: "core/markers.php",
                    data: filter
                });
            },

            insertItem: function (insertingItem) {
                var formData = new FormData();
                formData.append("latitud", insertingItem.latitud);
                formData.append("longuitud", insertingItem.longuitud);
                formData.append("foto", insertingItem.foto, insertingItem.foto.name);
                formData.append("nombre", insertingItem.nombre);
                formData.append("direccion", insertingItem.direccion);
                formData.append("descripcion", insertingItem.descripcion);
                formData.append("audio", insertingItem.audio, insertingItem.audio.name);

                return $.ajax({
                    method: "post",
                    type: "POST",
                    url: "core/markers.php",
                    data: formData,
                    contentType: false,
                    processData: false
                });
            },

            /*insertItem: function(item) {
                return $.ajax({
                    type: "POST",
                    url: "core/markers.php",
                    data: item
                });        
            },*/

            updateItem: function (updatingItem) {
                
                return $.ajax({
                    type: "PUT",
                    url: "core/markers.php",
                    data: updatingItem
                });
            },

            deleteItem: function (item) {
                return $.ajax({
                    type: "DELETE",
                    url: "core/markers.php",
                    data: item
                });
            }
        },

        //EVITA EL EDITADO A UN CLICK
        rowClick: function () {
            return 0;
        },

        fields: [
                        //{ name: "id", title: "ID", type: "text", width: 10 },
            {
                name: "latitud",
                title: "LATITUD",
                type: "text",
                align: "center",
                width: 35,
                filtering: false,
                css: "ellipsis"
            },
            {
                name: "longuitud",
                title: "LONGUITUD",
                type: "text",
                align: "center",
                width: 35,
                filtering: false,
                css: "ellipsis"
            },
            {
                name: "foto",
                title: "FOTO",
                type: "text",
                width: 50,
                filtering: false,
                align: "center",
                itemTemplate: function (val, item) {
                    var tt = item;
                    return $("<img>").attr("src", "../images/fotos/" + val).css({
                        height: 50,
                        width: 50
                    }).on("click", function () {
                        $("#imagePreview").attr("src", "../images/fotos/" + val);
                        $("#dialog").dialog("open");
                    });
                },
                insertTemplate: function () {
                    var insertControl = this.insertControl = $("<input>").prop("type", "file");
                    return insertControl;
                },
                /*editTemplate: function () {
                    var insertControl = this.insertControl = $("<input>").prop("type", "file");
                    return insertControl;
                },*/
                insertValue: function () {
                    return this.insertControl[0].files[0];
                },
            },
            {
                name: "nombre",
                title: "NOMBRE",
                type: "text",
                align: "center",
                width: 50,
                css: "ellipsis"
            },
            {
                name: "direccion",
                title: "DIRECCION",
                type: "text",
                align: "center",
                width: 50,
                css: "ellipsis"
            },
            {
                name: "descripcion",
                title: "DESCRIPCION",
                type: "textarea",
                align: "center",
                width: 100,
                filtering: false,
                css: "ellipsis descripcion"
            },
            {
                name: "audio",
                title: "AUDIO",
                type: "text",
                align: "center",
                width: 50,
                filtering: false,
                css: "ellipsis",
                itemTemplate: function (val, item) {
                    return $("<a>").text(val).attr("href", "#").css({
                        height: 50,
                        width: 50
                    }).on("click", function () {
                        $("#audioPreview").attr("src", "../audio/" + val).css({
                            display: "block"
                        });
                        $("#dialog").dialog("open");
                    });
                },
                //PERSONALIZA LA ENTRAD DEL CAMPO AL CREAR NUEVA ENTRADA
                insertTemplate: function() {
                    var insertControl = this.insertControl = $("<input>").prop("type", "file");
                    return insertControl;
                },
                /*editTemplate: function () {
                    var insertControl = this.insertControl = $("<input>").prop("type", "file");
                    return insertControl;
                },*/
                insertValue: function() {
                    return this.insertControl[0].files[0]; 
                }, 
            },
                        //{ name: "country_id", title: "Country", type: "select", width: 100, items: countries, valueField: "id", textField: "name" },
                        //{ name: "married", type: "checkbox", title: "Is Married", sorting: false, filtering: false },
            {
                type: "control",
                width: 20
            }
                    ]
    }).hide().fadeToggle(); //jsGrid

} //function


/* carga la tabla usuarios */
function usuarios() {
    $("#jsGrid").jsGrid("destroy");
    $("#jsGrid").jsGrid({

        //eventos genericos

        /*onDataLoading: function(args) {
           $('.ellipsis').hide();
            
        },*/

        onItemInserted: function (args) {
            $('#alertas').fadeIn('2000').html('<div class="alert alert-success alert-dismissable"><strong>Estupendo!</strong> Entrada realizada con exito.</div>').fadeTo(2000, 1500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });;

        }, // on done of controller.insertItem

        onItemUpdated: function (args) {
            $('#alertas').fadeIn('2000').html('<div class="alert alert-success alert-dismissable"><strong>Estupendo!</strong> Entrada actualizada con exito.</div>').fadeTo(2000, 1500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });;

        }, // on done of controller.updateItem

        onItemDeleted: function (args) {
            $('#alertas').fadeIn('2000').html('<div class="alert alert-success alert-dismissable"><strong>Estupendo!</strong> Entrada eliminada con exito.</div>').fadeTo(2000, 1500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });

        }, // on done of controller.deleteItem

        height: "auto",
        width: "100%",

        filtering: true,
        inserting: true,
        editing: true,
        sorting: true,
        paging: true,
        autoload: true,

        pageSize: 12,
        pageButtonCount: 5,

        deleteConfirm: "Se eliminara la localizacion, ¿Quieres continuar?",

        controller: {
            loadData: function (filter) {
                return $.ajax({
                    type: "GET",
                    url: "core/users.php",
                    data: filter
                });
            },

            insertItem: function (insertingItem) {
                var formData = new FormData();
                formData.append("nick", insertingItem.nick);
                formData.append("pass", insertingItem.pass);
                formData.append("email", insertingItem.email);
                //formData.append("foto", insertingItem.foto, insertingItem.foto.name);
                //formData.append("nombre", insertingItem.nombre);
                //formData.append("direccion", insertingItem.direccion);
                //formData.append("descripcion", insertingItem.descripcion);
                //formData.append("audio", insertingItem.audio);

                return $.ajax({
                    method: "post",
                    type: "POST",
                    url: "core/users.php",
                    data: formData,
                    contentType: false,
                    processData: false
                });
            },

            /*insertItem: function(item) {
                return $.ajax({
                    type: "POST",
                    url: "core/markers.php",
                    data: item
                });        
            },*/

            updateItem: function (item) {
                return $.ajax({
                    type: "PUT",
                    url: "core/users.php",
                    data: item
                });
            },

            deleteItem: function (item) {
                return $.ajax({
                    type: "DELETE",
                    url: "core/users.php",
                    data: item
                });
            }
        },

        //EVITA EL EDITADO A UN CLICK
        rowClick: function () {
            return 0;
        },

        fields: [
                        //{ name: "id", title: "ID", type: "text", width: 10 },
            {
                name: "id",
                title: "ID",
                type: "number",
                align: "center",
                width: 35,
                filtering: true,
                editable: false,
                css: "ellipsis"
            },
            {
                name: "nick",
                title: "NICK",
                type: "text",
                align: "center",
                width: 35,
                filtering: true,
                css: "ellipsis"
            },
           /* {
                name: "foto",
                title: "FOTO",
                type: "text",
                width: 50,
                filtering: false,
                align: "center",
                itemTemplate: function (val, item) {
                    return $("<img>").attr("src", "../images/fotos/" + val).css({
                        height: 50,
                        width: 50
                    }).on("click", function () {
                        $("#imagePreview").attr("src", "../images/fotos/" + val);
                        $("#dialog").dialog("open");
                    });
                },
                insertTemplate: function () {
                    var insertControl = this.insertControl = $("<input>").prop("type", "file");
                    return insertControl;
                },
                insertValue: function () {
                    return this.insertControl[0].files[0];
                },
            },*/
            {
                name: "pass",
                title: "PASS",
                type: "text",
                align: "center",
                width: 30,
                css: "ellipsis"
            },
            {
                name: "email",
                title: "EMAIL",
                type: "text",
                align: "center",
                width: 40,
                css: "ellipsis"
            },
            /*{
                name: "descripcion",
                title: "DESCRIPCION",
                type: "textarea",
                align: "center",
                width: 100,
                filtering: false,
                css: "ellipsis descripcion"
            },
            /*{
                name: "audio",
                title: "AUDIO",
                type: "text",
                align: "center",
                width: 50,
                filtering: false,
                css: "ellipsis",
                itemTemplate: function (val, item) {
                    return $("<a>").text(val).attr("href", "#").css({
                        height: 50,
                        width: 50
                    }).on("click", function () {
                        $("#audioPreview").attr("src", "../audio/" + val).css({
                            display: "block"
                        });
                        $("#dialog").dialog("open");
                    });
                },
                //PERSONALIZA LA ENTRAD DEL CAMPO AL CREAR NUEVA ENTRADA
                    insertTemplate: function() {
                        var insertControl = this.insertControl = $("<input>").prop("type", "file");
                        return insertControl;
                    },
                    insertValue: function() {
                        return this.insertControl[0].files[0]; 
                    }, 
            },*/
                        //{ name: "country_id", title: "Country", type: "select", width: 100, items: countries, valueField: "id", textField: "name" },
                        //{ name: "married", type: "checkbox", title: "Is Married", sorting: false, filtering: false },
            {
                type: "control",
                width: 20
            }
                    ]
    }).hide().fadeToggle(); //jsGrid
}