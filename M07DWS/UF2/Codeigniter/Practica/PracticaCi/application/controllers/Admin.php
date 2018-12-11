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
		
		//cursos disponibles
		$data['cursos'] = $this->ModelConsultes->getCursos();
		
		//usuaris (propietaris)
		$data['propietaris'] = $this->ModelConsultes->getPropietaris();
		
		$this->load->view('Admin',$data);
	}
	
	public function crearCurs(){
		
		//carreguem el model per fer les consultes
		$this->load->model('ModelConsultes');
		
		//guardem la data
		$data['id'] = $this->input->post('fid');
		$data['propietari'] = $this->input->post('fpropietari');
		
		//echo $data['data'];

		$data['check'] = $this->ModelConsultes->checkCurs($data);
		
		if($data['check']==false){
			$this->ModelConsultes->crearCurs($data);
		}else{
			$data['error'] = "Aquest curs ja existeix!";
		}
		
		//cursos disponibles
		$data['cursos'] = $this->ModelConsultes->getCursos();
		
		//usuaris (propietaris)
		$data['propietaris'] = $this->ModelConsultes->getPropietaris();
		
		$this->load->view('Admin',$data);
	}
	
}




