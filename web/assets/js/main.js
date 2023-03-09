(function($) {
  
  "use strict";

  // Sticky Nav
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 200) {
            $('.scrolling-navbar').addClass('top-nav-collapse');
                 $("#logoHead").removeClass("imagenNoVisable");
                 $('.fixed-top').addClass('menu-bg');
        } else {
            $('.scrolling-navbar').removeClass('top-nav-collapse');
            $("#logoHead").addClass("imagenNoVisable");
               $('.fixed-top').removeClass('menu-bg');
        }
    });

    /* 
   One Page Navigation & wow js
   ========================================================================== */
    //Initiat WOW JS
    new WOW().init();

    // one page navigation 
    $('.main-navigation').onePageNav({
            currentClass: 'active'
    }); 

    $(window).on('load', function() {
       
        $('body').scrollspy({
            target: '.navbar-collapse',
            offset: 195
        });

        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 200) {
                 $("#logoHead").addClass("imagenVisable");
                 
            } else {
                $("#logoHead").removeClass("imagenVisable");
                

            }
        });

    });

    // Slick Nav 
    $('.mobile-menu').slicknav({
      prependTo: '.navbar-header',
      parentTag: 'span',
      allowParentLinks: true,
      duplicate: false,
      label: '',
    });


/* 
   CounterUp
   ========================================================================== */
    $('.counter').counterUp({
      time: 1000
    });

/* 
   MixitUp
   ========================================================================== */
  $('#portfolio').mixItUp();
  $("#btnCln").click();
/* 
   Touch Owl Carousel
   ========================================================================== */
    var owl = $(".touch-slider");
    owl.owlCarousel({
      navigation: false,
      pagination: true,
      slideSpeed: 1000,
      stopOnHover: true,
      autoPlay: true,
      items: 2,
      itemsDesktop : [1199,2],
      itemsDesktopSmall: [1024, 2],
      itemsTablet: [600, 1],
      itemsMobile: [479, 1]
    });

    $('.touch-slider').find('.owl-prev').html('<i class="fa fa-chevron-left"></i>');
    $('.touch-slider').find('.owl-next').html('<i class="fa fa-chevron-right"></i>');

/* 
   Sticky Nav
   ========================================================================== */
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 200) {
            $('.header-top-area').addClass('menu-bg');
        } else {
            $('.header-top-area').removeClass('menu-bg');
        }
    });

/* 
   VIDEO POP-UP
   ========================================================================== */
    $('.video-popup').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
    });


  /* 
   SMOOTH SCROLL
   ========================================================================== */
    var scrollAnimationTime = 1200,
        scrollAnimation = 'easeInOutExpo';

    $('a.scrollto').on('bind', 'click.smoothscroll', function (event) {
        event.preventDefault();
        var target = this.hash;
        
        // $('html, body').stop().animate({
        //     'scrollTop': $(target).offset().top
        // }, scrollAnimationTime, scrollAnimation, function () {
        //     window.location.hash = target;
        // });
    });

/* 
   Back Top Link
   ========================================================================== */
    var offset = 200;
    var duration = 500;
    $(window).scroll(function() {
      if ($(this).scrollTop() > offset) {
        $('.back-to-top').fadeIn(400);
      } else {
        $('.back-to-top').fadeOut(400);
      }
    });

    $('.back-to-top').on('click',function(event) {
      event.preventDefault();
      $('html, body').animate({
        scrollTop: 0
      }, 600);
      return false;
    })

/* Nivo Lightbox
  ========================================================*/   
   $('.lightbox').nivoLightbox({
    effect: 'fadeScale',
    keyboardNav: true,
  });


/* stellar js
  ========================================================*/
  $.stellar({
    horizontalScrolling: true,
    verticalOffset: 40,
    responsive: true
  });

