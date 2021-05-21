//LOGIN METHODS
$(document).ready(function () {

    $('.login-input').on('focus', function () {
        $('.login').addClass('focused');
    });

    $("#add_err").css('display', 'none', 'important');

    //captura el submit del fomulario de login
    $("#formLog").submit(function (event) {
        event.preventDefault;
        username = $("#nick").val();
        password = $("#pass").val();
        token = $("#token").val();

        if (!validar(username, password)) return false;
        else loguear();

        return false;
    });
});

  function validar(username, password) {

      control = true;

      if (username == "" || password == "") {
          $.notify("Rellena todos los campos.", "info");
          control = false;
      } else {
          patron = /^[a-zA-Z0-9\s]{3,15}$/;
          if (username.search(patron)) {
              $.notify("Nick: Minimo 3, maximo 15 caracteres.", "warn");
              control = false;
          }
          patron = /^[a-zA-Z0-9]{3,20}$/;
          if (password.search(patron)) {
              $.notify("Password: Minimo 3, maximo 20 caracteres.", "warn");
              control = false;
          }
      }

      return control;
  }

  function loguear() {

      $.ajax({
          type: "POST",
          url: "core/login.php",
          data: "nick=" + username + "&pass=" + password + "&token=" + token,
          success: function (respuesta) {
              respuesta = parseInt(respuesta);
              switch (respuesta) {
                  case -1:
                      //location.reload();
                       $.notify("Error en los credenciales!", "error");
                      $('.login').removeClass('loading').addClass('focused');
                      break;

                  case 1:
                      window.location = "main.php";
                      break;

                  default:
                      $.notify("Error en los credenciales!", "error");
                      $('.login').removeClass('loading').addClass('focused');
                      break;

              } //switch
          },
          fail: function (respuesta) {
              if (respuesta == 0) {
                  $('.login').removeClass('loading').addClass('focused');
              }
          },
          beforeSend: function () {
              $('.login').removeClass('focused').addClass('loading').delay(800);
              /*$("#add_err").css('display', 'inline', 'important');
              $("#add_err").html("<img src='images/ajax-loader.gif' /> Loading...");*/
          }
      });
  }


  /*
  $('.login').on('submit', function(e) {
    e.preventDefault();
    $('.login').removeClass('focused').addClass('loading');
  });
  */
