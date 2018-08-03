<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crearcuenta extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Region_model');
	}

	public function index(){
		$data['regions'] = $this->Region_model->getRegions();
		$this->load->view('partials/main_header');
		$this->load->view('registro',$data);
		$this->load->view('partials/footer');
	}

	public function getTowns($region_id){
		$towns = $this->Region_model->getTownsByRegionId($region_id);
		echo json_encode($towns, true);
	}

	public function registro(){
		$errorMessage = "";
		$acceptTerms = "";
		$fullname = "";
		$sexo = "";
		$region = "";
		$town = "";
		$numberPhone = "";
		$email = "";
		$password = "";
		$passwordRepeat = "";
		$agree = "";

		if($this->input->post()){

			if($this->input->post('fullname') != ""){
				$fullname = trim($this->input->post('fullname'));
			}else{
				$errorMessage = "Ingrese su nombre \n";
			}

			if($this->input->post('sexo') != ""){
				$sexo = $this->input->post('sexo');
			}else{
				$errorMessage .= "Seleccione su sexo\n";
			}

			if($this->input->post('region') != "Seleccione Región"){
				$region = $this->input->post('region');
			}else{
				$errorMessage .= "Seleccione Región\n";
			}

			if($this->input->post('town') != "Seleccione Comuna"){
				$town = $this->input->post('town');
			}

			if($this->input->post('number') != ""){
				$numberPhone = trim($this->input->post('number'));
			}else{
				$errorMessage .= "Ingrese su Número Telefónico\n";
			}

			if($this->input->post('email') != ""){
				$email = trim($this->input->post('email'));
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				  $errorMessage .= "Ingrese un E-mail válido\n"; 
				}
			}else{
				$errorMessage .= "Ingrese E-mail\n";
			}

			if($this->input->post('password') != ""){
				$password = trim($this->input->post('password'));
				if($this->input->post('passwordRepeat') != ""){
					$passwordRepeat = trim($this->input->post('passwordRepeat'));

					if($password !== $passwordRepeat){
						$errorMessage .= "Las Contraseñas no coinciden";
					}
				}else{
					$errorMessage .= "Debe repetir Contraseña\n";	
				}
			}else{
				$errorMessage .= "Ingrese Contraseña\n";
			}


			if($errorMessage != ""){
				echo $errorMessage;
			}else{
				if($this->input->post('agree')){
					$agree = $this->input->post('agree');
					if($agree != "checked"){
						$acceptTerms .= "Debes Aceptar los Términos y Condiciones";
					}

					if($acceptTerms != ""){
						echo $acceptTerms;
					}else{
						// echo "Vamos bieeen " . $fullname . " " .$sexo . " " . $region . " " .$town . " " . $numberPhone . " " . $email ." ".$password ." ". $passwordRepeat;
					}
				}
			}
		}else{
			echo "no tiene post";
		}
	}
}