<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();
class Menu extends CI_Controller {
	
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
		
		$data['id'] = $this->session->codiArtista;
		//reserves actuals del artista
		$data['reserves'] = $this->ModelConsultes->getReservesArtista($data);
		
		//dates disponibles
		$data['disponibles'] = $this->ModelConsultes->getDatesDisponibles();
		
		$this->load->view('Menu',$data);
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
		$data['id'] = $this->session->codiArtista;
		
		if($data['data']=='' || $data['hora']=='' ||$data['durada']==''){
			$data['error'] = "Falten dades per omplir";
		}else if($data['durada']<=0){
			$data['error'] = "La durada no és vàlida";
		}else{
			//echo $data['data']." ".$data['hora']." ".$data['durada']." ".$data['id'];
			$this->ModelConsultes->reservar($data);
			$this->ModelConsultes->deleteDataDisponible($data);
			$data['hora'] = '';
			$data['durada'] = '';
		}
		
		//dates disponibles
		$data['disponibles'] = $this->ModelConsultes->getDatesDisponibles();
		
		
		//reserves actuals del artista
		$data['reserves'] = $this->ModelConsultes->getReservesArtista($data);
		
		$this->load->view('Menu',$data);
	}
	
	public function modificarReserva(){
		//id
		$data['id'] = $this->uri->segment('3');
		$data['data'] = $this->uri->segment('4');
		$data['hora'] = $this->uri->segment('5');
		$data['durada'] = $this->uri->segment('6');
		
		echo $data['id']." ".$data['data']." ".$data['hora']." ".$data['durada'];
		
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




