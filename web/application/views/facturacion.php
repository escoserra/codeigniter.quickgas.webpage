<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Facturacion</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->

  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?> " rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/aos/aos.css') ?>" rel="stylesheet"> 

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <link rel="shortcut icon" href="<? echo base_url('assets/img/favicon.png') ?>">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html">Facturación Electrónica<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" style="background-image: url(<?php echo base_url('assets/img/bg_Fact.jpg') ?>) ; background-size: cover;opacity: 0.9; ">

    <div class="container">
      

      <div class="row d-flex align-items-center">
      <div class="col-lg-6 py-5 py-lg-0 order-1 order-lg-1" data-aos="fade-right">
        <div style="padding-bottom: 0%;">
           <h2>BIENVENIDO A:</h2>
           <h2 style="white-space: nowrap;"><?php echo $empresa->razonsocial ?> </h2>
          <hr>
          <h2>PARA FACTURAR SE REQUIERE EL FOLIO Y CÓDIGO WEB QUE VIENEN IMPRESOS EN EL TICKET DE CONSUMO.</h2>
     
           <button type="button" class="btn btn-primary" onclick="window.open('http://<?php echo $empresa->servidor ?>/facturas/','_blank')">
            <!-- <i class="fa fa-search"></i> -->
             Consultar</button>
           <button type="button" class="btn btn-primary" onclick="window.open('http://<?php echo $empresa->servidor ?>/facturas/autofactura.aspx?','_blank')">
            <!-- <i class="fa fa-file"> </i>  -->
           Facturar</button>

        </div>
  
           <hr>         


              <div class="row d-flex align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="icon-small">
                       <i class="fa fa-calendar" style="font-size: 275%;" aria-hidden="true"> </i>
                       <h2 style="font-size: 100%;">Solo se pueden facturar tickets de no más de 7 días.</h2>
                    </span>
                     
                </div>

                <div class="col-lg-6" data-aos="fade-right">
                   <span class="icon-small">
                       <i class="fa fa-file-pdf-o" style="font-size: 275%;" aria-hidden="true"> </i>
                       <h2 style="font-size: 100%;">Para visualizar facturas es necesario tener instalado <a href="https://get.adobe.com/reader/?loc=es" target="_blank"><u>Abode Reader</u></a>.</h2>
                    </span>
                </div>

              </div>
      </div>
      <div class="col-lg-6 order-2 order-lg-2 hero-img" data-aos="fade-left">
        <img src="<?php echo base_url('assets/img/ticketdiesel.png') ?>" class="img-fluida" alt="">
    
        <div style="width: 60%;text-align: center;margin:  0% 10% 0% 10%;">
           <font style="display: inline-block;color:#fff;">Ejemplo de ticket</font>
        </div>
      </div>
    </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg" >
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-in">CONTACTANOS</h2>
          <!-- <p data-aos="fade-in">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box" data-aos="fade-up">
                  <i class="fa fa-map-marker"></i>
                  <h3>Dirección</h3>
                  <p><?php echo $empresa->direccion ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4" data-aos="fade-up" data-aos-delay="100">
                  <i class="fa fa-envelope"></i>
                  <h3>Correo</h3>
                  <p><?php echo $empresa->correo ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4" data-aos="fade-up" data-aos-delay="100">
                  <i class="fa fa-phone"></i>
                  <h3>Teléfono</h3>
                  <p><?php echo $empresa->telefono ?></p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <div class="alert alert-success" role="alert" id="alertaSuccess" style="display: none;">
              
            </div>

            <div class="alert alert-danger" role="alert" id="alertaError" style="display: none;">

            </div>
            <form action="<?php echo base_url('Facturacion/enviarCorreo') ?>" method="post" role="form" id="frmContacto" class="php-email-form" data-aos="fade-up">
              <input type="hidden" name="correoempresa" id="correoempresa" value="<?php echo $empresa->correo ?>">

              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo Electronico" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="mensaje" id="mensaje" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Comentario"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" id="btnEnviar">Enviar Mensaje</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->



  <!-- ======= Footer ======= -->
  <footer id="footer">

    

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span></span></strong>. Derechos reservados
      </div>
      

    </div>
  </footer><!-- End Footer -->

<!--   <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
 -->
  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/aos/aos.js') ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url('assets/js/main.js') ?>"></script>
  <script type="text/javascript">
    
  </script>
</body>

</html>