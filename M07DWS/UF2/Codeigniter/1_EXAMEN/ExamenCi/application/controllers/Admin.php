<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();
class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();		
	}

	public function index()
	{    
		//preguntes
		$data['preguntes'] = $this->ModelConsultes->getPreguntes();
        
        //categories
        $data['categories'] = $this->ModelConsultes->getCategories();
		
		$this->load->view('Admin',$data);
	}
	
	public function crearPregunta(){
		
		//guardem els valors
		$data['text'] = $this->input->post('ftext');
		$data['categoria'] = $this->input->post('fcategoria');
		$data['estat'] = $this->input->post('festat');
        
        $this->ModelConsultes->crearPregunta($data);
        
        //fem select dels valors per actualitzar la taula
		redirect('Admin/index', 'refresh');
        
	}
    
    public function modificarPregunta(){
		
		//id de la pregunta
		$data['idPregunta'] = $this->uri->segment('3');
        
        //agafem les dades de la pregunta que volem modificar
        $data['dades'] = $this->ModelConsultes->getDadesPregunta($data);
        
        //agafem categories per fer el select
        $data['categories'] = $this->ModelConsultes->getCategories();
        
        $this->load->view('ModificarPregunta',$data);
        
	}
    
    public function updatePregunta(){
        
        //guardem id
        $data['id'] = $this->input->post('fid');
        
		//guardem el text
		$data['text'] = $this->input->post('ftext');
        
		//guardem categoria
		$data['categoria'] = $this->input->post('fcategoria');
		
		//modifiquem el curs
		$this->ModelConsultes->actualitzarPregunta($data);
		
		redirect('Admin/index', 'refresh');
	}
    
    public function canviarEstat(){
        
        //id de la pregunta
		$data['idPregunta'] = $this->uri->segment('3');
		$data['nouEstat'] = $this->uri->segment('4');
		
		//modifiquem l'estat
		$this->ModelConsultes->canviarEstat($data);
		
		redirect('Admin/index', 'refresh');
	}
	
}




