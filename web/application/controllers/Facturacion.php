<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturacion extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
 		$this->load->model('Facturacion_model','facturacion');
	}

	// public function index()
	// {
	// 	echo "string";
	// }

	public function estacion()
	{
		$idcre = $this->uri->segment(2);
		if (!is_null($idcre)) {
		//	$datos['empresa'] = (object) Modules::run('Login/get_informaciopermiso',$idcre);
			$empresa = $this->facturacion->obtenerEmpresa($idcre);
			if (isset($empresa->empresa->id)) {
				$datos['empresa'] = $empresa->empresa;
	     		$this->load->view("facturacion",$datos);
			}else{
				echo json_encode($aaaaaaaa);
			}
		}

	}

public function plantilla()
	{
			$_POST['correoempresa'] = "";
	        $_POST['nombre'] = "";
	        $_POST['correo'] = "";
	        $_POST['asunto'] = "";
	        $_POST['mensaje'] = "";
		        $datos = $_POST;

	   		$this->load->view("plantilla",$datos);
	


	}

	public function enviarCorreo()
	{
		require 'application/libraries/PHPMailer/PHPMailerAutoload.php';

		$response['error'] = TRUE;
	    if (
		    	isset($_POST['correoempresa']) && !empty($_POST['correoempresa']) && !is_null($_POST['correoempresa']) &&
		    	isset($_POST['nombre']) && !empty($_POST['nombre']) && !is_null($_POST['nombre']) &&
		    	isset($_POST['correo']) && !empty($_POST['correo']) && !is_null($_POST['correo']) &&
		    	isset($_POST['asunto']) && !empty($_POST['asunto']) && !is_null($_POST['asunto']) &&
		    	isset($_POST['mensaje']) && !empty($_POST['mensaje']) && !is_null($_POST['mensaje'])
	    	) {
	      if ($this->isValidEmail($_POST['correoempresa']) && $this->isValidEmail($_POST['correo'])) {
	        $response['error'] = FALSE;
	        $_POST['correoempresa'] = $this->quitarCaracteresEspeciales($_POST['correoempresa']);
	        $_POST['nombre'] = $this->quitarCaracteresEspeciales($_POST['nombre']);
	        $_POST['correo'] = $this->quitarCaracteresEspeciales($_POST['correo']);
	        $_POST['asunto'] = $this->quitarCaracteresEspeciales($_POST['asunto']);
	        $_POST['mensaje'] = $this->quitarCaracteresEspeciales($_POST['mensaje']);

	        $datos = $_POST;
	        // $template = $this->load->view("nuevoPagoMail",$datos,TRUE);
	        $template = $this->load->view("plantilla",$datos,TRUE); //sprintf("<h3>Asunto: %s</h3><h3>Contacto: %s (%s)</h3><h3>Mensaje: %s</h3>",$_POST['asunto'],$_POST['nombre'],$_POST['correo'],$_POST['mensaje']) ;
	        $mail = $this->facturacion->objMail($template,$_POST['correoempresa']);
	        if (!$mail->send()) {
	          $response["msg"] = $mail->ErrorInfo;
	        } else {
	          $response["error"] = false;
	          $response['msg'] = "Correo enviado correctamente.";
	        }
	      }else {
	        $response['msg'] = 'Correo no valido.';
	      }
	    }else {
	      $response['msg'] = 'Todos los campos son requeridos.';
	    }

	    echo json_encode($response);
	}

	public function isValidEmail($email){
		return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
	}

	private function quitarCaracteresEspeciales($str)
	{
	$str = strtolower($str);
	$find = array('á','é','í','ó','ú','â','ê','î','ô','û','ã','õ','ç','ñ');
	$repl = array('a','e','i','o','u','a','e','i','o','u','a','o','c','n');
	$str = str_replace($find, $repl, $str);
	//  $find = array(' ', '&amp;', '\r\n', '\n','+');
	//  $str = str_replace($find, '-', $str);
	$find = array( '/[\-]+/', '/&lt;{^&gt;*&gt;/');
	$repl = array('', '-', '');
	$str = preg_replace($find, $repl, $str);
	return $str;
	}


}
