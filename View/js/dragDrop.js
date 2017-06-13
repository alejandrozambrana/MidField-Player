$( document ).ready(function() {
////drag and drog
   //Al pinchar sobre la ficha la pone mas oscura como si estuviera selecionada
    function inicioArrastre(e) {
      $(this).css({"opacity": "0.4"}); //pone la ficha selecionada con opacidad 
      dragSrcEl = this;

      e.dataTransfer.effectAllowed = 'move';
      e.dataTransfer.setData('text/html', this.innerHTML);
    }
    
    function arrastrar(e) {
      if (e.preventDefault) {
        e.preventDefault(); //nos permite soltar
      }
      
      this.classList.add('over');//al entrar le añade la clase over
      
      e.dataTransfer.dropEffect = 'move'; //ver los datos que vas a transferir
      
      return false;
    }

    function salirDiv(e) {
      $(this).css({"opacity": "1"}); //le quita la opacidad
      
      this.classList.remove('over');  //al salir le borra la clase over
    }
    
    function soltarDiv(e) {
      this.classList.remove('over');  //al salir le borra la clase over
      
      if (e.stopPropagation) {
        e.stopPropagation(); 
      }
      //cambia los datos de un div a otro
      if (dragSrcEl != this) {
        dragSrcEl.innerHTML = this.innerHTML;
        this.innerHTML = e.dataTransfer.getData('text/html');
      }
      e.stopPropagation(); // para la redireccion de los navegadores
      e.preventDefault();
      
      //posicion nueva para cambiarlo en la bbdd
      posicionNueva = $(this).data("posicion");
      codjugCambio = $(this).data("codjug");
      onceInicialCambio = $(this).data("titular");
      
      
//      if(banquilloDesplegado === true){
//        //cuando cambia un jugador del banquillo a el campo cambia el estilo
//        $(".jugCampo div:nth-child(1) img").css({"top": "0px", "left": "7px", "width": "10px"});
//        $(".jugCampo div:nth-child(1) img").removeClass("imagenEquipoBanquillo");
//        $(".jugCampo div:nth-child(1) img").addClass("imagenEquipo");
//        //posicion
//        $(".jugCampo div:nth-child(2)").removeClass("contenedorPosicionBanquillo");
//        $(".jugCampo div:nth-child(2)").addClass("contenedorPosicion");
//        $(".jugCampo div:nth-child(2) p").removeClass("posicionBanquillo");
//        $(".jugCampo div:nth-child(2) p").addClass("posicion");
//        $(".jugCampo div:nth-child(2) p").css({"fontSize": "10px", "top": "-9px"});
//        //imagen jugador
//        $(".jugCampo div:nth-child(3)").removeClass("contenedorImagenBanquillo");
//        $(".jugCampo div:nth-child(3)").addClass("contenedorImagenJug");
//        $(".jugCampo div:nth-child(3)").css({"width": "45px", "height": "45px"});
//        $(".jugCampo div:nth-child(3) img").removeClass("imagenJugadorBanquillo");
//        $(".jugCampo div:nth-child(3) img").addClass("imagenJugador");
//        $(".jugCampo div:nth-child(3) img").css({"transform": "scale(1.8)", "top": "28px", "borderRadius": "0px 27px 10px 10px", "display": "inline-block", "width": "40.5px"});
//        //nombre
//        $(".jugCampo p").removeClass("nombrejugadorBanquillo");
//        $(".jugCampo p").addClass("nombrejugador");
//        $(".jugCampo p").css({"fontSize": "10px"});
//        //triangulo
//        $(".jugCampo div:nth-child(5)").removeClass("trianguloBanquillo");
//        $(".jugCampo div:nth-child(5)").addClass("triangulo");
//        $(".jugCampo div:nth-child(5)").css({"borderLeft": "37.5px solid transparent", "borderRight": "37.5px solid transparent"});
//      }
      return false;
    }

    function terminarArrastrar(e) {
      $(this).css({"opacity": "1"}); //le quita la opacidad
      
//      //cuando cambia un jugador del banquillo a el campo cambia el estilo
//      $(".banquillo div:nth-child(1) img").css({"top": "3px", "left": "8px", "width": "14px"});
//      $(".banquillo div:nth-child(1) img").removeClass("imagenEquipo");
//      $(".banquillo div:nth-child(1) img").addClass("imagenEquipoBanquillo");
//      //posicion
//      $(".banquillo div:nth-child(2)").removeClass("contenedorPosicion");
//      $(".banquillo div:nth-child(2)").addClass("contenedorPosicionBanquillo");
//      $(".banquillo div:nth-child(2) p").removeClass("posicion");
//      $(".banquillo div:nth-child(2) p").addClass("posicionBanquillo");
//      $(".banquillo div:nth-child(2) p").css({"fontSize": "14px", "top": "0px"});
//      //imagen jugador
//      $(".banquillo div:nth-child(3)").removeClass("contenedorImagenJug");
//      $(".banquillo div:nth-child(3)").addClass("contenedorImagenBanquillo");
//      $(".banquillo div:nth-child(3)").css({"width": "60px", "height": "60px"});
//      $(".banquillo div:nth-child(3) img").removeClass("imagenJugador");
//      $(".banquillo div:nth-child(3) img").addClass("imagenJugadorBanquillo");
//      $(".banquillo div:nth-child(3) img").css({"transform": "scale(2)", "top": "37px", "borderRadius": "0px", "width": "54px"});
//      //nombre
//      $(".banquillo p").removeClass("nombrejugador");
//      $(".banquillo p").addClass("nombrejugadorBanquillo");
//      $(".banquillo p").css({"fontSize": "14px"});
//      //triangulo
//      $(".banquillo div:nth-child(5)").removeClass("triangulo");
//      $(".banquillo div:nth-child(5)").addClass("trianguloBanquillo");
//      $(".banquillo div:nth-child(5)").css({"borderLeft": "50px solid transparent", "borderRight": "50px solid transparent"});
      
      [].forEach.call(cols, function (col) {
        col.classList.remove('over');
      });
      
      //cambia el numero de la posicion en la bbdd
      
      posicionOriginal = $(this).data("posicion");
      idUsuario = $(".fondo").attr("name");
      codjug = $(this).data("codjug");
      onceInicial = $(this).data("titular");
      console.log("posicionOriginal:", posicionOriginal, 
               "posicionNueva:", posicionNueva,
               "idUsuario:", idUsuario,
               "codjug:", codjug,
               "onceInicial:", onceInicial,
              " codjugCambio:", codjugCambio,
               "onceInicialCambio:", onceInicialCambio);
      $.ajax({
        url: "./cambiaPosicion.php",
        data: {posicionOriginal: posicionOriginal, 
               posicionNueva: posicionNueva,
               idUsuario: idUsuario,
               codjug: codjug,
               onceInicial: onceInicial,
               codjugCambio: codjugCambio,
               onceInicialCambio: onceInicialCambio
               },
        type: "post",
        cache: false,
        success: function(){
          $("#contenedorJugadores").load('./jugadoresCampoController.php');
          $(".contenedorBanquillo").load('./banquilloController.php');
        }
      });
  }


    var cols = document.querySelectorAll('#contenedorJugadores .jugCampo, #mostrarJugadores .banquillo');
    [].forEach.call(cols, function(col) {
      col.addEventListener('dragstart', inicioArrastre, false);
      col.addEventListener('dragover', arrastrar, false);
      col.addEventListener('dragleave', salirDiv, false);
      col.addEventListener('drop', soltarDiv, false);
      col.addEventListener('dragend', terminarArrastrar, false);
    });
    });