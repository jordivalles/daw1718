<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();
class Usuari extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();	
	}

	public function index()
	{    
		$data['idUsuari'] = $this->session->codiUsuari;
		
        //preguntes NO respostes
        $data['preguntes'] = $this->ModelConsultes->getPreguntesNoRespostes($data);
        
        //preguntes SI respostes
        $data['preguntesRespostes'] = $this->ModelConsultes->getPreguntesSiRespostes($data);
        
		$this->load->view('Usuari',$data);
	}
    
    public function respondrePregunta(){
        
        $data['idUsuari'] = $this->session->codiUsuari;
        $data['idPregunta'] = $this->input->post('fpregunta');
		$data['resposta'] = $this->input->post('fresposta');
        
        $this->ModelConsultes->respondrePregunta($data);
        
        $data['q'] = $this->ModelConsultes->getQtatRespostes($data);
        //echo $data['q'][0]['respostes'];
        $data['qtat'] = ($data['q'][0]['respostes']+1);
        //echo $data['qtat'];
        
        //augmentem camp pregunta
        $this->ModelConsultes->updateQtatRespostes($data);
        
		redirect('Usuari/index', 'refresh');
        
    }
	
}




