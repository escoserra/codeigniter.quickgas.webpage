<?php
// date_default_timezone_set('America/Mazatlan');
defined('BASEPATH') OR exit('No direct script access allowed');
// define('XMLLIB',"http://www.w3.org/2001/XMLSchema");

class pagina_model extends CI_Model{

    function __construct(){
        parent::__construct();

    }


  // public function obtenerEstaciones()
  // {
  //   $estaciones = array(
  //       array("img" => base_url('assets/images/estaciones/conquista.jpg') , "clase"=>"culiacan","estacion"=>"Conquista","direccion" => "Culiacan No.1545451","consultar" => "Facturacion","facturar"=>"Facturar","noestacion"=>1327),
  //       array("img" => base_url('assets/images/estaciones/costerita.jpg') , "clase"=>"culiacan","estacion"=>"Conquista","direccion" => "Culiacan No.1545451","consultar" => "Facturacion","facturar"=>"Facturar","noestacion"=>1327),
  //       array("img" => base_url('assets/images/estaciones/ganadera.jpg') , "clase"=>"culiacan","estacion"=>"Conquista","direccion" => "Culiacan No.1545451","consultar" => "Facturacion","facturar"=>"Facturar","noestacion"=>1327),
  //       array("img" => base_url('assets/images/estaciones/guverid.jpg') , "clase"=>"culiacan","estacion"=>"Conquista","direccion" => "Culiacan No.1545451","consultar" => "Facturacion","facturar"=>"Facturar","noestacion"=>1327),
  //       array("img" => base_url('assets/images/estaciones/malecon.jpg') , "clase"=>"culiacan","estacion"=>"Conquista","direccion" => "Culiacan No.1545451","consultar" => "Facturacion","facturar"=>"Facturar","noestacion"=>1327),
  //       array("img" => base_url('assets/images/estaciones/trebol.jpg') , "clase"=>"culiacan","estacion"=>"Conquista","direccion" => "Culiacan No.1545451","consultar" => "Facturacion","facturar"=>"Facturar","noestacion"=>1327),
  //       array("img" => base_url('assets/images/estaciones/milenius1.jpg') , "clase"=>"culiacan","estacion"=>"Conquista","direccion" => "Culiacan No.1545451","consultar" => "Facturacion","facturar"=>"Facturar","noestacion"=>1327),
  //       array("img" => base_url('assets/images/estaciones/terranova.jpg') , "clase"=>"culiacan","estacion"=>"Conquista","direccion" => "Culiacan No.1545451","consultar" => "Facturacion","facturar"=>"Facturar","noestacion"=>1327),
  //       array("img" => base_url('assets/images/estaciones/angostura.jpg') , "clase"=>"angostura","estacion"=>"Conquista","direccion" => "Culiacan No.1545451","consultar" => "Facturacion","facturar"=>"Facturar","noestacion"=>1327),
  //       array("img" => base_url('assets/images/estaciones/descanso.jpg') , "clase"=>"guamuchil","estacion"=>"Conquista","direccion" => "Culiacan No.1545451","consultar" => "Facturacion","facturar"=>"Facturar","noestacion"=>1327),
  //       array("img" => base_url('assets/images/estaciones/guamuchil.jpg') , "clase"=>"guamuchil","estacion"=>"Conquista","direccion" => "Culiacan No.1545451","consultar" => "Facturacion","facturar"=>"Facturar","noestacion"=>1327)
  //   );
  //   return $estaciones;
  // }


   public function obtenerEstaciones()
  {
    $server = sprintf("https://rendiapps.ddns.net/restServer/api/ObtenerEmpresasQuick");
    // $server = sprintf("http://192.168.0.17:8080/obtenerDatosPoliza");

    $ch = curl_init($server);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datospost));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
    ));
    $result = curl_exec($ch);
    return json_decode($result);
  }


    public function asignarCorreoFacturacion($template)
  {
    $config = new stdClass();
    $config->servidor = "smtp.gmail.com";
    $config->correo = "rendiapps@gmail.com";
    $config->alias = "Grupo Escoserra";
    $config->contra = "smreomnqnvpzyisd";
    $config->puerto = "587";
    $config->zona = "America/Mazatlan";
    $config->debug = "html";
    $config->cifrado = "tls";
    $config->asunto = "Pagina QuickGas";
    $config->cuerpo = $template;
    $config->destino = "franciscotrizon@gmail.com";
    $config->destinoNombre = "franciscotrizon@gmail.com";
  return $config;
  }

  public function objMail($template)
  {

    $config =$this->asignarCorreoFacturacion($template);
    date_default_timezone_set($config->zona);
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = $config->debug;
    $mail->Host = $config->servidor;
    $mail->Port = $config->puerto;
    $mail->SMTPSecure = $config->cifrado;
    $mail->SMTPAuth = true;
    $mail->Username = $config->correo;
    $mail->Password = $config->contra;

    $mail->setFrom($config->correo, $config->alias);

    // foreach($destinos as $email)
    //   {
         $mail->AddCC("ggerardo@grupoescoserra.com","ggerardo@grupoescoserra.com");
         $mail->AddCC("mktcorporativo1@gmail.com","mktcorporativo1@gmail.com");
      // }

    // $mail->AddCC("ftrizon@grupoescoserra.com","ftrizon@grupoescoserra.com");
    // $mail->AddCC("franciscotrizon@gmail.com","franciscotrizon@gmail.com");

    $mail->Subject = $config->asunto;
    $mail->msgHTML($config->cuerpo);
  return $mail;
  }

}

?>
