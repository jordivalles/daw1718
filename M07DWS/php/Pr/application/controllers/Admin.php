<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();
class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('session');		
	}

	public function index()
	{    
		//carreguem el model per fer les consultes
		$this->load->model('ModelConsultes');
		
		//dates disponibles
		$data['disponibles'] = $this->ModelConsultes->getDatesDisponibles();
		
		$this->load->view('Admin',$data);
	}
	
	public function habilitarData(){
		
		//carreguem el model per fer les consultes
		$this->load->model('ModelConsultes');
		
		//guardem la data
		$data['data'] = $this->input->post('fdate');
		
		if($data['data']==''){
			$data['error'] = "La data no és vàlida";
		}
		
		//echo $data['data'];
		
		//echo " ".date('Y-m-d');
		
		if($data['data']>=date('Y-m-d')){
			$data['check'] = $this->ModelConsultes->checkData($data);
			if($data['check']==false){
				$this->ModelConsultes->habilitarData($data);
			}else{
				$data['error'] = "Aquesta data ja està reservada";
			}
		}else if($data['data']<date('Y-m-d')){
			$data['error'] = "La data no pot ser més antiga que avui";
		}
		
		
		//dates disponibles
		$data['disponibles'] = $this->ModelConsultes->getDatesDisponibles();
		
		$this->load->view('Admin',$data);
	}
	
}




