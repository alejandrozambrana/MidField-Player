/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
  //  variable global
  var banquilloDesplegado = false;
  
  $("#mostrarJugadores").slideUp();
  
  /*//////////////////////////// login ///////////////////////// */
  //Bloquea los botones del fondo
  $("#capaBloquearBotones").hide();
  
  //muestra el cuadro de login y bloquea el fondo
  $(document).on("click", "#botonIdentificate", function () {
    $("#login").fadeIn("slow");
    $("#capaBloquearBotones").fadeIn();
  });
  
  //validacion del login
  $("#loginformulario").validate({
    rules:{
      usuario: "required",
      contraseña: "required"
    },
    messages: {
      usuario: "Introduzca un Usuario",
      contraseña: "Introduzca la contraseña"
        
    }
  });
  
  //muestra el cuadro de registro y bloquea el fondo
  $(document).on("click", "#botonRegistro", function () {
    $("#registro").fadeIn("slow");
    $("#capaBloquearBotones").fadeIn();
  });
  
  //validacion del registro
  $("#formulario").validate({
    rules:{
      nombre: "required",
      apellidos: "required",
      nomEqui: "required",
      nomUsuario: "required",
      email: "required",
      contrasena: {
          required:true,
          minlength: 8
      }
    },
    messages: {
      nombre: "Rellena este campo",
      apellidos: "Rellena este campo",
      nomEqui: "Rellena este campo",
      nomUsuario: "Rellena este campo",
      email: "Introduzca un email",
      contrasena: "La contraseña debería tener al menos 8 caracteres, 1 dígito, 1 minúscula, 1 mayúscula, 1 caracter no alfanuméricos"
    }
      
  });
