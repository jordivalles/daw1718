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
	
	public function modificarCurs(){
		
		//id del curs
		$data['idcurs'] = $this->uri->segment('3');
		
		//carreguem el model per fer les consultes
		$this->load->model('ModelConsultes');
		
        $data['dades'] = $this->ModelConsultes->getDadesCurs($data);
        
        //var_dump($data['dades']);
        
        $this->load->view('ModificarCurs',$data);
        
		//redirect('Menu/index', 'refresh');
	}
	
    
    public function updateCurs(){
        
		//carreguem el model per fer les consultes
		$this->load->model('ModelConsultes');
		
        //guardem id
        $data['id'] = $this->input->post('fid');
        
		//guardem el titol
		$data['titol'] = $this->input->post('ftitol');
        
		//guardem data inici
		$data['durada'] = $this->input->post('fdatainici');
		
		//guardem hores totals
		$data['htotals'] = $this->input->post('fhtotals');
		
		//guardem hores setmanals
		$data['hsetmanals'] = $this->input->post('fhsetmanals');
		
		
		$data['id'] = $this->session->codiPropietari;
		
        //cursos del propietari
		$data['cursos'] = $this->ModelConsultes->getCursosPropietari($data);
		
		$this->load->view('Propietari',$data);
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




