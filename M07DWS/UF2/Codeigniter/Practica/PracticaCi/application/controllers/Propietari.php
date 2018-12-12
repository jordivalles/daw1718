<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();
class Propietari extends CI_Controller {
	
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
		
		$data['id'] = $this->session->codiPropietari;
		
		//cursos del propietari
		$data['cursos'] = $this->ModelConsultes->getCursosPropietari($data);
		
		$this->load->view('Propietari',$data);
	}
	
	public function reservarData(){
		//carreguem el model per fer les consultes
		$this->load->model('ModelConsultes');
		
		//guardem la data
		$data['data'] = $this->input->post('fdate');
		
		//guardem hora inici
		$data['hora'] = $this->input->post('fhora');
		
		//guardem durada
		$data['durada'] = $this->input->post('fdurada');
		
		//codi artista
		$data['id'] = $this->session->codiPropietari;
		
		
		
		//cursos del propietari
		$data['cursos'] = $this->ModelConsultes->getCursosPropietari($data);
		
		$this->load->view('Menu',$data);
	}
	
	public function modificarCurs(){
		
		//id del curs
		$data['idcurs'] = $this->uri->segment('3');
		
		echo $data['idcurs'];
		
		//carreguem el model per fer les consultes
		$this->load->model('ModelConsultes');
		
		//redirect('Menu/index', 'refresh');
	}
	
	public function eliminarReserva(){
		//id
		$data['id'] = $this->uri->segment('3');
		$data['data'] = $this->uri->segment('4');
		//echo $data['id']." ".$data['data'];
		
		//carreguem el model per fer les consultes
		$this->load->model('ModelConsultes');
		$this->ModelConsultes->deleteReserva($data);
		$this->ModelConsultes->habilitarData($data);
		redirect('Menu/index', 'refresh');
	}
	
}