//  oculta el cuadro de registro y habilita el fondo
  $(document).on("click", ".crearUsuario", function () {
    nomUsuario = $("#nombreUsu").val();
    email = $("#email").val();
    contrasena = $("#contrasena").val();
    nombre = $("#nombreId").val();
    apellidos = $("#apellidosId").val();
    nomEqui = $("#nomEquiId").val();
    escudoId = $("#escudoId").val();
    //oculta la ventana si no hay nada en oculta
    if(nomUsuario != "" && email != "" && contrasena != "" && nombre != "" && apellidos != "" && nomEqui != ""){
      $("#registro").fadeOut("slow");
      $("#capaBloquearBotones").hide();
    }	
  });
  
  //oculta el cuadro de login y habilita el fondo
  $(document).on("click", ".cerrar", function () {
    $("#login").fadeOut("slow");
    $("#registro").fadeOut("slow");
    $(".informacion").slideUp("slow");
    $("#capaBloquearBotones").fadeOut();
    $("#formularioUnirteLiga").slideUp();
    $("#formularioCrearLiga").slideUp();
    $("#capaBloquearBotonesLiga").fadeOut();
  }); 
  
  //muestra la informacion y bloquea el fondo
  $(document).on("click", "#contacto", function () {
    $(".informacion").slideDown("slow");
    $("#capaBloquearBotones").fadeIn();
  });
  
  /*//////////////////////// Pagina principal //////////////////////*/
  //Oculta el menu 
  $(document).on("click", "#cierreMenu", function () {
    //si el width es igual a 0 muestra el menu y cambia el icono
    if($("#menu").width() === 0){
      $("#cierreMenu").empty();
      $("#cierreMenu").append("<i class='fa fa-chevron-left fa-2x' aria-hidden='true'></i>");
      $("#menu").show();
      $("#cierreMenu").animate({left: "280px"});
      $("#menu").animate({width: "280px"});
    }else{
      //si el width es diferente a 0 oculta el menu y cambia el icono
      $("#cierreMenu").empty();
      $("#cierreMenu").append("<i class='fa fa-chevron-right fa-2x' aria-hidden='true'></i>");
      $("#cierreMenu").animate({left: "0px"});
      $("#menu").animate({width: "0px"}, function () {
      $("#menu").hide();
      });
    }   
  });
  
  //Mueve campo Muestra y oculta Jugadores 
  $(document).on("click", "#btnMostrarJugadores", function () { 
    $("#parteAltaCampo").slideToggle();
    $("#mostrarJugadores").slideToggle();
    //comprueba la altura del div mostrar jugadores y mueve el boton de desplegar ese menu
    if($("#mostrarJugadores").height() === 1){
      banquilloDesplegado = true;
      $("#btnMostrarJugadores").animate({bottom: "160px"});
      //Borra lo que hay dentro
      $("#btnMostrarJugadores").empty();
      //añade el nuevo icono
      $("#btnMostrarJugadores").append("<i class='fa fa-chevron-down fa-2x' aria-hidden='true'></i>");
      //mueve el campo de posicion si la pantalla es mas pequeña de esta resolucion
      if ($(window).height() <= 770) {  
        $("#parteBajaCampo").css({"top": "-40px"});
      }
      //mueve alineacion para arriba
      $("#contenedorJugadores").animate({top: "-90px", left:"-10px"});
      $(".tituloLogin").animate({top: "-60px"});
      //cierra menu lateral
      $("#cierreMenu").empty();
      $("#cierreMenu").append("<i class='fa fa-chevron-right fa-2x' aria-hidden='true'></i>");
      $("#cierreMenu").animate({left: "0px"});
      $("#menu").animate({width: "0px"}, function () {
        $("#menu").hide();
      });
//      quita el banner de la pelota
      $(".contenedorBanner").hide();
//      //disminuye el tamaño de los jugadores
//      $(".jugCampo").animate({width: "75px", height:"60px"});
//      $(".imagenJugador").animate({width: "40.5px"});
//      $(".imagenJugador").css({"transform": "scale(1.8)", "top": "28px", "borderRadius": "0px 27px 10px 10px"});
//      $(".contenedorImagenJug").animate({width: "45px", height: "45px"});
//      $(".imagenEquipo").css({"top": "0px", "left": "5px", "width": "10px"});
//      $(".triangulo").css({"borderLeft": "37.5px solid transparent", "borderRight": "37.5px solid transparent"});
//      $(".nombrejugador").animate({fontSize: "10px"});
//      $(".posicion").animate({fontSize: "10px", top: "-9px"});
    }else{
      banquilloDesplegado = false;
      $("#btnMostrarJugadores").animate({bottom: "0px"});
      //Borra lo que hay dentro
      $("#btnMostrarJugadores").empty();
      //añade el nuevo icono
      $("#btnMostrarJugadores").append("<i class='fa fa-chevron-up fa-2x' aria-hidden='true'></i>");
      //mueve el campo de posicion si la pantalla es mas pequeña de esta resolucion
      if ($(window).height() <= 770) {  
        $("#parteBajaCampo").css({"top": "-110px"});
      }
      //mueve alineacion para abajo
      $("#contenedorJugadores").animate({top: "0px", left: "0px"});
      $(".tituloLogin").animate({top: "0px"});
      
      //      quita el banner de la pelota
      $(".contenedorBanner").show();
      
//      //disminuye el tamaño de los jugadores
//      $(".jugCampo").animate({width: "100px", height:"80px"});
//      $(".imagenJugador").animate({width: "54px"});
//      $(".imagenJugador").css({"transform": "scale(2)", "top": "37px", "borderRadius": "0px"});
//      $(".contenedorImagenJug").animate({width: "60px", height: "60px"});
//      $(".imagenEquipo").css({"top": "3px", "left": "8px", "width": "14px"});
//      $(".triangulo").css({"borderLeft": "50px solid transparent", "borderRight": "50px solid transparent"});
//      $(".nombrejugador").animate({fontSize: "14px"});
//      $(".posicion").css({"fontSize": "14px", "top": "0px"});
    }
  });
  
  
    ///////////////////////////////////////////////////////////////////////////
    /*////////////////////////////Traspasos///////////////////////////////////*/
    //Oculta el menu de busqueda
    $("#contenedorBusqueda").animate({width: "0px"});
    $(document).on("click", "#buscar", function () {
      //si el width es igual a 0 muestra el menu y cambia el icono
      if($("#contenedorBusqueda").width() === 0){
        $("#contenedorBusqueda").show();
        $("#buscar").animate({right: "280px"});
        $("#contenedorBusqueda").animate({width: "280px"});
      }else{
        //si el width es diferente a 0 oculta el menu
        $("#buscar").animate({right: "0px"});
        $("#contenedorBusqueda").animate({width: "0px"}, function () {
        $("#contenedorBusqueda").hide();
        });
      }   
    });
    
    //BUSQUEDA AVANZADA
    $(document).on("keypress keyup", "#buscarNombre", function () {
      var valor = $("#buscarNombre").val();
      $.get("./listaTraspasosController.php",
        {
          busqueda: valor
        },
        function (data) {
          //vuelve a pintar el listado
          $(".contenedor").html(data);
      });//get
    });
    
    //BUSQUEDA por posicion
    $(document).on("click", "#buscarPosicion", function () {
      var valor = $("#buscarPosicion").val();
      $.get("./listaTraspasosController.php",
        {
          busquedaPos: valor
        },
        function (data) {
          //vuelve a pintar el listado
          $(".contenedor").html(data);
      });//get
    });
    //BUSQUEDA por equipo
    $(document).on("click", "#buscarEquipo", function () {
      var valor = $("#buscarEquipo").val();
      $.get("./listaTraspasosController.php",
        {
          busquedaEqui: valor
        },
        function (data) {
          //vuelve a pintar el listado
          $(".contenedor").html(data);
      });//get
    });
    //BUSQUEDA por dinero
    $(document).on("keypress keyup", "#buscarDineroMin", function () {
      var valor = $("#buscarDineroMin").val();
      $.get("./listaTraspasosController.php",
        {
          busquedaDineroMin: valor
        },
        function (data) {
          //vuelve a pintar el listado
          $(".contenedor").html(data);
      });//get
    });
    $(document).on("keypress keyup", "#buscarDineroMax", function () {
      var valor = $("#buscarDineroMax").val();
      $.get("./listaTraspasosController.php",
        {
          busquedaDineroMax: valor
        },
        function (data) {
          //vuelve a pintar el listado
          $(".contenedor").html(data);
      });//get
    });
    
    //Fichar jugador nuevo
    $(document).on("click", ".botonFichar", function () {
      codjug = $(this).data("codjug");
      codusu = $(this).data("codusu");
      dinero = $(this).data("moneda");
      dineroUsuario = $(".datos span").html();
      jugadoresNull = $(this).data("null");
      $("#dialogoComprar").dialog("open");
    });
    
    $("#dialogoComprar").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      buttons: {
        "Comprar": function () {
          //cierra ventana dialogo				
          $(this).dialog("close");
          $.ajax({
            url: "./ficharJugadores.php",
            data: {codusu: codusu,
                   codjug: codjug,
                   dinero: dinero
                   },
            type: "post",
            cache: false,
            success: function(){
              $(".contenedor").load('./listaTraspasosController.php');
              if(dineroUsuario < dinero){
                $("#mensaje").load("../../View/mensajeLimiteDinero.php", function (){
                  $("#errorVender").delay(2000).fadeOut();
                });
              }
              if(jugadoresNull === 0){
                $("#mensaje").load("../../View/mensajeLimitejugadores.php", function (){
                  $("#errorVender").delay(2000).fadeOut();
                });
              }
            }
          });
        }, 
        "Cancelar": function () {
          $(this).dialog("close");
        }
      }
    });
    
  
    /*////////////////////vender jugadores////////////////////////////////////*/
    
    $(document).on("click", ".botonVender", function () {
      codjug = $(this).data("codjug");
      codusu = $(this).data("codusu");
      dinero = $(this).data("monedas");
      posicion = $(this).data("posicioncampo");
      $("#dialogoVender").dialog("open");
    });
    
    $("#dialogoVender").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      buttons: {
        "Vender": function () {
          //cierra ventana dialogo				
          $(this).dialog("close");
          $.ajax({
            url: "./venderJugador.php",
            data: {codusu: codusu,
                   codjug: codjug,
                   dinero: dinero
                   },
            type: "post",
            cache: false,
            success: function(){
              $(".contenedor").load('./listadoPlantillaController.php', function (){
                muestraPuntos();
              });
              if(posicion < 12){
                $("#mensaje").load("../../View/mensajeErrorVender.php", function (){
                  muestraPuntos();
                  $("#errorVender").delay(2000).fadeOut();
                });
              }
            }
          });
        }, 
        "Cancelar": function () {
          $(this).dialog("close");
        }
      }
    });
    muestraPuntos();
    
    /*//////////////////////////advertencia Liga ///////////////////*/
    
    if($("#cerrarAdvertencia").data("liga") === "nulo"){
      $(".advertenciaSinLiga").delay(1000).animate({"top": "85%"});
      $(document).on("click", "#cerrarAdvertencia", function () {
        $(".advertenciaSinLiga").animate({"top" : "100%"},function(){
          $(".advertenciaSinLiga").hide();
        });
      });
    }
   
     /*///////////////////////////Agregar Liga///////////////////////////////////*/

    $(document).on("click", ".UnirteLiga", function () {
      //Añadimos la imagen de carga en el contenedor
      $('#mensaje').html('<div><img src="../../View/Multimedia/imagen/loading.gif"/></div>');
      $('#mensaje').load("../../View/unirteLiga.php", function(){
        $('#capaBloquearBotonesLiga').hide().slideDown();
        $('#formularioUnirteLiga').hide().slideDown();
      });
    });
    
    /*////////////////////// ajax de unirte y crear liga///////////////////////////////*/
    $(document).on("click", ".botonUnirte", function () {
      idUsuario = $(".fondo").attr("name");
      codLiga = $("#seleccionaLiga").val();
      participantes = $("#seleccionaLiga option[value="+ codLiga +"]").data("participantes");
      nombreLiga = $(".nombreLiga").val();
      
      $.get("./unirteLiga.php",
          {
            idUsuario: idUsuario,
            codLiga: codLiga,
            participantes: participantes,
            nombreLiga: nombreLiga
            
          }, function(){
            $('#capaBloquearBotonesLiga').slideUp();
            $('#formularioCrearLiga').slideUp();
            $('#formularioUnirteLiga').slideUp(function(){
              location.reload();
            });
          });//get
      });
    
    /*////////////////////////////Crear Liga/////////////////////////////////*/
    $(document).on("click", ".crearLiga", function () {
      //Añadimos la imagen de carga en el contenedor
      $('#mensaje').html('<div><img src="../../View/Multimedia/imagen/loading.gif"/></div>');
      $('#mensaje').load("../../View/crearLiga.php", function(){
        $('#capaBloquearBotonesLiga').hide().slideDown();
        $('#formularioCrearLiga').hide().slideDown();
      });
    });
    
    
    /*////////////////cerrar cuadro pinchando fuera/////////////////////////*/
    $(document).on("click", "#capaBloquearBotonesLiga", function () {
      $('#formularioCrearLiga').slideUp();
      $("#formularioUnirteLiga").slideUp();
      $("#capaBloquearBotonesLiga").slideUp();
    });

    /*////////////////////////modificar ajustes/////////////////////////////*/
