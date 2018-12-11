<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('session');	
	}

	public function index(){
    
        //carreguem el model per fer les consultes
		$this->load->model('ModelConsultes');
        
		//reserves
		$data['departaments'] = $this->ModelConsultes->getAllDpts();
		$data['departaments2'] = $this->ModelConsultes->getAllDpts2();
		
		$this->load->view('Index',$data);

	}
    
}




