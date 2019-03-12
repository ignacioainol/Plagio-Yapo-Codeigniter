<?php

class Atacama extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Region_model');
		$this->load->model('Items_model');
	}

	public function index(){
		$data['name'] = $this->session->userdata('name');
		//$data['idRegion'] =
		$data['regions'] = $this->Region_model->getRegions();
		$this->load->view('partials/main_header',$data);
		$this->load->view('partials/content');
		$this->load->view('partials/footer');
	}

	public function fetch_data(){
		$this->load->library('pagination');
		$config = array();
		  //$config['base_url'] = '#';
		  $config['total_rows'] = $this->Items_model->count_all_atacama();
		  $config['per_page'] = 12;
		  $config['uri_segment'] = 3;
		  $config['use_page_numbers'] = TRUE;
		  $config['full_tag_open'] = '<ul class="pagination flex-m flex-w p-t-26">';
		  $config['full_tag_close'] = '</ul>';
		  $config['first_tag_open'] = '<li>';
		  $config['first_tag_close'] = '</li>';
		  $config['last_tag_open'] = '<li class="item-pagination flex-c-m trans-0-4">';
		  $config['last_tag_close'] = '</li>';
		  //$config['next_link'] = '&gt;';
		  $config['next_tag_open'] = '<li class="item-pagination flex-c-m trans-0-4">';
		  $config['next_tag_close'] = '</li>';
		  //$config['prev_link'] = '&lt;';
		  $config['prev_tag_open'] = '<li>';
		  $config['prev_tag_close'] = '</li>';
		  $config['cur_tag_open'] = '<li class="active"><a href="#">';
		  $config['cur_tag_close'] = '</a></li>';
		  $config['num_tag_open'] = '<li class="item-pagination flex-c-m trans-0-4">';
		  $config['num_tag_close'] = '</li>';
		  $config['num_links'] = 5;
		  $this->pagination->initialize($config);
		  $page = $this->uri->segment(3);
		  $start = ($page - 1) * $config['per_page'];
		  $output = array(
		   'pagination_link'  => $this->pagination->create_links(),
		   //'pagination_link' => $this->Products_model->count_all_carcasas(),
		   'product_list'   => $this->Products_model->fetch_data_servicios($config["per_page"], $start, $brand,$model));
		  if(!isset($brand)){
		  	$output['model_data'] = $this->Products_model->fetch_models($brand);
		  }else{
		  	//$output['model_data'] = "no viene nulo. Aca hacer la magia";
		  	$output['model_data'] = $this->Products_model->fetch_models($brand);
		  }
		  echo json_encode($output);
	}
}