/* 
   Page Loader
   ========================================================================== */
  $('#loader').fadeOut();

}(jQuery));
/*
 $("#tbEstaciones").DataTable({
      ajax: 'https://rendiapps.ddns.net/restServer/api/ObtenerEmpresasQuick',
      columns: [
          { title: "#"},
          { title: "Estacion"},
          { title: "Opciones",className: 'dt-center'}
      ],
      order: [ 0, 'asc'],
      responsive: true,
      bLengthChange: false,
      pageLength: 10,
      language: {
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar _MENU_ registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "",
          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "paginate": {
              "First":    "Primero",
              "Last":     "Último",
              "previous": "Anterior",
              "next": "Siguiente"
          },
          "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },

      dom: 'lrtip',
      buttons: []
  });
*/


      $(document).on("click",".facturar",function(e){
        let permiso = $(this).attr("permiso")
        let servidor = 'https://grupoescoserra.com/Facturacion/'+permiso;
        window.open(servidor,'_blank');
      })

      $(document).on("click",".consultar",function(e){
        let servidor = 'http://'+$(this).attr("servidor")+'/facturas';
        window.open(servidor,'_blank');
      })


      $(document).on("click",".historial",function(e){
        let boton = $(this);
        boton.attr("disabled","disabled");
        let datos = {folio: $(this).attr("estacion"),razon: $(this).attr("razonsocial")}
        // tblHistorial.clear().draw();
        $.get("https://rendiapps.ddns.net/restServer/api/ObtenerHistorialPrecios",datos,function(data){
          boton.removeAttr("disabled");
          if (!data.error) {
              bootbox.dialog({
              title: "Historial de precios: "+datos.razon,
              message: $('<div id="row">'+ 
                            '<table class="table" id="historialPrecios">'+
                                '<thead>'+
                                  '<tr>'+
                                    '<th>Fecha</th>'+
                                    '<th>Qregular</th>'+
                                    '<th>Qplus</th>'+
                                    '<th>Qdiesel</th>'+
                                ' </tr>'+
                                '</thead>'+
                                '<tbody id="bodyPrecios"></tbody>'+
                            '</table>'+
                        ' </div>'),
              size: "large",
              onEscape: false,
              buttons:{
                ok:{
                  label: "Cerrar",
                }
              }
            }).find('.modal-content').css({'margin-top':'20%'})

            $.fn.dataTable.moment('DD-MM-YYYY');

           let tblHistorial = $("#historialPrecios").DataTable({
                  order: [ 0, 'desc'],
                  columnDefs: [ {
                    "targets": [ 1,2,3 ],
                    "className": "dt-center"
                  } ],
                  responsive: true,
                  bLengthChange: false,
                  pageLength: 10,
                  language: {
                      "sProcessing":     "Procesando...",
                      "sLengthMenu":     "Mostrar _MENU_ registros",
                      "sZeroRecords":    "No se encontraron resultados",
                      "sEmptyTable":     "Ningún dato disponible en esta tabla",
                      "sInfo":           "",
                      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                      "sInfoFiltered":   "",
                      "sInfoPostFix":    "",
                      "sSearch":         "Buscar:",
                      "sUrl":            "",
                      "sInfoThousands":  ",",
                      "sLoadingRecords": "Cargando...",
                      "paginate": {
                          "First":    "Primero",
                          "Last":     "Último",
                          "previous": "Anterior",
                          "next": "Siguiente"
                      },
                      "oAria": {
                          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                      }
                  },

                  dom: '<"html5buttons"B>lTfgitp',
                  buttons: []

              });

               $.each(data.msg,function(i,item){
                tblHistorial.row.add([
                  item.fecha,
                  "$ "+parseFloat(item.magna).toFixed(2),
                  "$ "+parseFloat(item.premium).toFixed(2),
                  "$ "+parseFloat(item.diesel).toFixed(2)
                ]).draw().node();
              });
          }else {
            alert(data.msg)
          }


           
        },"json").fail(function(e,ex,error){
          boton.removeAttr("disabled");
          console.log(error)
        })

      })


$("#contactForm").on('submit',function(e){
    e.preventDefault();

    let url = $(this).attr("action");
    let datos = $(this).serialize();

    if (  $("#nombre").val() != "" && $("#correo").val() != "" && $("#mensaje").val() != ""  ) {
        $("#btnsubmit").css("pointer-events","none");
        $("#btnsubmit").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando');
         $.post(url,datos,function(data){
          $("#btnsubmit").removeAttr("style");
          $("#btnsubmit").html('Enviar Mensaje');

          if (data.error) {
            $("#alerterror").addClass('show');
            $("#errormsg").html(" "+data.msg);
            setTimeout(function(){  $("#alerterror").removeClass('show'); }, 3000);
          }else {
            $("#alertsuccess").addClass('show');
            $("#successmsg").html(" "+data.msg);
            $('#contactForm')[0].reset();

            setTimeout(function(){  $("#alertsuccess").removeClass('show'); }, 3000);
          }
        
          // $('#contactForm').data('bootstrapValidator').resetForm(true);

        },"json").fail(function(e,x,error){
          $("#btnsubmit").removeAttr("style");
          $("#btnsubmit").html('Enviar Mensaje');
          $("#alerterror").addClass('show');
          $("#errormsg").html(' '+error);
                setTimeout(function(){  $("#alerterror").removeClass('show'); }, 3000);
            })
    }else{
      $("#alerterror").addClass('show');
      $("#errormsg").html('Todos los campos son requeridos');
      setTimeout(function(){  $("#alerterror").removeClass('show'); }, 3000);
    }
 
  })