//    $(document).on("click", "#botonModificarAjustes", function () {
//      nombre = $("#nombreId").val();
//      apellido = $("#apellidosId").val();
//      nombreEqui = $("#nomEquiId").val();
//      nombreUsu = $("#nombreUsu").val();
//      email = $("#email").val();
//      contraseña = $("#contrasena").val();
//      codUsu = $(".fondo").attr("name");
//      console.log(nombre,apellido, nombreEqui, nombreUsu, email, contraseña, codUsu);
//      
//      $.get("./modificarAjustes.php",{
//        nombre : nombre,
//        apellido : apellido,
//        nombreEqui : nombreEqui,
//        nombreUsu : nombreUsu,
//        email : email,
//        contraseña : contraseña,
//        codUsu : codUsu
//      });
//    });

    //validacion de ajustes
    $("#formularioAjustes").validate({
        rules:{
            nombreUs: "required",
            apellidos: "required",
            nomEqui: "required",
            nomUsuario: "required",
            email: "required",
            contrasena: {
                required:true,
                minlength: 8
            }
        },
        messages: {
            nombreUs: "Rellena este campo",
            apellidos: "Rellena este campo",
            nomEqui: "Rellena este campo",
            nomUsuario: "Rellena este campo",
            email: "Introduzca un email",
            contrasena: "Introduzca una contraseña"
        }
    });

    /*///////////////////////////////Borrar cuenta///////////////////////////////*/
    $(document).on("click", "#botonBorrarCuenta", function () {
      codUsu = $(".fondo").attr("name");
      $("#dialogoBorrarCuenta").dialog("open");      
    });
    
    $("#dialogoBorrarCuenta").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      buttons: {
        "Borrar": function () {
          //cierra ventana dialogo				
          $(this).dialog("close");
          $.ajax({
            url: "./borrarCuenta.php",
            data: {codUsu : codUsu},
            type: "post",
            cache: false,
            success: function () {
              window.location.href = '../../index.php';
            }
          });
        }, 
        "Cancelar": function () {
          $(this).dialog("close");
        }
      }
    });
    
  /*/////////////////////////////ADMINISTRADOR/////////////////////////////////*/
    
  /*///////////////////////////////Borrar fila///////////////////////////////*/
    $(document).on("click", "#botonEliminar", function () {
      tabla = $(this).data("tabla");
      codigo = $(this).data("codigo");
      campo = $(this).data("campo");
      $("#borraFila").dialog("open"); 
    });
    
    $("#borraFila").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      buttons: {
        "Borrar": function () {
          //cierra ventana dialogo				
          $(this).dialog("close");
          $.ajax({
            url: "./eliminar.php",
            data: {tabla : tabla,
                   codigo : codigo,
                   campo: campo
                 },
            type: "post",
            cache: false,
            success: function(){
              if(tabla === "usuarios"){
                $("#tablaUsuarios").load('./menuAdministradorTabla.php');
              }else if(tabla === "jugadores"){
                $("#tablaJugadores").load('./jugadoresAdminTabla.php');
              } else if(tabla === "equipo"){
                $("#tablaEquipo").load('./equipoAdminTabla.php');
              } else if(tabla === "liga"){
                $("#tablaLiga").load('./ligaAdminTabla.php');
              } else if(tabla === "posiciones"){
                $("#tablaPosiciones").load('./posicionesAdminTabla.php');
              }
            }
          });
        }, 
        "Cancelar": function () {
          $(this).dialog("close");
        }
      }
    });
    
    /*///////////////////////////////Modificar fila///////////////////////////////*/
    $(document).on("click", "#botonModificar", function () {
      tabla = $(this).data("tabla");
      codigo = $(this).data("codigo");
      if(tabla === "usuarios"){
        nombreUsu = $(this).data("pru");
        email = $(this).data("email");
        contrasena = $(this).data("contraseña");
        nombre = $(this).data("nombre");
        apellidos = $(this).data("apellidos");
        monedas= $(this).data("monedas");
        tipoUsu = $(this).data("tip");
        nomEquipo = $(this).data("equi");
        codLiga = $(this).data("liga");
        console.log(codLiga, nomEquipo );
  //      inserta datos en los inputs
        $("#cuadroModificar #campo1").val(nombreUsu);
        $("#cuadroModificar #campo2").val(email);
        $("#cuadroModificar #campo3").val(contrasena);
        $("#cuadroModificar #campo4").val(nombre);
        $("#cuadroModificar #campo5").val(apellidos);
        $("#cuadroModificar #campo6").val(monedas);
        $("#cuadroModificar #campo7").val(tipoUsu);
        $("#cuadroModificar #campo8").val(nomEquipo);
        $("#cuadroModificar #campo10").val(codLiga);
      } else if(tabla === "jugadores"){
        nombreJug = $(this).data("pru");
        precio = $(this).data("precio");
        img = $(this).data("img");
        puntos = $(this).data("puntos");
        equipo = $(this).data("equipo");
        posicion= $(this).data("posicion");
//      inserta datos en los inputs
        $("#cuadroModificar #campo1").val(nombreJug);
        $("#cuadroModificar #campo2").val(precio);
        $("#cuadroModificar #campo3").val(img);
        $("#cuadroModificar #campo4").val(puntos);
        $("#cuadroModificar #campo5").val(equipo);
        $("#cuadroModificar #campo6").val(posicion);
      } else if(tabla === "equipo"){
        nombreEqui = $(this).data("pru");
        img = $(this).data("img");
//      inserta datos en los inputs
        $("#cuadroModificar #campo1").val(nombreEqui);
        $("#cuadroModificar #campo2").val(img);
      } else if(tabla === "liga"){
        nombreLiga = $(this).data("pru");
        parti = $(this).data("parti");
//      inserta datos en los inputs
        $("#cuadroModificar #campo1").val(nombreLiga);
        $("#cuadroModificar #campo2").val(parti);
      } else if(tabla === "posiciones"){
        nombrePosiciones = $(this).data("pru");
        abrevi = $(this).data("abrevi");
//      inserta datos en los inputs
        $("#cuadroModificar #campo1").val(nombrePosiciones);
        $("#cuadroModificar #campo2").val(abrevi);
      }
      $("#cuadroModificar").dialog("open"); 
    });
    
    $("#cuadroModificar").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      buttons: {
        "Modificar": function () {
          //cierra ventana dialogo				
          $(this).dialog("close");
          $.ajax({
            url: "./modificar.php",
            data: {tabla : tabla,
                   codigo: codigo,
                   campo1: $("#cuadroModificar #campo1").val(),
                   campo2: $("#cuadroModificar #campo2").val(),
                   campo3: $("#cuadroModificar #campo3").val(),
                   campo4: $("#cuadroModificar #campo4").val(),
                   campo5: $("#cuadroModificar #campo5").val(),
                   campo6: $("#cuadroModificar #campo6").val(),
                   campo7: $("#cuadroModificar #campo7").val(),
                   campo8: $("#cuadroModificar #campo8").val(),
                   campo9: $("#cuadroModificar #campo10").val()
                 },
            type: "post",
            cache: false,
            success: function(){
              if(tabla === "usuarios"){
                $("#tablaUsuarios").load('./menuAdministradorTabla.php');
              }else if(tabla === "jugadores"){
                $("#tablaJugadores").load('./jugadoresAdminTabla.php');
              }else if(tabla === "equipo"){
                $("#tablaEquipo").load('./equipoAdminTabla.php');
              }else if(tabla === "liga"){
                $("#tablaLiga").load('./ligaAdminTabla.php');
              } else if(tabla === "posiciones"){
                $("#tablaPosiciones").load('./posicionesAdminTabla.php');
              }
            }
          });
        }, 
        "Cancelar": function () {
          $(this).dialog("close");
        }
      }
    });
    
    /*///////////////////////////////añadir fila///////////////////////////////*/
    $(document).on("click", "#añadir", function () {
      tabla = $(this).data("tabla");
      $("#cuadroAñadir").dialog("open"); 
    });
    
    $("#cuadroAñadir").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      buttons: {
        "Añadir": function () {
          //cierra ventana dialogo				
          $(this).dialog("close");
          $.ajax({
            url: "./anadir.php",
            data: {tabla : tabla,
                   campo1: $("#cuadroAñadir #campo1").val(),
                   campo2: $("#cuadroAñadir #campo2").val(),
                   campo3: $("#cuadroAñadir #campo3").val(),
                   campo4: $("#cuadroAñadir #campo4").val(),
                   campo5: $("#cuadroAñadir #campo5").val(),
                   campo6: $("#cuadroAñadir #campo6").val(),
                   campo7: $("#cuadroAñadir #campo7").val(),
                   campo8: $("#cuadroAñadir #campo8").val(),
                   escudoId: $("#cuadroAñadir #escudoId").val(),
                   campo10: $("#cuadroAñadir #campo10").val()
                 },
            type: "post",
            cache: false,
            success: function(){
              if(tabla === "usuarios"){
                $("#tablaUsuarios").load('./menuAdministradorTabla.php');
              }else if(tabla === "jugadores"){
                $("#tablaJugadores").load('./jugadoresAdminTabla.php');
              }else if(tabla === "equipo"){
                $("#tablaEquipo").load('./equipoAdminTabla.php');
              }else if(tabla === "liga"){
                $("#tablaLiga").load('./ligaAdminTabla.php');
              }else if(tabla === "posiciones"){
                $("#tablaPosiciones").load('./posicionesAdminTabla.php');
              }
            }
          });
        }, 
        "Cancelar": function () {
          $(this).dialog("close");
        }
      }
    });
   
}); 

/*///////////////////////////Puntuacion////////////////////////////////*/
  function muestraPuntos(){
    $(".puntos").each(function(){
      puntos = $(this).html();
      if(puntos < 5 && puntos !== "NULL"){
        $(this).addClass("puntosRojo");
        $(this).prepend("<i class='fa fa-angle-double-down' aria-hidden='true'></i>");
      }else if (puntos >= 5 && puntos !== "NULL"){
        $(this).addClass("puntosVerde");
        $(this).prepend("<i class='fa fa-angle-double-up' aria-hidden='true'></i>");
      }else{
        $(this).addClass("puntosNulos");
        $(this).html("N/A");
      }
    });
  }

